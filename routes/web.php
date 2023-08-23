<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
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

Route::get('/', HomeController::class)->name('home');


// The middleware verify check if the email wae confirmed you need implement this is th router and  user model
Route::get('/dashboard', [VacanteController::class,'index'])->middleware(['auth', 'verified', 'rol.recruiter'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacancy}/edit', [VacanteController::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacancy}', [VacanteController::class,'show'])->name('vacantes.show');
Route::get('/applicants/{vacancy}', [ApplicantController::class,'index'])->name('applicants.index');

// *                               NOTIFICACIONES
Route::get('/notifications', NotificationsController::class)->middleware(['auth', 'verified', 'rol.recruiter'])->name('notifications.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
