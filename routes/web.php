<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/@{username}/my-teams', [TeamController::class, 'index'])->name('my-teams');
    Route::post('/@{username}/my-teams', [TeamController::class, 'store'])->name('my-teams.store');



    Route::get('/@{username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/@{username}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/@{username}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
