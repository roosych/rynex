@extends('layouts.admin')

@section('title', 'Bookings')
@section('page_title', 'Bookings')

@section('content')

{{-- Status Filter --}}
<div style="margin-bottom:20px;display:flex;gap:8px;flex-wrap:wrap;">
    <a href="{{ route('admin.bookings.index') }}"
       class="admin-btn admin-btn-sm {{ !$status ? 'admin-btn-primary' : 'admin-btn-secondary' }}">All</a>
    @foreach (\App\Models\Booking::$statuses as $s)
    <a href="{{ route('admin.bookings.index', ['status' => $s]) }}"
       class="admin-btn admin-btn-sm {{ $status === $s ? 'admin-btn-primary' : 'admin-btn-secondary' }}">
        {{ ucfirst($s) }}
    </a>
    @endforeach
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-calendar-check" style="margin-right:8px;color:var(--accent-color);"></i>
            Bookings {{ $status ? '— ' . ucfirst($status) : '' }}
            <span style="font-size:0.82rem;font-weight:400;color:#9ca3af;margin-left:8px;">({{ $bookings->total() }})</span>
        </h2>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($bookings->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;">No bookings found.</div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Preferred Date</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td style="color:#9ca3af;">{{ $booking->id }}</td>
                    <td>
                        <strong>{{ $booking->name }}</strong><br>
                        <span style="font-size:0.8rem;color:#9ca3af;">{{ $booking->phone }}</span>
                    </td>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->preferred_date?->format('M j, Y') ?? '—' }}</td>
                    <td>{{ $booking->created_at->format('M j, Y') }}</td>
                    <td><span class="badge-status badge-{{ $booking->status }}">{{ $booking->status }}</span></td>
                    <td>
                        <a href="{{ route('admin.bookings.show', $booking) }}"
                           class="admin-btn admin-btn-secondary admin-btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($bookings->hasPages())
        <div style="padding:16px 24px;">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
        @endif
        @endif
    </div>
</div>

@endsection
