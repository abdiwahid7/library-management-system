@extends('websitelayout.app')

@section('content')
<div class="row p-3">
    <h1 class="text-3xl font-bold mb-6">Books</h1>
    <div class="col-sm-1 col-lg-3 mb-2 g-2 bg-light">
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
