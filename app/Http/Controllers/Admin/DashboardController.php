<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Post;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'          => Service::count(),
            'posts'             => Post::count(),
            'bookings'          => Booking::count(),
            'pending_bookings'  => Booking::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
