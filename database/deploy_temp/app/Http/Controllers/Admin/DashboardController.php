<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $messages = ContactMessage::count();
        $bookings = Booking::with('service')->latest()->take(10)->get();

        return view('admin.dashboard', compact('totalBookings', 'pendingBookings', 'completedBookings', 'messages', 'bookings'));
    }
}