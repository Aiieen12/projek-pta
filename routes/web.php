<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegistrationController; // --- 1. TAMBAH CONTROLLER BARU ANDA DI SINI ---

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    // Halaman untuk pilih peranan (student/teacher)
    Route::get('register', [RegistrationController::class, 'showRoleSelection'])->name('register');

    // Halaman borang pendaftaran pelajar
    Route::get('register/student', [RegistrationController::class, 'showStudentForm'])->name('register.student');
    // Proses data dari borang pelajar
    Route::post('register/student', [RegistrationController::class, 'storeStudent']);

    // Halaman borang pendaftaran guru
    Route::get('register/teacher', [RegistrationController::class, 'showTeacherForm'])->name('register.teacher');
    // Proses data dari borang guru
    Route::post('register/teacher', [RegistrationController::class, 'storeTeacher']);
});


// Laluan Profil (dikekalkan dari Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Memuatkan laluan log masuk, lupa kata laluan, dll.
require __DIR__.'/auth.php';
