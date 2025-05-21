@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8 border-b border-gray-100">
                <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
                    <span class="material-icons">edit</span>
                    Edit Transaction
                </h2>

                <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="book_id" class="block text-green-700 text-sm font-bold mb-2">Book</label>
                        <select name="book_id" id="book_id"
                                class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('book_id') border-red-500 @enderror">
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id', $transaction->book_id) == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="member_id" class="block text-green-700 text-sm font-bold mb-2">Member</label>
                        <select name="member_id" id="member_id"
                                class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('member_id') border-red-500 @enderror">
                            <option value="">Select Member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ old('member_id', $transaction->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="transaction_date" class="block text-green-700 text-sm font-bold mb-2">Transaction Date</label>
                        <input type="date" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date) }}"
                               class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('transaction_date') border-red-500 @enderror">
                        @error('transaction_date')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                            <span class="material-icons text-base">save</span>
                            Update Transaction
                        </button>
                        <a href="{{ route('transactions.index') }}"
                           class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                            <span class="material-icons text-base">arrow_back</span>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
