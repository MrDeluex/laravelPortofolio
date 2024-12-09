<div class="p-2">
    <nav class="bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 w-full h-16 rounded-full flex justify-end items-center px-8" x-data="{ isOpen: false }">
        <div class="relative">
            <div>
                <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <div class="w-12 h-12 rounded-full border-gray-50 border-2">
                    </div>
                </button>
            </div>


            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
                        {{ __('Log Out') }}
                    </button>
                </form> 
            </div>
        </div>
    </nav>
</div>