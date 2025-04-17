<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Service $service)
    {
        return view('bookings.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        return redirect()->route('services.front')->with('success', 'Service booked successfully!');
    }

    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->with('service')->get();
        return view('bookings.index', compact('bookings'));
    }
}
