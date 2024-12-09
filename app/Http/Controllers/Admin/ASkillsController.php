<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class ASkillsController extends Controller
{
    // Menampilkan semua data skill
    public function index(Request $request)
    {
        $skills = Skill::all();; // Ambil satu entri 'About', jika ada lebih dari satu entri, sesuaikan query
        return view('admin.skills', compact('skills')); 
    }

    // Menampilkan form untuk membuat skill baru
    public function create()
    {
        return view('admin.skills.create');
    }

    // Menyimpan skill baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'persen' => 'required|integer|min:0|max:100',
        ]);

        Skill::create([
            'title' => $request->title,
            'persen' => $request->persen,  // Sesuaikan dengan kolom di database
        ]);

        return redirect()->route('admin.skills')->with('success', 'Skill berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit skill
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    // Memperbarui skill
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'persen' => 'required|integer|min:0|max:100',
        ]);

        $skill->title = $request->input('title');
        $skill->persen = $request->input('persen');

        $skill->save();

        return redirect()->route('admin.skills')->with('success', 'Skill updated successfully.');
    }

    // Menghapus skill
    public function destroy($id)
    {
        Skill::destroy($id);
        return redirect()->route('admin.skills')->with('success', 'Skill Deleted successfully.');
    }
}
