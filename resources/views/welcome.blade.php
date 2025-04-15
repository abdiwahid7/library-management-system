<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>

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
<body class="font-sans antialiased">
    <div class="min-h-screen hero flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="text-xl font-bold text-blue-600">LibraryMS</div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2">Books</a>
                        <a href="{{ route('members.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2">Members</a>
                        <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2">Transactions</a>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="flex-grow flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-16">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Welcome to Library Management System</h1>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    A complete solution for managing your library's books, members, and transactions.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('books.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition duration-300">
                        Browse Books
                    </a>
                    <a href="{{ route('members.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-600 transition duration-300">
                        View Members
                    </a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Key Features</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-book text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Book Management</h3>
                        <p class="text-gray-600">Easily add, edit, and track all books in your library's collection.</p>
                    </div>
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-users text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Member Tracking</h3>
                        <p class="text-gray-600">Manage library members and their borrowing history.</p>
                    </div>
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-exchange-alt text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Transaction System</h3>
                        <p class="text-gray-600">Track book checkouts, returns, and overdue items.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="text-xl font-bold">LibraryMS</div>
                        <p class="text-gray-400 mt-2">© {{ date('Y') }} Library Management System</p>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
