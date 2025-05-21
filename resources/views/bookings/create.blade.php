@extends('memberlayout.member')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Book a Service</h2>
    <form action="{{ route('bookings.store', $service->id) }}" method="POST">
        @csrf

        <!-- Optionally display the user's email (readonly) -->
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" readonly class="w-full border rounded px-3 py-2" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Booking Date</label>
            <input type="date" name="booking_date" class="w-full border rounded px-3 py-2" required />
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Book Now</button>
    </form>
</div>
@endsection
