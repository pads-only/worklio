<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/@{username}', [TeamController::class, 'index'])->name('team');
    Route::post('/@{username}', [TeamController::class, 'store'])->name('team.store');



    Route::get('/@{username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/@{username}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/@{username}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/@{username}/{team:slug}', [TeamController::class, 'show'])->name('team.show');
    Route::patch('/@{username}/{team:slug}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/@{username}/{team:slug}', [TeamController::class, 'destroy'])->name('team.destroy');
});

require __DIR__ . '/auth.php';
