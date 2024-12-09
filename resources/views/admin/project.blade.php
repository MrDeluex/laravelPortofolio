<x-layouts.admin>
    <style>
        /* Styling tabel */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            padding: 12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th:nth-child(1),
        table td:nth-child(1) {
            width: 3%;
            /* ID */
        }

        table th:nth-child(2),
        table td:nth-child(2) {
            width: 32%;
            /* Title */
        }

        table th:nth-child(3),
        table td:nth-child(3) {
            width: 35%;
            /* Description */
        }

        table th:nth-child(4),
        table td:nth-child(4) {
            width: 30%;
            /* Action */
        }

        /* Styling modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            max-height: 80%;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .modal-close {
            cursor: pointer;
            font-size: 1.5rem;
            color: #999;
        }
    </style>

    <div class="container">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.projects.create') }}"
                class="py-2 px-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">
                Tambah Projek
            </a>
        </div>

        <table id="myTable" style="margin-top: 1rem;">
            <thead>
                <tr class="w-full bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white">
                    <th class="p-4">Id</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 50) }}</td> <!-- Deskripsi pendek -->
                        <td class="flex flex-row space-x-4">
                            <button onclick="showDetails({{ $project->id }})"
                                class="py-2 px-4 bg-gradient-to-tr from-gray-800 to-gray-700 text-white rounded-md">
                                Detail
                            </button>
                            <form id="deleteForm-{{ $project->id }}"
                                action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="deleteBtn" type="button" onclick="confirmDelete({{ $project->id }})"
                                    class="py-2 px-6 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-b  text-gray-200 rounded-md">Hapus</button>
                            </form>
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="py-2 px-6 mx-6 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-r  text-gray-200 rounded-md">Edit</a>

                        </td>
                    </tr>

                    <!-- Modal -->
                    <div id="modal-{{ $project->id }}"
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white h-2/3 overflow-y-scroll w-full max-w-lg rounded-lg shadow-lg transform transition-all">
                            <div class="flex justify-between items-center bg-gray-800 p-4">
                                <h2 class="text-lg font-semibold text-white break-words">
                                    {{ $project->title }}
                                </h2>
                                <button class="text-white text-2xl leading-none"
                                    onclick="closeModal({{ $project->id }})">
                                    &times;
                                </button>
                            </div>
                            <div class="p-6 space-y-4">
                                <p><strong>Description:</strong> <span
                                        class="break-words">{{ $project->description }}</span></p>
                                <p><strong>Link:</strong>
                                    <a href="{{ $project->link }}" target="_blank"
                                        class="text-blue-600 hover:underline break-words">
                                        {{ $project->link }}
                                    </a>
                                </p>
                                <p><strong>Date:</strong> {{ $project->date }}</p>
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    class="w-full h-auto mt-4 object-cover rounded">
                            </div>
                            <div class="flex justify-end p-4 bg-gray-100">
                                <button onclick="closeModal({{ $project->id }})"
                                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function showDetails(id) {
            document.getElementById(`modal-${id}`).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(`modal-${id}`).style.display = 'none';
        }
    </script>
</x-layouts.admin>
