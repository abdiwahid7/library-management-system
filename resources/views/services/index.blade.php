@extends('adminlayout.admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold">Manage Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-success btn-lg">+ Add Service</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($services as $service)
        <div class="bg-white shadow-lg rounded-lg flex flex-col h-full p-4">
            <h5 class="text-xl font-bold text-gray-800 mb-2">{{ $service->name }}</h5>
            <p class="text-gray-600 mb-2">{{ $service->description ?? 'No description available.' }}</p>
            <p class="text-green-600 font-semibold mb-4">Price: ${{ number_format($service->price, 2) }}</p>
            <div class="mt-auto flex justify-between items-center">
                <a href="{{ route('services.edit', $service) }}" class="bg-yellow-500 text-white text-sm px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white text-sm px-4 py-2 rounded hover:bg-red-600">Delete</button>
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


    <div class="mt-5 d-flex justify-content-center">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
