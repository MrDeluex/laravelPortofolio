<x-layouts.admin>
    <form action="{{ route('admin.home.update', $home->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full flex flex-col justify-center items-center">
            <div class="bg-gray-900 text-gray-300 w-2/3 p-12 rounded-lg flex flex-col-reverse justify-center items-center">
                <table class="w-full">
                    <tr>
                        <td><label for="name">Nama</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="name" placeholder="name" value="{{ old('name', $home->name) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="title1">Title 1</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="title1" placeholder="title1" value="{{ old('title1', $home->title1) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="title2">Title 2</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="title2" placeholder="title2" value="{{ old('title2', $home->title2) }}" required>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="w-2/3 flex justify-end">
                <button class="text-white bg-gray-900 my-6 py-2 px-6 rounded-md" type="submit">Update home</button>
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

</x-layouts.admin>
