<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;


class AAboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // Ambil satu entri 'About', jika ada lebih dari satu entri, sesuaikan query
        return view('admin.about', compact('about')); // Kirim ke view
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id); // Ambil data 'About' berdasarkan ID

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            // Simpan gambar baru dan hapus gambar lama jika ada
            $imagePath = $request->file('image')->store('about_images', 'public');
            if ($about->image) {
                Storage::delete('public/' . $about->image);
            }
            $validated['image'] = $imagePath;
        }

        $about->update($validated);

        return redirect()->route('admin.about')->with('success', 'About updated successfully!');
    }
}
