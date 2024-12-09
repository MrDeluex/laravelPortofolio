<x-layouts.admin>
    <div class="container flex flex-col justify-center items-center w-full">
        <div class="flex justify-end w-full mb-4">
            <a href="{{ route('admin.contact.create') }}" class="py-2 px-6 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-b text-gray-200 rounded-md">Tambah Contact</a>
        </div>

        <table id="myTable" style="width: 100%; margin-top: 1rem;">
            <thead class="w-full bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-gray-200 rounded-md">
                <td class="p-4">Id</td>
                <td class="p-4">Title</td>
                <td class="p-4">Action</td>
            </thead>
            @foreach($contacts as $contact)
                <tbody>
                    <td class="p-4">{{ $contact->id }}</td>
                    <td class="p-4">{{ $contact->title }}</td>
                    <td class="p-4 flex space-x-4">
                        <button onclick="showModal({{ $contact->id }})" class="py-2 px-6 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-b text-gray-200 rounded-md">Detail</button>
                        <form id="deleteForm-{{ $contact->id }}" action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                            @csrf
                            @method('DELETE')
                            <button id="deleteBtn" onclick="confirmDelete()" type="button" class="py-2 px-6 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-b  text-gray-200 rounded-md">Hapus</button>
                        </form>
                        <a href="{{ route('admin.contact.edit', $contact) }}" class="py-2 px-6 mx-6 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-r  text-gray-200 rounded-md">Edit</a>
                    </td>
                </tbody>

                <!-- Modal -->
                <div id="modal-{{ $contact->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white w-full max-w-lg rounded-lg shadow-lg overflow-hidden transform transition-all">
                        <div class="flex justify-between items-center bg-gray-800 p-4">
                            <h2 class="text-lg font-semibold text-white">{{ $contact->title }}</h2>
                            <button class="text-white text-2xl leading-none" onclick="closeModal({{ $contact->id }})">
                                &times;
                            </button>
                        </div>
                        <div class="p-6 space-y-4">
                            <p><strong>Description:</strong> {{ $contact->description }}</p>
                            <p><strong>Contact:</strong> {{ $contact->contact }}</p>
                            <p><strong>Link:</strong> 
                                <a href="{{ $contact->link }}" target="_blank" class="text-blue-600 hover:underline">Visit Link</a>
                            </p>
                        </div>
                        <div class="flex justify-end p-4 bg-gray-100">
                            <button onclick="closeModal({{ $contact->id }})" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Close</button>
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

    <style>
        #myTable_wrapper { width: 50%; }
        .dataTables_wrapper .dataTables_length select { width: 70px; }
        table td:nth-child(1) { width: 10%; }
        table td:nth-child(2) { width: 30%; }
        table td:nth-child(3) { width: 60%; }
    </style>
</x-layouts.admin>
