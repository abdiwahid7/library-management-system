@extends('adminlayout.admin')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
                @auth
                    <h1 class="text-4xl md:text-5xl font-bold text-green-600 mb-6">Welcome, {{ auth()->user()->name }}!</h1>
                @else
                    <h1 class="text-4xl md:text-5xl font-bold text-green-600 mb-6">Welcome to the Admin Panel</h1>
                @endauth

                <p class="text-xl text-green-200 mb-8 max-w-3xl mx-auto">
                    Manage your library's users, books, and transactions efficiently.
                </p>

                <div class="flex justify-center flex-wrap gap-4">
                    <a href="{{ route('users.index') }}"
                       class="bg-white text-green-600 px-6 py-3 rounded-lg font-medium hover:bg-green-50 transition duration-300">
                        Manage Users
                    </a>
                    <a href="{{ route('books.index') }}"
                       class="bg-green-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 transition duration-300">
                        Manage Books
                    </a>
                </div>
            </div>

@endsection

