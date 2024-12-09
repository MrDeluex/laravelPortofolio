<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;


class AHomeController extends Controller
{
    public function index() {
        $home = Home::first(); // Ambil satu entri 'About', jika ada lebih dari satu entri, sesuaikan query
        return view('admin.home', compact('home')); // Kirim ke view
    }

    public function update(Request $request, $id)
    {
        $home = Home::findOrFail($id); // Ambil data 'home' berdasarkan ID

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            
        ]);

        $home->update($validated);

        return redirect()->route('admin.home');
    }
}
