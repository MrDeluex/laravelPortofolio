<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AProjectsController extends Controller
{
    // Menampilkan semua data skill
    public function index(Request $request)
{
        $projects = Project::all();; // Ambil satu entri 'About', jika ada lebih dari satu entri, sesuaikan query
        return view('admin.project', compact('projects')); 
}

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        } else {
            $imagePath = null;
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'link' => $request->link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.project')->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file gambar
        ]);

        // Update data proyek
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->link = $request->input('link');
        $project->date = $request->input('date');

        // Cek apakah ada file image baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($project->image && Storage::exists('public/' . $project->image)) {
                Storage::delete('public/' . $project->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        // Simpan perubahan ke database
        $project->save();

        return redirect()->route('admin.project')->with('success', 'Project updated successfully.');
    }


    public function destroy($id)
    {
        // Temukan proyek berdasarkan ID
        $project = Project::findOrFail($id);

        // Hapus proyek
        $project->delete();

        // Redirect atau kembalikan response setelah penghapusan
        return redirect()->route('admin.project')->with('success', 'Project deleted successfully.');
    }
}
