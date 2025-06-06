@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl p-8">
            <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
                <span class="material-icons">add</span>
                Add New Book
            </h2>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block text-green-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="author_id" class="block text-green-700 text-sm font-bold mb-2">Author</label>
                    <select name="author_id" id="author_id"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('author_id') border-red-500 @enderror">
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="isbn" class="block text-green-700 text-sm font-bold mb-2">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('isbn') border-red-500 @enderror">
                    @error('isbn')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="published_date" class="block text-green-700 text-sm font-bold mb-2">Published Date</label>
                    <input type="date" name="published_date" id="published_date" value="{{ old('published_date') }}"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('published_date') border-red-500 @enderror">
                    @error('published_date')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                        <span class="material-icons text-base">save</span>
                        Save Book
                    </button>
                    <a href="{{ route('books.index') }}"
                        class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                        <span class="material-icons text-base">arrow_back</span>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
