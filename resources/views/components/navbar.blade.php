<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link-active href="/" :active="request()->is('/')">Home</x-nav-link-active>
                        <x-nav-link-active href="/skill" :active="request()->is('skill')">Skill</x-nav-link-active>
                        <x-nav-link-active href="/project" :active="request()->is('project')">Projek</x-nav-link-active>
                        <x-nav-link-active href="/certificate" :active="request()->is('certificate')">Certificate</x-nav-link-active>
                        <x-nav-link-active href="/about" :active="request()->is('about')">About</x-nav-link-active>
                        <x-nav-link-active href="/contact" :active="request()->is('contact')">Contact</x-nav-link-active>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->usertype == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="bg-gray-400 text-black py-2 px-6 rounded-md">Admin Dashboard</a>
                            @endif
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                        <svg class="h-8 w-8 rounded-full" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" fill="#d2d5db">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div x-show="isOpen" @click.outside="isOpen = false"
                                    x-transition:enter="transition ease-out duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75 transform"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-gray-300 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none">
                                Log in
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="isOpen = !isOpen" type="button"
                    class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu closed: show menu icon -->
                    <svg :class="isOpen ? 'hidden' : 'block'" class="h-6 w-6" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: show "X" icon -->
                    <svg :class="isOpen ? 'block' : 'hidden'" class="h-6 w-6" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" class="md:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-nav-link-active href="/" :active="request()->is('/')">Home</x-nav-link-active>
            <x-nav-link-active href="/skill" :active="request()->is('skill')">Skill</x-nav-link-active>
            <x-nav-link-active href="/project" :active="request()->is('project')">Projek</x-nav-link-active>
            <x-nav-link-active href="/certificate" :active="request()->is('certificate')">Certificate</x-nav-link-active>
            <x-nav-link-active href="/about" :active="request()->is('about')">About</x-nav-link-active>
            <x-nav-link-active href="/contact" :active="request()->is('contact')">Contact</x-nav-link-active>
        </div>
    </div>
</nav>
