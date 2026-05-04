@extends('layouts.admin')

@section('title', 'Messages')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">Contact Messages</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <table>
                    <th class="p-3 text-left text-sm font-semibold">Name</th>
                    <th class="p-3 text-left text-sm font-semibold">Email</th>
                    <th class="p-3 text-left text-sm font-semibold">Message</th>
                    <th class="p-3 text-left text-sm font-semibold">Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $message->name }}</td>
                    <td class="p-3 text-sm">{{ $message->email }}</td>
                    <td class="p-3 text-sm">{{ $message->message }}</td>
                    <td class="p-3 text-sm text-gray-500">{{ $message->created_at->format('M d, Y h:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-gray-500">No messages yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
