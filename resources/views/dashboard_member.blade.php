@extends('memberlayout.member')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Member Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-green-600">Welcome, {{ auth()->user()->name }}!</h3>
                <p class="text-gray-700 mb-4">This is your member dashboard where you can manage your books and transactions.</p>
                <a href="{{ route('books.member') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    View Books
                </a>
            </div>



               
        </div>
    </div>
</div>

@endsection
