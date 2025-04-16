@extends('adminlayout.admin')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $user->updated_at->format('d M Y, H:i') }}</p>
    </div>
    <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Back to Users</a>
</div>
@endsection
