@extends('memberlayout.member')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Services for Members</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white/90 border border-green-100 rounded-2xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col">
                <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $service->name }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $service->description ?? 'No description available.' }}</p>
                <p class="text-lg text-blue-700 font-semibold mb-4"><span class="font-medium">Price:</span> ${{ number_format($service->price, 2) }}</p>
                <a href="{{ route('bookings.create', $service) }}"
                   class="mt-auto inline-block bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition shadow text-center">
                    Book Service
                </a>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                No services available for members at the moment.
            </div>
        @endforelse
    </div>

    <div class="mt-8 flex justify-center">
        {{ $services->links('pagination::tailwind') }}
    </div>
</div>
@endsection
