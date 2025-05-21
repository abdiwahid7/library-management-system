@extends('websitelayout.app')

@section('content')
<div class="py-10 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-green-700 mb-8">Books</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($books as $book)
                <div class="bg-white/90 border border-green-100 rounded-2xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col">
                    <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Author:</span> {{ $book->author->name }}</p>
                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">ISBN:</span> {{ $book->isbn }}</p>
                    <p class="text-sm text-gray-600"><span class="font-medium">Published:</span> {{ $book->published_date->format('M d, Y') }}</p>
                </div>
            @empty
                <p class="text-gray-600 col-span-full text-center">No books found.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
