<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}', [EventController::class,'show'])->name('events.show');
    Route::post('/events/{id}/participate', [EventController::class,'participate'])->name('events.participate');
    Route::delete('/events/{id}/participate', [EventController::class,'cancelParticipation'])->name('events.cancelParticipation');
    Route::get('/events/{id}/edit', [EventController::class,'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class,'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class,'destroy'])->name('events.destroy');
    Route::get('/mes-participations', [EventController::class,'userParticipations'])->name('user.participations');

});

require __DIR__.'/auth.php';
