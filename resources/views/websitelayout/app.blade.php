<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryMS </title>
      <!-- Tailwind CSS -->
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .hero {
        background: linear-gradient(135deg,rgb(235, 235, 240) 0%,rgb(243, 246, 246) 100%);
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
            <div class="flex justify-between h-16 items-center">
                <div class="text-xl font-bold text-green-600">LibraryMS</div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-green-600 px-3 py-2">Home</a>
                    <a href="{{ route('books.front') }}" class="text-gray-600 hover:text-green-600 px-3 py-2">Books</a>
                    <a href="{{ route('services.front') }}" class="text-gray-600 hover:text-green-600 px-3 py-2">Services</a>
                    <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:text-green-600 px-3 py-2">Contact Us</a>
                    <a href="/login" class="text-gray-600 hover:text-green-600 px-3 py-2">Login</a>
                    <a href="/register" class="text-gray-600 hover:text-green-600 px-3 py-2">Register</a>
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
