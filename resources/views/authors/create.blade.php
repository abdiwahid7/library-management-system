@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl p-8">
            <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
                <span class="material-icons">person_add</span>
                Add New Author
            </h2>

            <form method="POST" action="{{ route('authors.store') }}">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-green-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="biography" class="block text-green-700 text-sm font-bold mb-2">Biography</label>
                    <textarea name="biography" id="biography" rows="4"
                        class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-400 @error('biography') border-red-500 @enderror">{{ old('biography') }}</textarea>
                    @error('biography')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                        <span class="material-icons text-base">save</span>
                        Save Author
                    </button>
                    <a href="{{ route('authors.index') }}"
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
