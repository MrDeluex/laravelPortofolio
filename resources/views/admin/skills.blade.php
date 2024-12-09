<x-layouts.admin>
    <style>
        .dataTables_length select {
            width: 75px;
            /* Sesuaikan ukuran lebar sesuai kebutuhan */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <div class="container flex flex-col justify-center items-center">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.skills.create') }}"
                class="py-2 px-6 bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white rounded-md">Tambah
                Skill</a>
        </div>

        <table id="myTable" class="text-left" style="width: 750px;">
            <thead>
                <tr class="w-full bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 text-white">
                    <td class="p-4">Id</td>
                    <td class="p-4">Title</td>
                    <td class="p-4">Percent</td>
                    <td class="p-4">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach ($skills as $skill)
                    <tr>
                        <td class="p-4">{{ $n++ }}</td>
                        <td class="p-4">{{ $skill->title }}</td>
                        <td class="p-4">{{ $skill->persen }}</td>
                        <td class="p-4 flex ">
                            <form id="deleteForm-{{ $skill->id }}"
                                action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="deleteBtn" onclick="confirmDelete({{ $skill->id }})" type="button"
                                    class="py-2 px-6 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-b  text-gray-200 rounded-md">Hapus</button>
                            </form>
                            <a href="{{ route('admin.skills.edit', $skill) }}"
                                class="py-2 px-6 mx-6 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 hover:bg-gradient-to-r  text-gray-200 rounded-md">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script></script>

    <style>
        table td:nth-child(1) {
            width: 5%;
        }

        table td:nth-child(2) {
            width: 30%;
        }

        table td:nth-child(3) {
            width: 25%;
        }

        table td:nth-child(4) {
            width: 40%;
        }
    </style>
</x-layouts.admin>
