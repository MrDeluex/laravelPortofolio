<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class AContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    // Menyimpan contact baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'link' => 'required',
        ]);

        Contact::create([
            'title' => $request->title,
            'description' => $request->description,
            'contact' => $request->contact,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.contact')->with('success', 'contact berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit contact
    public function edit($id)
    {
        $contact = contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    // Memperbarui contact
    public function update(Request $request, $id)
    {
        $contact = contact::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'link' => 'required',
        ]);

        $contact->title = $request->input('title');
        $contact->description = $request->input('description');
        $contact->contact = $request->input('contact');
        $contact->link = $request->input('link');

        $contact->save();

        return redirect()->route('admin.contact')->with('success', 'contact updated successfully.');
    }

    // Menghapus contact
    public function destroy($id)
    {
        contact::destroy($id);
        return redirect()->route('admin.contact')->with('success', 'contact Deleted successfully.');
    }
}
