@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Services</h1>
    <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Service</a>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Service Name</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $service->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $service->name }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('services.show', $service->id) }}" class="text-blue-500">View</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="text-yellow-500 ml-2">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
