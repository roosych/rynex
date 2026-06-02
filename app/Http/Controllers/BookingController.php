<?php

namespace App\Http\Controllers;

use App\Mail\BookingReceived;
use App\Models\Booking;
use App\Models\ZipCode;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $zipCodes = ZipCode::where('is_active', true)->orderBy('sort_order')->orderBy('code')->get();
        return view('pages.booking', compact('zipCodes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:150',
            'phone'    => 'required|string|max:30',
            'service'  => 'required|string|max:100',
            'zip_code' => 'required|string|max:10|exists:zip_codes,code',
            'date'     => 'nullable|date',
            'message'  => 'nullable|string|max:1000',
        ]);

        $booking = Booking::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'phone'          => $validated['phone'],
            'service'        => $validated['service'],
            'zip_code'       => $validated['zip_code'],
            'preferred_date' => $validated['date'] ?? null,
            'message'        => $validated['message'] ?? null,
        ]);

        $this->notify($booking);

        return redirect()->route('booking')->with('success', 'Your booking request has been received. We\'ll contact you shortly to confirm your appointment.');
    }

    /**
     * Email the booking notification recipients. A mail failure must never
     * break the booking — the request is already saved at this point.
     */
    private function notify(Booking $booking): void
    {
        $settings   = app(GeneralSettings::class);
        $recipients = collect(preg_split('/[,;\s]+/', $settings->booking_notify_emails ?? ''))
            ->filter(fn ($email) => filter_var($email, FILTER_VALIDATE_EMAIL))
            ->values()
            ->all();

        if (empty($recipients)) {
            $recipients = filter_var($settings->email, FILTER_VALIDATE_EMAIL) ? [$settings->email] : [];
        }

        if (empty($recipients)) {
            return;
        }

        try {
            Mail::to($recipients)->send(new BookingReceived($booking));
        } catch (\Throwable $e) {
            Log::error('Failed to send booking notification email', [
                'booking_id' => $booking->id,
                'error'      => $e->getMessage(),
            ]);
        }
    }
}
