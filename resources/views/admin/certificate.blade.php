<x-layouts.admin>
    <div class="container">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.certificate.create') }}" class="py-2 px-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">Tambah Certificate</a>
        </div>

        <table class="text-left w-full" id="myTable">
            <tr class="w-full bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white">
                <td class="p-4">Id</td>
                <td class="p-4">Title</td>
                <td class="p-4">Description</td>
                
                <td class="p-4">Action</td>
            </tr>
            <?php $n = 1; ?>
            @foreach($certificates as $certificate)
                <tr>
                    <td class="p-4">{{ $n++ }}</td>
                    <td class="p-4">{{ $certificate->title }}</td>
                    <td class="p-4">{{ Str::limit($certificate->description, 90, '...') }}</td>
                    
                    <td class="p-4 flex space-x-2">
                        <button onclick="showModal({{ $certificate->id }})" class="py-2 px-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">Detail</button>
                        <form id="deleteForm-{{ $certificate->id }}" action="{{ route('admin.certificate.destroy', $certificate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="deleteBtn" type="button" onclick="confirmDelete({{ $certificate->id }})" class="py-2 px-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">Hapus</button>
                        </form>
                        <a href="{{ route('admin.certificate.edit', $certificate) }}" class="py-2 px-6 mx-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">Edit</a>

                    </td>
                </tr>

                <!-- Modal -->
                <div id="modal-{{ $certificate->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white w-full max-w-lg rounded-lg shadow-lg overflow-hidden transform transition-all">
                        <div class="flex justify-between items-center bg-gray-800 p-4">
                            <h2 class="text-lg font-semibold text-white">{{ $certificate->title }}</h2>
                            <button class="text-white text-2xl leading-none" onclick="closeModal({{ $certificate->id }})">
                                &times;
                            </button>
                        </div>
                        <div class="p-6 space-y-4">
                            <p><strong>Description:</strong> {{ $certificate->description }}</p>
                            <p><strong>Date:</strong> {{ $certificate->date }}</p>
                            <p><strong>Published By:</strong> {{ $certificate->by }}</p>
                            @if ($certificate->pdf)
                                <p><strong>PDF:</strong> 
                                    <a href="{{ asset('storage/' . $certificate->pdf) }}" target="_blank" class="text-blue-600 hover:underline">View PDF</a>
                                </p>
                            @endif
                        </div>
                        <div class="flex justify-end p-4 bg-gray-100">
                            <button onclick="closeModal({{ $certificate->id }})" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Close</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

    <script>
        function showModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>
</x-layouts.admin>
