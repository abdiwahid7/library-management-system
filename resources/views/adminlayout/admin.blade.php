<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-green-700 via-green-600 to-green-500 text-white flex flex-col p-6 shadow-lg">
            <div class="mb-10 flex items-center space-x-3">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"></circle>
                </svg>
                <span class="text-3xl font-extrabold tracking-wide">Admin Panel</span>
            </div>
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">dashboard</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">menu_book</span> Books
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('members.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">people</span> Members
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('authors.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">person</span> Authors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transactions.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">swap_horiz</span> Transactions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">build</span> Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-800 transition font-medium">
                            <span class="material-icons mr-3">admin_panel_settings</span> User Management
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="mt-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 transition text-white font-semibold py-2 rounded-lg shadow">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="sticky top-0 z-10 bg-white/80 backdrop-blur shadow flex items-center justify-between px-8 py-4">
                <h1 class="text-2xl font-bold text-green-700 tracking-wide">{{ config('app.name') }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">Admin</span>
                </div>
            </header>

            <!-- Content Section -->
            <section class="flex-1 p-8">
                <div class="bg-white rounded-2xl shadow-xl p-8 min-h-[70vh]">
                    @yield('content')
                </div>
            </section>
        </main>
    </div>

    <!-- Google Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>
