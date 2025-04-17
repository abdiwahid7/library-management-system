@extends('adminlayout.admin')

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-600">Add New Service</h1>
        <p class="text-gray-500 mt-2">Fill out the form below to add a new service to the system.</p>
    </div>

    <form action="{{ route('services.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Service Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   placeholder="Enter service name"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
            <textarea id="description" name="description" rows="5"
                      placeholder="Enter service description"
                      class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required
                   placeholder="Enter service price"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-center space-x-4 pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md text-lg font-medium hover:bg-blue-700 transition">
                Save Service
            </button>
            <a href="{{ route('services.index') }}"
               class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md text-lg font-medium hover:bg-gray-400 transition">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
