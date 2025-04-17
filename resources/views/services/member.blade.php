@extends('memberlayout.member')

@section('content')
<div class="container mt-5">
    <h1 class="text-4xl font-semibold text-primary mb-4 text-center">Services for Members</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="mb-4">
                <div class="bg-white shadow-lg h-full rounded-lg p-6">
                    <h5 class="text-xl font-semibold text-green-600">{{ $service->name }}</h5>
                    <p class="text-sm text-gray-600">{{ $service->description ?? 'No description available.' }}</p>
                    <p class="mt-2 text-lg"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                    <a href="{{ route('bookings.create', $service) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg mt-4 inline-block hover:bg-green-700 transition duration-300">Book Service</a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="bg-blue-100 text-center py-3 px-6 rounded-lg">
                    No services available for members at the moment.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $services->links('pagination::tailwind') }}
    </div>
</div>

@endsection
