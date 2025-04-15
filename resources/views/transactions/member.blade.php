@extends('memberlayout.member')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Transactions</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrowed On</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Returned On</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->book->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->member->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->transaction_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($transaction->return_date)
                                {{ $transaction->return_date->format('M d, Y') }}
                            @else
                                <span class="text-red-500">Not Returned</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
</div>
@endsection
