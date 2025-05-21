@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-2xl mx-auto p-6 bg-white/90 shadow-2xl rounded-2xl">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Edit Service</h1>
        <form action="{{ route('services.update', $service) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $service->name }}" required
                    class="mt-1 block w-full border border-blue-200 rounded-lg shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full border border-blue-200 rounded-lg shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500">{{ $service->description }}</textarea>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ $service->price }}" required
                    class="mt-1 block w-full border border-blue-200 rounded-lg shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-between pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Update</button>
                <a href="{{ route('services.index') }}"
                   class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
