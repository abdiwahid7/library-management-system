@extends('websitelayout.app')

@section('content')
<div class="py-16 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-green-700 mb-10 text-center drop-shadow-lg">Recent Transactions</h1>
        <div class="overflow-x-auto rounded-2xl shadow-xl bg-white/90 border border-green-100">
            <table class="min-w-full divide-y divide-green-200">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Book</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Member</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Borrowed On</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Returned On</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-green-100">
                    @forelse ($transactions as $transaction)
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-8">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-10 flex justify-center">
            {{ $transactions->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
