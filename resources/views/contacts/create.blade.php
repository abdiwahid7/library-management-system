@extends('memberlayout.member')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100">
    <!-- Hero Section -->
    <section class="relative bg-black py-24 text-center overflow-hidden">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/90"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h1 class="text-5xl font-extrabold text-white hover:text-[#E82929] transition duration-300 relative inline-block hover:underline drop-shadow-lg">
                Contact Us
            </h1>
            <p class="text-lg text-gray-300 mt-4 max-w-lg mx-auto">
                We’d love to hear from you! Reach out to us anytime.
            </p>
        </div>
        <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 w-[120vw] h-40 bg-gradient-to-r from-[#E82929]/20 via-transparent to-[#E82929]/20 blur-2xl opacity-60"></div>
    </section>

    <!-- Contact Section -->
    <section class="container mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="bg-white/80 backdrop-blur-lg p-10 shadow-2xl rounded-2xl border border-green-100">
            <h2 class="text-3xl font-semibold mb-6 text-green-700">Send Us a Message</h2>
            <form class="space-y-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" class="w-full p-4 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E82929] transition" placeholder="Enter your name">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" class="w-full p-4 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E82929] transition" placeholder="Enter your email">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Subject</label>
                    <input type="text" class="w-full p-4 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E82929] transition" placeholder="Subject">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Message</label>
                    <textarea rows="5" class="w-full p-4 border border-green-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E82929] transition" placeholder="Write your message"></textarea>
                </div>
                <button type="submit" class="w-full py-4 bg-[#E82929] text-white font-bold rounded-lg hover:opacity-90 transition text-lg shadow-lg">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info & Map -->
        <div class="space-y-8">
            <!-- Contact Information -->
            <div class="bg-white/80 backdrop-blur-lg p-8 shadow-2xl rounded-2xl border border-green-100">
                <h2 class="text-3xl font-semibold mb-6 text-green-700">Get In Touch</h2>
                <div class="flex items-center space-x-4 mb-4">
                    <i class="fas fa-envelope text-[#E82929] text-2xl"></i>
                    <a href="mailto:info@libraryMs.com" class="text-lg text-gray-700 hover:text-[#E82929] transition">
                        info@libraryMs.com
                    </a>
                </div>
                <div class="flex items-center space-x-4 mb-4">
                    <i class="fas fa-phone text-[#E82929] text-2xl"></i>
                    <a href="tel:+254739944882" class="text-lg text-gray-700 hover:text-[#E82929] transition">
                        +254 739 944 882
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-map-marker-alt text-[#E82929] text-2xl"></i>
                    <a href="https://www.google.com/maps?q=-1.2587008747483714,36.805838322747114" target="_blank"
                       class="text-lg text-gray-700 hover:text-[#E82929] transition">
                       Chiromo Campus Library<br>
                       University of Nairobi<br>
                       Mpaka Road, Westlands, Nairobi
                    </a>
                </div>
            </div>
            <!-- Google Map -->
            <div class="w-full h-64 shadow-lg rounded-2xl overflow-hidden border border-green-100">
                <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.158063820518!2d36.805838322747114!3d-1.2587008747483714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f173b7a3e9a1f%3A0x5b2b5c2b5e4e5e5e!2sWestpoint%20Building%2C%20Mpaka%20Road%2C%20Westlands%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1616161616161!5m2!1sen!2ske"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
</div>
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
