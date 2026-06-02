<x-mail::message>
# New Booking Request

A new service request was submitted through the website.

<x-mail::table>
| Field | Details |
|:----------------|:------------------------------------------------|
| **Name** | {{ $booking->name }} |
| **Phone** | {{ $booking->phone }} |
| **Email** | {{ $booking->email }} |
| **Service** | {{ $booking->service }} |
| **ZIP code** | {{ $booking->zip_code }} |
| **Preferred date** | {{ $booking->preferred_date?->format('M j, Y') ?? '—' }} |
</x-mail::table>

@if($booking->message)
**Message:**

> {{ $booking->message }}
@endif

<x-mail::button :url="route('admin.bookings.show', $booking)">
View in Admin
</x-mail::button>

Submitted {{ $booking->created_at->format('M j, Y g:i A') }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
