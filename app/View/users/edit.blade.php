@extends('adminlayout.admin')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
            <select name="role" id="role" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
</div>
@endsection
