<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first(); // Ambil satu entri 'About', jika ada lebih dari satu entri, sesuaikan query
        return view('home', ['title' => "Home Page"], compact('home')); 
    }
}

