<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryMS</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero {
            background: linear-gradient(135deg, #e0f2fe 0%, #f0fdf4 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 10px 24px 0 rgba(16, 185, 129, 0.12);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">
<div class="min-h-screen flex flex-col hero">

    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur shadow sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="text-2xl font-extrabold text-green-600 tracking-wide">LibraryMS</div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Home</a>
                    <a href="{{ route('books.front') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Books</a>
                    <a href="{{ route('services.front') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Services</a>
                    <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Contact Us</a>
                    <a href="/login" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Login</a>
                    <a href="/register" class="text-gray-600 hover:text-green-600 px-3 py-2 font-medium transition">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <div class="text-xl font-bold">LibraryMS</div>
                <p class="text-gray-400 mt-2">© {{ date('Y') }} Library Management System</p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-white" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white" aria-label="GitHub">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
