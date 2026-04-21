@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-red-600">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>

    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Total Bookings</p>
            <h2 class="text-3xl font-bold">{{ $totalBookings }}</h2>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Pending</p>
            <h2 class="text-3xl font-bold text-yellow-600">{{ $pendingBookings }}</h2>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Completed</p>
            <h2 class="text-3xl font-bold text-green-600">{{ $completedBookings }}</h2>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Messages</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $messages }}</h2>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <h2 class="text-xl font-bold p-6 border-b">Recent Bookings</h2>
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Client</th>
                    <th class="p-3 text-left">Service</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr class="border-t">
                    <td class="p-3">{{ $booking->name }}<br><small class="text-gray-500">{{ $booking->phone }}</small></td>
                    <td class="p-3">{{ $booking->service->name }}</td>
                    <td class="p-3">{{ $booking->preferred_date }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs 
                            @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status == 'confirmed') bg-blue-100 text-blue-800
                            @elseif($booking->status == 'completed') bg-green-100 text-green-800
                            @else bg-gray-100
                            @endif">
                            {{ $booking->status }}
                        </span>
                    </td>
                    <td class="p-3">
                        <form method="POST" action="{{ route('admin.booking.status', $booking->id) }}">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                                <option value="pending" @selected($booking->status == 'pending')>Pending</option>
                                <option value="confirmed" @selected($booking->status == 'confirmed')>Confirmed</option>
                                <option value="in_progress" @selected($booking->status == 'in_progress')>In Progress</option>
                                <option value="completed" @selected($booking->status == 'completed')>Completed</option>
                                <option value="cancelled" @selected($booking->status == 'cancelled')>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection