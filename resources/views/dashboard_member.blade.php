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
                    <h3 class="text-xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-700 mb-4">This is your member dashboard where you can manage your books and transactions.</p>
                    <a href="{{ route('books.member') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        View Books
                    </a>
                </div>

                <!-- Transactions Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6 md:col-span-2">
                    <h3 class="text-xl font-semibold mb-4">Your Transactions</h3>
                    @if($transactions->isEmpty())
                        <p class="text-gray-600">You have no transactions at the moment.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($transactions as $transaction)
                                <li class="py-4 flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $transaction->book->title }}</p>
                                        <p class="text-sm text-gray-600">Borrowed on {{ $transaction->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        @if($transaction->return_date)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Returned on {{ $transaction->return_date->format('M d, Y') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                                <svg class="w-4 h-4 mr-1 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Not Returned
                                            </span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
