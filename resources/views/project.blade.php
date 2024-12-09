<x-layouts.users>
    <style>
         .slick-slide {
        padding: 0 10px; /* Memberikan jarak antar card */
    }

    .card-project {
        display: flex;
        align-items: center;
    }
    </style>

    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="card-project m-12 space-x-12">

        @foreach ($projects as $project)
            <a href="{{ route('projects.show', ['id' => $project->id]) }}">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $project->title }}</h2>
                        <p class="text-gray-700 leading-tight mb-4">
                            {{ Str::limit($project->description, 90, '...') }}
                        </p>
                        <div class="flex justify-end items-center">
                            <span class="text-gray-600">{{ $project->date }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        <!-- Tambah elemen lain untuk carousel -->
    </section>

    <script>
        $(document).ready(function() {
            $('.card-project').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
                autoplay: true, // Aktifkan autoplay
                autoplaySpeed: 3000, 
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>

    
</x-layouts.users>
