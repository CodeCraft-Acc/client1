<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Document Routes
    Route::get('/dokumen', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/dokumen', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/dokumen/{document}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/dokumen/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/dokumen/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/dokumen/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::get('/dokumen/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

    // Certification Routes
    Route::get('/sertifikasi', [CertificationController::class, 'index'])->name('certifications.index');
    Route::post('/sertifikasi', [CertificationController::class, 'store'])->name('certifications.store');
    Route::get('/sertifikasi/{certification}', [CertificationController::class, 'show'])->name('certifications.show');
    Route::put('/sertifikasi/{certification}', [CertificationController::class, 'update'])->name('certifications.update');
    Route::delete('/sertifikasi/{certification}', [CertificationController::class, 'destroy'])->name('certifications.destroy');
    Route::get('/sertifikasi/{certification}/download', [CertificationController::class, 'download'])->name('certifications.download');

    // Schedule Routes
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::post('/jadwal', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/jadwal/{schedule}', [ScheduleController::class, 'show'])->name('schedules.show');
    Route::put('/jadwal/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/jadwal/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

require __DIR__.'/auth.php';
