@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Contact Messages</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600">← Back to Dashboard</a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Message</th>
                    <th class="p-3 text-left">Received</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr class="border-t">
                    <td class="p-3 font-medium">{{ $message->name }}</td>
                    <td class="p-3">{{ $message->email }}</td>
                    <td class="p-3">{{ $message->message }}</td>
                    <td class="p-3 text-sm text-gray-500">{{ $message->created_at->format('M d, Y h:i A') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection