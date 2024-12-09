<x-layouts.admin>

    <form id="updateForm" action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-full flex justify-center items-center">
            <div class="bg-gray-900 text-white rounded-xl px-12 py-6 w-1/2">
                <table class="w-full">
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><label for="title">:</label></td>
                        <td class="py-3"><input type="text" name="title" id="title" value="{{ old('title', $contact->title) }}" required
                                   class="w-full bg-white text-black"></td>
                    </tr>
                    <tr>
                        <td> <label for="description">Deskripsi</label> </td>
                        <td> <label for="description">:</label> </td>
                        <td class="py-3"> <input type="text" name="description" id="description" min="0" max="100" value="{{ old('title', $contact->description) }}" required
                                    class="w-full bg-white text-black"></td>
                    </tr>
                    <tr>
                        <td> <label for="contact">Contact</label> </td>
                        <td> <label for="contact">:</label> </td>
                        <td class="py-3"> <input type="text" name="contact" id="contact" min="0" max="100" value="{{ old('title', $contact->contact) }}" required
                                    class="w-full bg-white text-black"></td>
                    </tr>
                    <tr>
                        <td> <label for="link">Link</label> </td>
                        <td> <label for="link">:</label> </td>
                        <td class="py-3"> <input type="text" name="link" id="link" min="0" max="100" value="{{ old('title', $contact->link) }}" required
                                    class="w-full bg-white text-black"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right py-3"> <button id="updateBtn" onclick="confirmUpdate()" type="button" class="bg-white text-black py-2 px-6 rounded-md">Update Contact</button> </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>

    <style>
        table td:nth-child(1) {
            width: 25%;
        }

        table td:nth-child(2) {
            width: 5%;
        }

        table td:nth-child(3) {
            width: 70%;
        }
    </style>
</x-layouts.admin>
