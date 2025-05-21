@extends('memberlayout.member')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Member Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
    <h1 class="text-4xl md:text-5xl font-bold text-green-600 mb-6">
        Welcome, {{ auth()->user()->name }}!
    </h1>
    <p class="text-xl text-green-700 mb-8 max-w-3xl mx-auto">
        Access your library account, view available books, and manage your transactions easily.
    </p>

    <div class="flex justify-center flex-wrap gap-4">
        <a href="{{ route('books.member') }}"
           class="bg-green-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 shadow transition duration-300">
            Browse Books
        </a>
        <a href="{{ route('services.member') }}"
           class="bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-600 shadow transition duration-300">
            Library Services
        </a>
        <a href="{{ route('transactions.member') }}"
           class="bg-yellow-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-yellow-600 shadow transition duration-300">
            My Transactions
        </a>
        <a href="{{ route('contacts.create') }}"
           class="bg-white text-green-600 px-6 py-3 rounded-lg font-medium hover:bg-green-50 shadow transition duration-300">
            Contact Library
        </a>
    </div>
</div>
@endsection
