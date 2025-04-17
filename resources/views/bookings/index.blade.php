@extends('memberlayout.member')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary mb-4">My Bookings</h1>

    <div class="row">
        @forelse($bookings as $booking)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $booking->service->name }}</h5>
                        <p class="card-text">Booking Date: {{ $booking->booking_date }}</p>
                        <p class="card-text">Status: <span class="badge bg-info">{{ ucfirst($booking->status) }}</span></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    You have no bookings yet.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
