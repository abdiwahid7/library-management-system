@extends('websitelayout.app')

@section('content')
<div class="py-16 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-green-700 mb-10 text-center drop-shadow-lg">Our Library Members</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse ($members as $member)
                <div class="bg-white/90 border border-green-100 rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-300 hover:-translate-y-2 p-6 flex flex-col">
                    <h2 class="text-xl font-bold text-green-700 mb-2">{{ $member->name }}</h2>
                    <p class="text-gray-600 mb-1"><span class="font-medium">Email:</span> {{ $member->email }}</p>
                    <p class="text-gray-500"><span class="font-medium">Member Since:</span> {{ $member->membership_date->format('M d, Y') }}</p>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No members found.
                </div>
            @endforelse
        </div>
        <div class="mt-10 flex justify-center">
            {{ $members->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
