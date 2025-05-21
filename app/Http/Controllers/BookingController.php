<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;

class BookingController extends Controller
{
    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        // Create the booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        // Send booking confirmation email
        Mail::to(auth()->user()->email)->send(new BookingConfirmationMail($booking));

        // Redirect to member dashboard
        return redirect()->route('dashboard')->with('success', 'Booking created! Confirmation email sent.');
    }

    public function create(Service $service)
    {
        return view('bookings.create', compact('service'));
    }
}
