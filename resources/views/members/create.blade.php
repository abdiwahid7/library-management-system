@extends('adminlayout.admin')

@section('content')
<div class="py-12 bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8 border-b border-gray-100">
                <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
                    <span class="material-icons">person_add</span>
                    Add New Member
                </h2>

                <form method="POST" action="{{ route('members.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block text-green-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" autofocus
                            class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-green-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="membership_date" class="block text-green-700 text-sm font-bold mb-2">Membership Date</label>
                        <input type="date" name="membership_date" id="membership_date" value="{{ old('membership_date') }}"
                            class="shadow appearance-none border border-green-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('membership_date') border-red-500 @enderror">
                        @error('membership_date')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                            <span class="material-icons text-base">save</span>
                            Save Member
                        </button>
                        <a href="{{ route('members.index') }}"
                            class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-300 flex items-center gap-2">
                            <span class="material-icons text-base">arrow_back</span>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
