@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Member Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Welcome, {{ auth()->user()->name }}! This is your member dashboard.</p>
                    <p>You can view books and check the status of your transactions here.</p>
                    <a href="{{ route('books.member') }}" class="text-blue-500 underline">View Books</a>
                    <br><br>
                    <h3 class="text-lg font-semibold">Your Transactions</h3>
                    <ul>
                        @foreach($transactions as $transaction)
                            <li>
                                Book: {{ $transaction->book->title }} -
                                Status:
                                @if($transaction->return_date)
                                    Returned on {{ $transaction->return_date->format('M d, Y') }}
                                @else
                                    <span class="text-red-500">Not Returned</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
