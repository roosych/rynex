<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $status   = $request->query('status');
        $query    = Booking::latest();

        if ($status && in_array($status, Booking::$statuses)) {
            $query->where('status', $status);
        }

        $bookings = $query->paginate(20);

        return view('admin.bookings.index', compact('bookings', 'status'));
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Booking::$statuses),
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('success', 'Status updated to ' . ucfirst($request->status) . '.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted.');
    }
}
