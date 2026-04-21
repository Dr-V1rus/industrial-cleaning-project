<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
            'service_id' => 'required|exists:services,id',
            'preferred_date' => 'required|date',
            'preferred_time' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        Booking::create($validated);

        return back()->with('success', 'Booking request sent! We will contact you shortly.');
    }
}