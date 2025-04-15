@extends('memberlayout.member')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Books</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($books as $book)
            <div class="border rounded p-4 shadow">
                <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-600">Author: {{ $book->author->name }}</p>
                <p class="text-gray-600">ISBN: {{ $book->isbn }}</p>
                <p class="text-gray-600">Published Date: {{ $book->published_date->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>
@endsection
