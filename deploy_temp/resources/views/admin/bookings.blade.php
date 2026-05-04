@extends('layouts.admin')

@section('title', 'All Bookings')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">All Bookings</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-sm font-semibold">ID</th>
                    <th class="p-3 text-left text-sm font-semibold">Client</th>
                    <th class="p-3 text-left text-sm font-semibold">Service</th>
                    <th class="p-3 text-left text-sm font-semibold">Date</th>
                    <th class="p-3 text-left text-sm font-semibold">Status</th>
                    <th class="p-3 text-left text-sm font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 text-sm">{{ $booking->id }}</td>
                    <td class="p-3">
                        <div class="font-medium">{{ $booking->name }}</div>
                        <div class="text-xs text-gray-500">{{ $booking->phone }}</div>
                    </td>
                    <td class="p-3 text-sm">{{ $booking->service->name ?? 'N/A' }}</td>
                    <td class="p-3 text-sm">{{ $booking->preferred_date }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                            @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status == 'confirmed') bg-blue-100 text-blue-800
                            @elseif($booking->status == 'completed') bg-green-100 text-green-800
                            @elseif($booking->status == 'in_progress') bg-purple-100 text-purple-800
                            @else bg-gray-100
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="p-3">
                        <form method="POST" action="{{ route('admin.booking.status', $booking->id) }}" class="inline">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="border rounded-lg px-2 py-1 text-sm">
                                <option value="pending" @selected($booking->status == 'pending')>Pending</option>
                                <option value="confirmed" @selected($booking->status == 'confirmed')>Confirmed</option>
                                <option value="in_progress" @selected($booking->status == 'in_progress')>In Progress</option>
                                <option value="completed" @selected($booking->status == 'completed')>Completed</option>
                                <option value="cancelled" @selected($booking->status == 'cancelled')>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">No bookings yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
