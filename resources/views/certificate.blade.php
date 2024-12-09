<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

<x-layouts.users>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- component -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 mx-auto">
            <div class="flex flex-wrap justify-around items-center -m-4">
                @foreach ($certificates as $certificate)
                    <div class="lg:w-1/3 h-auto sm:w-1/2 p-4">
                        <div class="flex relative h-60">
                            <!-- Container untuk background -->
                            <div id="certificate-{{ $certificate->id }}" 
                                 class="absolute inset-0 w-full h-full bg-cover bg-center" 
                                 style="background-image: url('');">
                                <!-- Fallback jika PDF tidak ada -->
                                @if (!$certificate->pdf)
                                    <div class="flex items-center justify-center h-full">
                                        <p>No Image</p>
                                    </div>
                                @endif
                            </div>
                            <!-- Overlay untuk deskripsi -->
                            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 transition-opacity duration-500">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $certificate->title }}</h1>
                                <p class="leading-relaxed overflow-hidden text-ellipsis">{{ Str::limit($certificate->description, 90, '...') }}</p>
                                <p class="text-gray-900 mt-2 text-sm">{{ $certificate->date }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
</x-layouts.users>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    @foreach ($certificates as $certificate)
        if ("{{ $certificate->pdf }}") {
            var pdfUrl = "{{ asset('storage/' . $certificate->pdf) }}";
            var containerId = "certificate-{{ $certificate->id }}";
            renderPdfAsImage(pdfUrl, containerId);
        }
    @endforeach
});

function renderPdfAsImage(pdfUrl, containerId) {
    // Memuat PDF menggunakan PDF.js
    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        // Mengambil halaman pertama
        pdf.getPage(1).then(function(page) {
            var scale = 1.5; // Atur skala sesuai kebutuhan
            var viewport = page.getViewport({ scale: scale });

            // Membuat elemen canvas
            var canvas = document.createElement("canvas");
            var context = canvas.getContext("2d");
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Merender halaman ke canvas
            page.render({
                canvasContext: context,
                viewport: viewport
            }).promise.then(function() {
                // Mengubah canvas ke data URL
                var imageUrl = canvas.toDataURL("image/jpeg");
                document.getElementById(containerId).style.backgroundImage = `url('${imageUrl}')`;
            });
        });
    }).catch(function(error) {
        console.error("Error loading PDF: ", error);
    });
}

</script>