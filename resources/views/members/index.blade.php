@extends('adminlayout.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Members</h2>
                    <a href="{{ route('members.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                        + Add New Member
                    </a>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium">Name</th>
                                <th class="px-6 py-3 text-left font-medium">Email</th>
                                <th class="px-6 py-3 text-left font-medium">Member Since</th>
                                <th class="px-6 py-3 text-left font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($members as $member)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $member->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $member->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $member->membership_date->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex gap-3">
                                        <a href="{{ route('members.edit', $member->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 font-medium transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition">
                                                Delete
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

@endsection
