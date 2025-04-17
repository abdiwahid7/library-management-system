<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-green-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-green-600 text-white p-5">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <ul class="mt-6">
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('books.index') }}">Books</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('members.index') }}">Members</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('authors.index') }}">Authors</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('transactions.index') }}">Transaction</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('services.index') }}">Services</a></li>
                <li class="py-2 px-4 hover:bg-green-700 rounded"><a href="{{ route('users.index') }}">User Management</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <div class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-green-600">{{ config('app.name') }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-green-600">Admin</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
                @auth
                    <h1 class="text-4xl md:text-5xl font-bold text-green-600 mb-6">Welcome, {{ auth()->user()->name }}!</h1>
                @else
                    <h1 class="text-4xl md:text-5xl font-bold text-green-600 mb-6">Welcome to the Admin Panel</h1>
                @endauth

                <p class="text-xl text-green-200 mb-8 max-w-3xl mx-auto">
                    Manage your library's users, books, and transactions efficiently.
                </p>

                <div class="flex justify-center flex-wrap gap-4">
                    <a href="{{ route('users.index') }}"
                       class="bg-white text-green-600 px-6 py-3 rounded-lg font-medium hover:bg-green-50 transition duration-300">
                        Manage Users
                    </a>
                    <a href="{{ route('books.index') }}"
                       class="bg-green-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 transition duration-300">
                        Manage Books
                    </a>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>


</body>
</html>
