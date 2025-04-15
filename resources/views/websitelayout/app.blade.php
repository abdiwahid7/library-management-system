<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">{{ config('app.name', 'Library Management System') }}</a>
            <nav>
                <ul class="flex space-x-4 text-gray-700">
                    <li><a href="{{ url('/') }}" class="hover:text-gray-900">Home</a></li>
                    <li><a href="{{ route('books.front') }}" class="hover:text-gray-900">Books</a></li>
                    <li><a href="{{ route('members.front') }}" class="hover:text-gray-900">Members</a></li>
                    <li><a href="{{ route('transactions.front') }}" class="hover:text-gray-900">Transactions</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-12 py-4">
        <div class="container mx-auto px-4 text-center text-gray-600 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name', 'Library Management System') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
