<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'service', 'zip_code',
        'preferred_date', 'preferred_time', 'message', 'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public static array $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'Pending',
            'confirmed' => 'Confirmed',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            default     => ucfirst($this->status),
        };
    }
}
