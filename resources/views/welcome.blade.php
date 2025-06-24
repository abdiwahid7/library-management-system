@extends('layouts.website')

@section('content')


 <!-- Hero Section with Background Image Slider -->
 <section class="relative h-[70vh] flex items-center text-center text-white overflow-hidden mt-19"
    x-data="{
        currentSlide: 0,
        slides: [
            'https://images.pexels.com/photos/7944238/pexels-photo-7944238.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'https://images.pexels.com/photos/7942534/pexels-photo-7942534.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'https://images.pexels.com/photos/7972735/pexels-photo-7972735.jpeg?auto=compress&cs=tinysrgb&w=1200'
        ],
        init() {
            this.startCarousel();
        },
        startCarousel() {
            setInterval(() => {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            }, 3000);
        }
    }">

    <!-- Background Image with bg-cover -->
    <div class="absolute inset-0 bg-cover bg-center transition-all duration-500"
        :style="{ backgroundImage: 'url(' + slides[currentSlide] + ')' }">
    </div>

    <!-- Lighter Overlay for Better Visibility -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Content -->
    <div class="container mx-auto px-6 relative z-10 max-w-3xl">
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight drop-shadow-lg">
            Connect, Grow, <span class="text-[#E82929]">Succeed</span>
        </h1>
        <p class="mt-4 text-lg md:text-2xl font-light text-gray-200">
            Join the IST Alumni Network and expand your opportunities through lifelong connections.
        </p>

        <div class="mt-6 flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('register') }}"
                class="bg-[#E82929] text-white font-semibold px-6 py-3 rounded-full hover:bg-[#E82929] transition shadow-md">
                Get Started
            </a>
            <a href="{{ route('login') }}"
                class="border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-[#E82929] transition shadow-md">
                Member Login
            </a>
        </div>
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-0 left-0 right-0 flex justify-center mb-4">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index"
                :class="{ 'bg-white': currentSlide === index, 'bg-gray-400': currentSlide !== index }"
                class="w-3 h-3 mx-1 rounded-full transition">
            </button>
        </template>
    </div>

</section>
<!-- end -->



<!-- About section with an image and text content -->
<section id="aboutSection" class="py-16 relative bg-gray-100 rounded-3xl mt-5 shadow-lg transition-all duration-500 hover:scale-[0.98] hover:shadow-xl opacity-0 translate-y-10 ">
  <div class="container mx-auto px-6 relative z-10">
     <!-- Section Heading -->
        <h2 class="text-4xl font-bold text-gray-800 text-center mb-10 transition-all duration-300 hover:text-[#E82929] hover:underline underline-offset-8">
                About Us
        </h2>

        <div class="flex flex-col md:flex-row items-center gap-6">
            <!-- Image -->
            <div class="w-full md:w-1/2 flex justify-center">
                 <img src="{{ ($about && $about->image && file_exists(public_path('storage/' . $about->image)))
    ? asset('storage/' . $about->image)
    : 'https://images.pexels.com/photos/7942464/pexels-photo-7942464.jpeg?auto=compress&cs=tinysrgb&w=600' }}"
     alt="About IST Alumni"
     class="w-3/4 md:w-[80%] rounded-lg shadow-lg transition-transform duration-500 hover:scale-105 hover:rotate-1">

            </div>

            <!-- Text Content -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2
                    class="text-3xl md:text-4xl font-bold text-gray-800 transition-all duration-300 hover:text-[#E82929] hover:underline underline-offset-8">
                    <a href="#">{{ $about->title ?? 'About IST Alumni Network' }}</a>
                </h2>
                <p class="mt-4 text-gray-700 opacity-0 transition-opacity duration-700 delay-200">
                     {{ $about->content ?? 'The IST Alumni Network is a community that connects past students to foster lifelong relationships, career opportunities, and mentorship.' }}
                </p>
                <p class="mt-2 text-gray-700 opacity-0 transition-opacity duration-700 delay-500">
                    Our mission is to keep alumni engaged and provide opportunities to reconnect, learn, and grow. Join
                    us to stay updated on events and ways to give back to <strong
                     class="font-black text-gray-900">IST</strong>!
                </p>
                <a href="/about"
                    class="mt-6 inline-block bg-[#E82929] text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300 hover:scale-110 hover:bg-[#c71f1f]">
                    Learn More
                </a>
                </div>
            </div>
        </div>
    </section>
<!-- end -->


<!-- Mission, Vision & Why Join Us Section -->
<section class="py-12 relative mt-5 ">
        <div class="container mx-auto px-6 text-center">
            <!-- Section Heading -->
            <h2
                class="text-4xl font-bold text-gray-800 mb-8 transition-all duration-300 hover:text-[#E82929] hover:underline underline-offset-8">
                Our Mission, Vision & Why Join Us
            </h2>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Mission -->
                <div
                    class="p-6 bg-white rounded-xl shadow-lg shadow-gray-400 transition-transform duration-500 hover:scale-105">
                    <div class="flex items-center justify-center text-[#E82929] text-4xl mb-3">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Our Mission</h3>
                    <p class="text-gray-700 transition-all duration-300 hover:text-gray-900">
                        To build a strong alumni community that fosters lifelong connections, career growth, and mutual
                        support.
                    </p>
                </div>

                <!-- Vision -->
                <div
                    class="p-6 bg-white rounded-xl shadow-lg shadow-gray-400 transition-transform duration-500 hover:scale-105">
                    <div class="flex items-center justify-center text-[#E82929] text-4xl mb-3">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Our Vision</h3>
                    <p class="text-gray-700 transition-all duration-300 hover:text-gray-900">
                        To create an engaged and supportive alumni network that empowers members and contributes to society.
                    </p>
                </div>

                <!-- Why Join Us -->
                <div
                    class="p-6 bg-white rounded-xl shadow-lg shadow-gray-400 transition-transform duration-500 hover:scale-105">
                    <div class="flex items-center justify-center text-[#E82929] text-4xl mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Why Join Us?</h3>
                    <p class="text-gray-700 transition-all duration-300 hover:text-gray-900">
                        Connect with alumni, gain mentorship, access career opportunities, and be part of a lifelong
                        network.
                    </p>
                </div>
            </div>
        </div>
    </section>
<!-- end -->

<!-- Alumni Profiles Section -->
<div class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center hover:text-[#E82929] hover:underline underline-offset-8">All Alumni Profiles</h1>

    @if($users->isEmpty())
        <p class="text-center text-lg text-gray-500">No alumni profiles available.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                    <!-- Profile Image -->
                    <div class="flex justify-center p-4 bg-gray-50">
                        <img src="{{ optional($user->alumniProfile)->image ? asset('storage/' . $user->alumniProfile->image) : 'https://images.pexels.com/photos/7944131/pexels-photo-7944131.jpeg?auto=compress&cs=tinysrgb&w=600' }}"
                             alt="Profile Image"
                             class="w-32 h-32 object-cover rounded-full border-4 border-indigo-500 shadow-md">
                    </div>

                    <!-- Profile Info -->
                    <div class="px-6 pb-6">
                        <h3 class="text-xl font-semibold text-rose-800 mb-2">{{ $user->name }}</h3>
                        <p class="text-gray-700 text-sm mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                        @if($user->alumniProfile)
                            <p class="text-gray-700 text-sm mb-1"><strong>Phone:</strong> {{ $user->alumniProfile->phone ?? 'Not provided' }}</p>
                            <p class="text-gray-700 text-sm mb-1"><strong>Address:</strong> {{ $user->alumniProfile->address ?? 'Not provided' }}</p>
                            <p class="text-gray-700 text-sm mb-1"><strong>Graduation Year:</strong> {{ $user->alumniProfile->graduation_year ?? 'Not provided' }}</p>
                            <p class="text-gray-700 text-sm mt-3"><strong>Bio:</strong><br>
                                <span class="block mt-1 text-gray-600">{{ $user->alumniProfile->bio ?? 'Not provided' }}</span>
                            </p>
                        @else
                            <p class="text-gray-600 text-sm">No alumni profile available</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<!-- end -->


<!-- Events Section -->
<section class="py-12">
    <div class="container mx-auto px-6 text-center">
        <!-- Section Heading -->
        <h2 class="text-4xl font-bold text-gray-800 mb-8 transition-all duration-300 hover:text-[#E82929] hover:underline underline-offset-8">
            Upcoming Events
        </h2>

        <!-- Event Cards -->
        @if($events->isEmpty())
            <p class="text-xl text-gray-600">No upcoming events at the moment.</p>
        @else
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-500 hover:scale-105">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-52 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-3">{{ $event->title }}</h3>
                            <p class="text-gray-700">{{ Str::limit($event->description, 100) }}</p>
                            <p class="mt-2 text-gray-600 text-sm">
                                <i class="fas fa-calendar-alt text-[#E82929]"></i>
                                {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                                @if($event->event_time)
                                    at {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<!-- end -->

    <!-- Gallery Slider Section -->
    <section class="w-full py-12 bg-gray-100">
        <div class="container mx-auto px-6 lg:px-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Gallery</h2>

            <!-- Swiper Slider -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=1200"
                      alt="Alumni Together"
                      class="w-full h-[500px] object-cover" />
                </div>
                    <!-- Slide 2 -->
                     <div class="swiper-slide">
                     <img src="https://images.pexels.com/photos/1595391/pexels-photo-1595391.jpeg?auto=compress&cs=tinysrgb&w=1200"
                      alt="Graduation Day"
                      class="w-full h-[500px] object-cover" />
                     </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg" alt="Conference Event"
                            class="w-full h-[500px] object-cover" />
                    </div>
                    <!-- Slide 4 -->
                   <div class="swiper-slide">
                   <img src="https://images.pexels.com/photos/3184405/pexels-photo-3184405.jpeg?auto=compress&cs=tinysrgb&w=1200"
                   alt="Networking Event"
                   class="w-full h-[500px] object-cover" />
                   </div>
                  </div>

                <!-- Pagination and Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- Style to change slider arrows to red-600 -->
<style>
  .swiper-button-next,
  .swiper-button-prev {
    color: #dc2626; /* red-600 */
  }
</style>
   <!-- end -->


    <!-- Blog Section -->
    <div class="container mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-8 transition-all duration-300 hover:text-[#E82929] hover:underline underline-offset-8">
            Latest Blogs
        </h2>

        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach ($blogs as $blog)
                <div class="bg-white rounded-xl shadow-lg p-4 flex flex-col">
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="rounded-lg mb-3 w-full h-48 object-cover"
                            alt="Blog Image">
                    @endif

                    <h3 class="text-xl font-semibold text-gray-800">{{ $blog->title }}</h3>

                    <p class="text-gray-500 text-sm mb-2">
                        <i class="fas fa-calendar-alt text-red-500 mr-1"></i>
                        {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') : 'Not Published' }}
                    </p>

                    <p class="text-gray-600 transition-all ease-in-out duration-300" id="blog-full-description-{{ $blog->id }}">
                        {{ strip_tags($blog->description) }}
                    </p>


                </div>
            @endforeach
        </div>

    </div>
    <!-- end -->

<!-- All Announcements Section -->
<div class="container mx-auto px-6 mt-12">
    <h2 class="text-4xl text-center font-bold text-gray-800 mb-8 transition-all duration-300 hover:text-red-600 hover:underline underline-offset-8">
        All Announcements
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($announcements as $announcement)
        <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-xl transition-shadow duration-300">
            @if ($announcement->image)
                <img src="{{ asset('storage/' . $announcement->image) }}" class="rounded-lg mb-3 w-full h-48 object-cover" alt="Announcement Image">
            @endif

            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $announcement->title }}</h3>

            <p class="text-gray-600 mb-2">
                {{ strip_tags($announcement->description) }}
            </p>

            <p class="text-gray-500 text-sm mb-1">
                <i class="fas fa-calendar-alt text-red-500 mr-1"></i>
                {{ $announcement->published_at ? \Carbon\Carbon::parse($announcement->published_at)->format('M d, Y') : 'Not Published' }}
            </p>

            <p class="text-sm text-gray-500">
                Status:
                <span class="{{ $announcement->is_active ? 'text-green-500' : 'text-red-500' }}">
                    {{ $announcement->is_active ? 'Active' : 'Inactive' }}
                </span>
            </p>
        </div>
        @endforeach
    </div>


</div>
<!-- end -->


<!-- Testimonials Section -->
 <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-6 lg:px-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8"> Testimonials </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-700 italic">“This network has helped me connect with amazing mentors and
                        opportunities!”</p>
                    <p class="mt-4 font-semibold text-gray-800">— Alex Johnson</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-700 italic">“Being a part of this alumni group has been an incredible experience.”
                    </p>
                    <p class="mt-4 font-semibold text-gray-800">— Mary Doe</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-700 italic">“The events and support from this network are invaluable. Highly
                        recommend!”</p>
                    <p class="mt-4 font-semibold text-gray-800">— John Doe</p>
                </div>
            </div>
        </div>
</section>



<!-- Call to Action Section -->
 <section class="relative bg-cover bg-center py-16 text-white"
        style="background-image: url('https://images.pexels.com/photos/3184439/pexels-photo-3184439.jpeg');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <div class="container mx-auto px-6 lg:px-12 relative text-center">
            <h2 class="text-4xl font-bold mb-4">Stay Connected with Your Alumni</h2>
            <p class="text-lg text-gray-300 mb-6">Join our network to engage with fellow graduates, attend exclusive events,
                and unlock new opportunities.</p>

            <a href="/register"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300">Join
                Now</a>
        </div>
</section>

    @vite(['resources/js/app.js'])

@endsection
