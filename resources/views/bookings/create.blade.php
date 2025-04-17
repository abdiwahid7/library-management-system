@extends('memberlayout.member')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary mb-4">Book Service: {{ $service->name }}</h1>

    <form action="{{ route('bookings.store', $service) }}" method="POST" class="shadow p-4 bg-white rounded">
        @csrf
        <div class="mb-3">
            <label for="booking_date" class="form-label">Booking Date</label>
            <input type="date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" name="booking_date" required>
            @error('booking_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Confirm Booking</button>
        <a href="{{ route('services.member') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
