@extends('websitelayout.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Members</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($members as $member)
            <div class="border rounded p-4 shadow">
                <h2 class="text-xl font-semibold">{{ $member->name }}</h2>
                <p class="text-gray-600">Email: {{ $member->email }}</p>
                <p class="text-gray-600">Membership Date: {{ $member->membership_date->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $members->links() }}
    </div>
</div>
@endsection
