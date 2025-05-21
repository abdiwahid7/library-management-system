@extends('websitelayout.app')

@section('content')
<div class="py-16 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-green-700 mb-10 text-center drop-shadow-lg">Our Services</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($services as $service)
                <div class="bg-white/90 border border-blue-100 rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-300 hover:-translate-y-2 p-6 flex flex-col">
                    <h2 class="text-xl font-bold text-green-700 mb-2">{{ $service->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ $service->description ?? 'No description available.' }}</p>
                    <p class="text-blue-700 font-semibold mb-2"><span class="font-medium">Price:</span> ${{ number_format($service->price, 2) }}</p>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No services available at the moment.
                </div>
            @endforelse
        </div>
        <div class="mt-10 flex justify-center">
            {{ $services->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
