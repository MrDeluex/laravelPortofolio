<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// -----------------------------

use App\Http\Controllers\Admin\ASkillsController;
use App\Http\Controllers\Admin\AProjectsController;
use App\Http\Controllers\Admin\ACertificateController;
use App\Http\Controllers\Admin\AAboutController;
use App\Http\Controllers\Admin\AHomeController;
use App\Http\Controllers\Admin\AContactController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/skill', [SkillController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/certificate', [CertificateController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');
    
    Route::get('/home', [AHomeController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.home');
    Route::put('/home/{id}', [AHomeController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.home.update');

    Route::get('/skills', [ASkillsController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.skills');
    Route::get('/skills/create', [ASkillsController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.skills.create');
    Route::post('/skills', [ASkillsController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.skills.store');
    Route::delete('/skills/{id}', [ASkillsController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.skills.destroy');
    Route::get('/skills/{id}/edit', [ASkillsController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.skills.edit');
    Route::put('/skills/{id}', [ASkillsController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.skills.update');

    Route::get('/project', [AProjectsController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.project');
    Route::get('/project/create', [AProjectsController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.projects.create');
    Route::post('/project', [AProjectsController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.projects.store');
    Route::delete('/project/{id}', [AProjectsController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.projects.destroy');
    Route::get('/project/{id}/edit', [AProjectsController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.projects.edit');
    Route::put('/project/{id}', [AProjectsController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.projects.update');

    Route::get('/certificate', [ACertificateController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.certificate');
    Route::get('/certificate/create', [ACertificateController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.certificate.create');
    Route::post('/certificate', [ACertificateController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.certificate.store');
    Route::delete('/certificate/{id}', [ACertificateController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.certificate.destroy');
    Route::get('/certificate/{id}/edit', [ACertificateController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.certificate.edit');
    Route::put('/certificate/{id}', [ACertificateController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.certificate.update');
    
    Route::get('/about', [AAboutController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.about');
    Route::put('/about/{id}', [AAboutController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.about.update');

    Route::get('/contact', [AContactController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.contact');
    Route::get('/contact/create', [AContactController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.contact.create');
    Route::post('/contact', [AContactController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.contact.store');
    Route::delete('/contact/{id}', [AContactController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.contact.destroy');
    Route::get('/contact/{id}/edit', [AContactController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.contact.edit');
    Route::put('/contact/{id}', [AContactController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.contact.update');

});



require __DIR__ . '/auth.php';
