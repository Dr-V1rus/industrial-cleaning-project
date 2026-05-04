<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with('service');

        if ($request->has('status') && in_array($request->status, ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled'])) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(20);
        return view('admin.bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking         = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Booking status updated.');
    }
}
