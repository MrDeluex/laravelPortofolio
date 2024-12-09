<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class ACertificateController extends Controller
{
    // Menampilkan semua data skill
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificate.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'date' => 'required|date',
        'by' => 'required|string',
        'pdf' => 'nullable|mimes:pdf', // Ganti validasi untuk file PDF
    ]);

    // Proses upload file PDF jika ada
    if ($request->hasFile('pdf')) {
        $pdfPath = $request->file('pdf')->store('pdf_files', 'public'); // Simpan di folder `pdf_files` di dalam `storage/app/public`
    } else {
        $pdfPath = null; // Jika tidak ada file PDF, set null
    }

    // Simpan data ke database
    Certificate::create([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'by' => $request->by,
        'pdf' => $pdfPath, // Pastikan kolom `pdf` ada di tabel certificates
    ]);

    return redirect()->route('admin.certificate')->with('success', 'Certificate berhasil ditambahkan.');
}


    public function edit($id)
    {
        $certificate = certificate::findOrFail($id);
        return view('admin.certificate.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'by' => 'required|string',
            'pdf' => 'nullable|mimes:pdf', // Ganti validasi untuk file PDF
        ]);

        // Update data proyek
        $certificate->title = $request->input('title');
        $certificate->description = $request->input('description');
        $certificate->date = $request->input('date');
        $certificate->by = $request->input('by');

        // Cek apakah ada file image baru yang di-upload
        if ($request->hasFile('pdf')) {
            // Hapus gambar lama jika ada
            if ($certificate->pdf && Storage::exists('public/' . $certificate->pdf)) {
                Storage::delete('public/' . $certificate->pdf);
            }

            // Simpan gambar baru
            $pdfPath = $request->file('pdf')->store('pdf_files', 'public');
            $certificate->pdf = $pdfPath;
        }

        // Simpan perubahan ke database
        $certificate->save();

        return redirect()->route('admin.certificate')->with('success', 'certificate updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan proyek berdasarkan ID
        $certificate = Certificate::findOrFail($id);

        // Hapus proyek
        $certificate->delete();

        // Redirect atau kembalikan response setelah penghapusan
        return redirect()->route('admin.certificate')->with('success', 'certificate deleted successfully.');
    }
}
