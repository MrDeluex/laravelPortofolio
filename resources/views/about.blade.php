<x-layouts.users>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- component -->
    <div class="py-16 bg-white">
        <div class="container m-auto px-4 sm:px-6 lg:px-8 text-gray-600">
            <div class="space-y-6 md:space-y-0 md:flex md:items-center md:gap-6 lg:gap-12">
                <!-- Image Section -->
                <div class="w-full h-64 md:h-80 md:w-5/12 border-b-2 border-gray-900 rounded-lg bg-cover bg-center" 
                    style="background-image: url('{{ asset('storage/' . $about->image) }}');">
                </div>
                
                <!-- Text Section -->
                <div class="w-full md:w-7/12 lg:w-6/12">
                    <h2 class="text-xl font-bold text-gray-900 sm:text-2xl md:text-3xl lg:text-4xl">
                        {{ $about->title }}
                    </h2>
                    <p class="mt-4 text-sm text-gray-600 sm:text-base md:text-lg">
                        {{ $about->description }}
                    </p>
                    <div class="mt-6 flex justify-end">
                        <p class="text-xs text-gray-600 sm:text-sm md:text-base">
                            {{ \Carbon\Carbon::parse($about->date)->format('F j, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.users>
