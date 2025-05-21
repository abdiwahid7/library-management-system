<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-green-600 via-green-500 to-green-400 text-white flex flex-col p-6 shadow-lg rounded-tr-3xl rounded-br-3xl">
            <div class="mb-10 flex items-center space-x-3">
                <span class="material-icons text-4xl">account_circle</span>
                <span class="text-2xl font-extrabold tracking-wide">Member Panel</span>
            </div>
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition font-medium">
                            <span class="material-icons mr-3">dashboard</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.member') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition font-medium">
                            <span class="material-icons mr-3">menu_book</span> Books
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.member') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition font-medium">
                            <span class="material-icons mr-3">build</span> Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts.create') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition font-medium">
                            <span class="material-icons mr-3">contact_mail</span> Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="sticky top-0 z-10 bg-white/80 backdrop-blur shadow flex items-center justify-between px-8 py-4">
                <h1 class="text-2xl font-bold text-green-700 tracking-wide">{{ config('app.name') }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">Member</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 transition text-white font-semibold px-4 py-2 rounded-lg shadow">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <section class="flex-1 p-8">
                <div class="bg-white rounded-2xl shadow-xl p-8 min-h-[70vh]">
                    @yield('content')
                </div>
            </section>
        </main>
    </div>
</body>

</html>
