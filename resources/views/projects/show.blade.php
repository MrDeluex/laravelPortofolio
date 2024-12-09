<x-layouts.users>
    <x-slot:title>{{ $project->title }}</x-slot:title>
    <section class="m-12 space-y-8">
        <!-- Header Gambar -->
        <div class="relative w-full h-96 bg-gray-200 overflow-hidden rounded-lg">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                class="absolute top-0 left-0 w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-transparent to-transparent p-6">
                <h1 class="text-4xl font-bold text-white">{{ $project->title }}</h1>
                <span class="text-sm text-gray-300">{{ $project->date }}</span>
            </div>
        </div>

        <!-- Konten Deskripsi -->
        <div class="prose max-w-4xl mx-auto">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Tentang Proyek</h2>
            <p class="text-gray-700 leading-relaxed">
                {{ $project->description }}
            </p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-center space-x-4">
            <a href="{{ $project->link }}" target="_blank"
                class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700">
                Kunjungi Proyek
            </a>
            <a href="/project"
                class="px-6 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg shadow hover:bg-gray-200">
                Kembali ke Semua Proyek
            </a>
        </div>
    </section>
</x-layouts.users>
