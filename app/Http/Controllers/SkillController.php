<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // Mengambil data skills dari database
        $skills = Skill::all();
        // Mengirim data ke view
        return view('skill', compact('skills'), ['title' => 'Skill']);
    }
}
