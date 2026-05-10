<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/my-teams', [TeamController::class, 'index'])->middleware(['auth', 'verified'])->name('my-teams');
Route::post('/my-teams', [TeamController::class, 'store'])->middleware(['auth', 'verified'])->name('my-teams.store');

Route::middleware('auth')->group(function () {
    Route::get('/@{username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/@{username}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/@{username}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
