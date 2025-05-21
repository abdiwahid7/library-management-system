@extends('websitelayout.app')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-700">Our Services</h1>
        <p class="text-gray-600">Explore the wide range of services we offer to meet your needs.</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white/90 border border-blue-100 rounded-2xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col">
                <h5 class="text-xl font-bold text-green-700 mb-2">{{ $service->name }}</h5>
                <p class="text-gray-600 mb-2">{{ $service->description ?? 'No description available.' }}</p>
                <p class="text-blue-600 font-semibold">Price: ${{ number_format($service->price, 2) }}</p>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-blue-100 text-blue-800 p-4 rounded text-center">
                    No services available at the moment.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-8 flex justify-center">
        {{ $services->links('pagination::tailwind') }}
    </div>
</div>
@endsection
