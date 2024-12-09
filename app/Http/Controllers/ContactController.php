<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {   
        $contacts = Contact::all();
        return view('contact', ['title' => 'Contact'], compact('contacts'));
    }
}
