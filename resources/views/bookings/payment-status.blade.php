@extends('memberlayout.member')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary mb-4">Payment Status for Booking #{{ $booking->id }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @else
        <p>Please complete the payment on your phone. You will receive a confirmation shortly.</p>
    @endif

    <a href="{{ route('bookings.index') }}" class="btn btn-primary mt-3">Back to My Bookings</a>
</div>
@endsection
