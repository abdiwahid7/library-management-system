<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Layout</title>
      <!-- Tailwind CSS -->
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .hero {
        background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
    }
    .feature-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
</style>
</head>
<body>
<body class="font-sans antialiased">
<div class="min-h-screen hero flex flex-col">

    <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="text-xl font-bold text-blue-600">LibraryMS</div>
                    </div>
                    <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="hover:text-gray-900">Home</a></li>
                    <a href="{{ route('books.front') }}" class="hover:text-gray-900">Books</a></li>
                    <a href="{{ route('members.front') }}" class="hover:text-gray-900">Members</a></li>
                    <a href="{{ route('transactions.front') }}" class="hover:text-gray-900">Transactions</a></li>
                    </div>
                </div>
            </div>
    </nav>
   

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <footer>
        <!-- Footer content can be added here -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
