<?php

namespace App\Mail;

use App\Models\Booking;
use App\Settings\GeneralSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking)
    {
    }

    public function envelope(): Envelope
    {
        $company = app(GeneralSettings::class)->company_name;

        return new Envelope(
            subject: "New booking request — {$this->booking->name}" . ($company ? " | {$company}" : ''),
            replyTo: [$this->booking->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.booking-received',
        );
    }
}
