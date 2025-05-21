@extends('websitelayout.app')

@section('content')
<div class="py-16 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-green-700 mb-10 text-center drop-shadow-lg">Explore Our Books</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse ($books as $book)
                <div class="bg-white/90 border border-green-100 rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-300 hover:-translate-y-2 p-6 flex flex-col">
                    <h2 class="text-xl font-bold text-green-700 mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 mb-1"><span class="font-medium">Author:</span> {{ $book->author->name }}</p>
                    <p class="text-gray-600 mb-1"><span class="font-medium">ISBN:</span> {{ $book->isbn }}</p>
                    <p class="text-gray-500 mb-4"><span class="font-medium">Published:</span> {{ $book->published_date->format('M d, Y') }}</p>
                    <a href="{{ route('books.show', $book->id) }}"
                       class="mt-auto inline-block bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition shadow text-center">
                        View Details
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No books available at the moment.
                </div>
            @endforelse
        </div>
        <div class="mt-10 flex justify-center">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
