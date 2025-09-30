<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegistrationController; // --- 1. TAMBAH CONTROLLER BARU ANDA DI SINI ---//

Route::get('/', function () {
    // Arahkan pengguna yang belum log masuk ke halaman log masuk
    return redirect()->route('login');
});

// --- 2. LALUAN UNTUK DASHBOARD BERASASKAN PERANAN ---
// Dashboard Pelajar
Route::get('/dashboard-pelajar', function () {
    return view('dashboard-pelajar'); // Pastikan anda ada fail view ini
})->middleware(['auth', 'verified'])->name('dashboard.pelajar');

// Dashboard Guru
Route::get('/dashboard-guru', function () {
    return view('dashboard-guru'); // Pastikan anda ada fail view ini
})->middleware(['auth', 'verified'])->name('dashboard.guru');


// --- 3. LALUAN UNTUK PENDAFTARAN BERPERINGKAT (GANTIKAN YANG LAMA) ---
Route::middleware('guest')->group(function () {
    Route::get('/register-role', [RegistrationController::class, 'showRoleSelection'])
        ->name('register.role');

    Route::get('/register/student', [RegistrationController::class, 'showStudentForm'])
        ->name('register.student');
    Route::post('/register/student', [RegistrationController::class, 'storeStudent']);

    Route::get('/register/teacher', [RegistrationController::class, 'showTeacherForm'])
        ->name('register.teacher');
    Route::post('/register/teacher', [RegistrationController::class, 'storeTeacher']);
});


// Laluan Profil (dikekalkan dari Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Memuatkan laluan log masuk, lupa kata laluan, dll.
require __DIR__.'/auth.php';
