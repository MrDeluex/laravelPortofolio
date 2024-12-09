<x-layouts.admin>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full flex flex-col justify-center items-center">
            <div class="bg-gray-900 text-gray-300 w-2/3 p-12 rounded-lg flex flex-col-reverse justify-center items-center">
                <table class="w-full">
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="title" placeholder="Title" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <textarea class="w-full text-gray-950" name="description" placeholder="Description" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="link">Link</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <textarea class="w-full text-gray-950" name="link" placeholder="link"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="date" name="date" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="image">Image</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="file" name="image" accept="image/" id="image" onchange="previewImage(event)">
                        </td>
                    </tr>
                </table>

                <div class="w-2/3 mb-2">
                    <img id="imagePreview" src="" alt="Image Preview" class="w-full h-auto hidden rounded-md"/>
                </div>
            </div>

            <div class="w-2/3 flex justify-end">
                <button class="text-white bg-gray-900 my-6 py-2 px-6 rounded-md" type="submit">Tambah Project</button>
            </div>
        </div>
    </form>

    <style>
        table td:nth-child(1) {
            width: 15%;
        }

        table td:nth-child(2) {
            width: 5%;
        }

        table td:nth-child(3) {
            width: 80%;
        }
    </style>

    <!-- Script untuk preview gambar -->
    <script>
        function previewImage(event) {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            
            // Tampilkan gambar hanya jika file dipilih
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
</x-layouts.admin>
