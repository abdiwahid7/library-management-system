@extends('websitelayout.app')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-green-700 mb-8">Members</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($members as $member)
                <div class="bg-white/90 border border-green-100 rounded-2xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col">
                    <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $member->name }}</h2>
                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Email:</span> {{ $member->email }}</p>
                    <p class="text-sm text-gray-600"><span class="font-medium">Membership Date:</span> {{ $member->membership_date->format('M d, Y') }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $members->links() }}
        </div>
    </div>
</div>
@endsection
