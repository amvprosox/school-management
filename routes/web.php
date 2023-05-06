<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddstudentController;
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

Route::get('/', [AddstudentController::class, 'showWelcome']);
Route::get('/search-welcome', [AddstudentController::class, 'searchWelcome'])->name('search-welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add-student', [AddstudentController::class, 'index'])->name('add-student');
    Route::post('/add-student', [AddstudentController::class, 'create'])->name('add-student.create');
    Route::get('/dashboard', [AddstudentController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/{id}', [AddstudentController::class, 'showEach'])->name('layouts.student.viewstudent');
    Route::delete('/dashboard/{id}', [AddstudentController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/edit-student/{id}', [AddstudentController::class, 'showEdit'])->name('layouts.student.editstudent');
    Route::post('/edit-student/{id}', [AddstudentController::class, 'update'])->name('edit-student');
    Route::get('/search', [AddstudentController::class, 'search'])->name('search');
});

require __DIR__.'/auth.php';
