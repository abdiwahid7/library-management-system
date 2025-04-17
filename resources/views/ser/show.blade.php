@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Service Details</h1>
    <p><strong>Name:</strong> {{ $service->name }}</p>
    <p><strong>Description:</strong> {{ $service->description }}</p>
    <a href="{{ route('services.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Services</a>
</div>
@endsection
