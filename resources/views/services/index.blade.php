@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-blue-700">Manage Services</h1>
            <a href="{{ route('services.create') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow transition duration-300">
                <span class="material-icons">add</span>
                Add Service
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="bg-white/90 border border-blue-100 rounded-2xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col">
                    <h5 class="text-xl font-bold text-green-700 mb-2">{{ $service->name }}</h5>
                    <p class="text-gray-600 mb-2">{{ $service->description ?? 'No description available.' }}</p>
                    <p class="text-blue-600 font-semibold mb-4">Price: ${{ number_format($service->price, 2) }}</p>
                    <div class="mt-auto flex justify-between items-center gap-2">
                        <a href="{{ route('services.edit', $service) }}"
                           class="bg-yellow-500 text-white text-sm px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-sm px-4 py-2 rounded hover:bg-red-600 transition">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-blue-100 text-blue-800 p-4 rounded text-center">
                        No services available. <a href="{{ route('services.create') }}" class="text-blue-600 underline">Add a new service</a>.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $services->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
