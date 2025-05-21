@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl">
            <div class="p-8 border-b border-gray-100">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-green-700">Members</h2>
                    <a href="{{ route('members.create') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow transition duration-300">
                        <span class="material-icons">person_add</span>
                        Add New Member
                    </a>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full divide-y divide-green-200">
                        <thead class="bg-green-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Member Since</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-green-100">
                            @forelse ($members as $member)
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900">{{ $member->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $member->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $member->membership_date->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex gap-3">
                                        <a href="{{ route('members.edit', $member->id) }}"
                                           class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                                            <span class="material-icons text-sm mr-1">edit</span>Edit
                                        </a>
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-700 text-white rounded-lg transition duration-200">
                                                <span class="material-icons text-sm mr-1">delete</span>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-gray-500 py-6">No members found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
