@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl">
            <div class="p-8 border-b border-gray-100">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-green-700">Books</h2>
                    <a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow transition duration-300">
                        <span class="material-icons">add</span>
                        Add New Book
                    </a>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full divide-y divide-green-200">
                        <thead class="bg-green-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Author</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">ISBN</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-green-100">
                            @foreach ($books as $book)
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900">{{ $book->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $book->author->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $book->isbn }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                                            <span class="material-icons text-sm mr-1">edit</span>Edit
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-700 text-white rounded-lg transition duration-200" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <span class="material-icons text-sm mr-1">delete</span>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
