<x-layouts.admin>
    <form id="updateForm" action="{{ route('admin.certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full flex flex-col justify-center items-center">
            <div class="bg-gray-900 text-gray-300 w-2/3 p-12 rounded-lg flex flex-col-reverse justify-center items-center">
                <table class="w-full">
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="title" placeholder="Title" value="{{ old('title', $certificate->title) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <textarea class="w-full text-gray-950" name="description" placeholder="Description" required>{{ old('description', $certificate->description) }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="date" name="date" value="{{ old('date', $certificate->date) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="by">Published By</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="text" name="by" placeholder="Published By" value="{{ old('by', $certificate->by) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="pdf">PDF</label></td>
                        <td><p>:</p></td>
                        <td class="p-2">
                            <input class="w-full text-gray-950" type="file" name="pdf" accept="application/pdf" id="pdfInput">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="w-2/3 flex justify-end">
                <button id="updateBtn" onclick="confirmUpdate()" class="text-white bg-gray-900 my-6 py-2 px-6 rounded-md" type="button">Update Certificate</button>
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
