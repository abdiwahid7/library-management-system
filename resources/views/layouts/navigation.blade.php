<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur shadow sticky top-0 z-40 border-b border-green-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-green-700" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Dashboard Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('authors.index')" :active="request()->routeIs('authors.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Authors') }}
                        </x-nav-link>
                        <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Members') }}
                        </x-nav-link>
                        <x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Transactions') }}
                        </x-nav-link>
                    @elseif(auth()->user()->role === 'member')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Dashboard Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.member')" :active="request()->routeIs('books.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('transactions.member')" :active="request()->routeIs('transactions.*')" class="hover:text-[#E82929] font-semibold transition">
                            {{ __('Transactions') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-green-700 bg-white hover:text-[#E82929] focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4 text-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:text-[#E82929]">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="hover:text-[#E82929]">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-green-700 hover:text-[#E82929] hover:bg-green-100 focus:outline-none focus:bg-green-100 focus:text-[#E82929] transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/95 backdrop-blur border-b border-green-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hover:text-[#E82929] font-semibold transition">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if(auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Books') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('authors.index')" :active="request()->routeIs('authors.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Authors') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Members') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Transactions') }}
                </x-responsive-nav-link>
            @elseif(auth()->user()->role === 'member')
                <x-responsive-nav-link :href="route('books.member')" :active="request()->routeIs('books.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Books') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('transactions.member')" :active="request()->routeIs('transactions.*')" class="hover:text-[#E82929] font-semibold transition">
                    {{ __('Transactions') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-green-200">
            <div class="px-4">
                <div class="font-medium text-base text-green-700">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="hover:text-[#E82929]">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="hover:text-[#E82929]"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
