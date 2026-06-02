@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="admin-stat-card">
            <div class="admin-stat-icon"><i class="fa-solid fa-wrench"></i></div>
            <div>
                <div class="admin-stat-value">{{ $stats['services'] }}</div>
                <div class="admin-stat-label">Services</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background:#3b82f6;"><i class="fa-solid fa-newspaper"></i></div>
            <div>
                <div class="admin-stat-value">{{ $stats['posts'] }}</div>
                <div class="admin-stat-label">Blog Posts</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background:#10b981;"><i class="fa-solid fa-calendar-check"></i></div>
            <div>
                <div class="admin-stat-value">{{ $stats['bookings'] }}</div>
                <div class="admin-stat-label">Total Bookings</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background:#f59e0b;"><i class="fa-solid fa-clock"></i></div>
            <div>
                <div class="admin-stat-value">{{ $stats['pending_bookings'] }}</div>
                <div class="admin-stat-label">Pending Bookings</div>
            </div>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa-solid fa-clock-rotate-left" style="margin-right:8px;color:var(--accent-color);"></i>Recent Bookings</h2>
        <a href="{{ route('admin.bookings.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">View All</a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        @if ($recentBookings->isEmpty())
            <div style="padding:28px 24px;text-align:center;color:#9ca3af;font-size:0.9rem;">
                <i class="fa-solid fa-inbox" style="font-size:2rem;margin-bottom:10px;display:block;"></i>
                No bookings yet.
            </div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentBookings as $booking)
                <tr>
                    <td><strong>{{ $booking->name }}</strong><br><span style="font-size:0.8rem;color:#9ca3af;">{{ $booking->email }}</span></td>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->created_at->format('M j, Y') }}</td>
                    <td><span class="badge-status badge-{{ $booking->status }}">{{ $booking->status }}</span></td>
                    <td><a href="{{ route('admin.bookings.show', $booking) }}" class="admin-btn admin-btn-secondary admin-btn-sm">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection
