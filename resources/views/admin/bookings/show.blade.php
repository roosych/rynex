@extends('layouts.admin')

@section('title', 'Booking #' . $booking->id)
@section('page_title', 'Booking #' . $booking->id)

@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.bookings.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Back to Bookings
    </a>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Booking Details</h2>
                <span class="badge-status badge-{{ $booking->status }}">{{ $booking->status }}</span>
            </div>
            <div class="admin-card-body">
                <table style="width:100%;border-collapse:collapse;">
                    @php
                        $rows = [
                            ['Name',           $booking->name],
                            ['Phone',          $booking->phone],
                            ['Service',        $booking->service],
                            ['Brand',          $booking->brand ?? '—'],
                            ['ZIP Code',       $booking->zip_code ?? '—'],
                            ['Preferred Date', $booking->preferred_date?->format('M j, Y') ?? '—'],
                            ['Preferred Time', $booking->preferred_time ?? '—'],
                            ['Received',       $booking->created_at->format('M j, Y H:i')],
                        ];
                    @endphp
                    @foreach ($rows as [$label, $value])
                    <tr>
                        <td style="padding:10px 0;color:#6b7280;font-size:0.82rem;font-weight:600;text-transform:uppercase;letter-spacing:0.06em;width:140px;border-bottom:1px solid #f3f4f6;">{{ $label }}</td>
                        <td style="padding:10px 0;color:#1a2e44;border-bottom:1px solid #f3f4f6;">{{ $value }}</td>
                    </tr>
                    @endforeach
                </table>

                @if ($booking->message)
                <div style="margin-top:20px;">
                    <div style="font-size:0.82rem;font-weight:600;text-transform:uppercase;letter-spacing:0.06em;color:#6b7280;margin-bottom:8px;">Message</div>
                    <div style="background:#f8f9fb;border-radius:8px;padding:14px 16px;color:#374151;font-size:0.9rem;line-height:1.7;">
                        {{ $booking->message }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="admin-card">
            <div class="admin-card-header"><h2>Update Status</h2></div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                    @csrf @method('PATCH')
                    <div class="mb-4">
                        <label class="admin-form-label">Status</label>
                        <select name="status" class="form-control">
                            @foreach (\App\Models\Booking::$statuses as $s)
                            <option value="{{ $s }}" {{ $booking->status === $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-floppy-disk"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <div class="admin-card" style="border:1px solid #fee2e2;">
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}"
                      onsubmit="return confirm('Delete this booking permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn-danger" style="width:100%;">
                        <i class="fa-solid fa-trash"></i> Delete Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
