@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8 border-b border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-green-700">Book Transactions</h2>
                    <a href="{{ route('transactions.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow transition duration-300">
                        <span class="material-icons text-base">add</span>
                        New Transaction
                    </a>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full divide-y divide-green-200">
                        <thead class="bg-green-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Book</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Member</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Borrowed On</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Returned On</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-green-100">
                            @foreach ($transactions as $transaction)
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->book->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->member->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->transaction_date->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($transaction->return_date)
                                            {{ $transaction->return_date->format('M d, Y') }}
                                        @else
                                            <span class="text-red-500 font-semibold">Not Returned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if(!$transaction->return_date)
                                            <form action="{{ route('transactions.return', $transaction->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">Mark as Returned</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $transactions->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
