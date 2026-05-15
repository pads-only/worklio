<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/@{username}', [TeamController::class, 'index'])->name('team');
    Route::post('/@{username}', [TeamController::class, 'store'])->name('team.store');

    Route::get('/@{username}/invitations', [InvitationController::class, 'index'])->name('team.invite.index');


    Route::get('/@{username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/@{username}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/@{username}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/@{username}/{team:slug}', [TeamController::class, 'show'])->name('team.show');


    Route::get('/@{username}/{team:slug}/invite', [InvitationController::class, 'create'])->name('team.invite.create');

    Route::post('/@{username}/{team:slug}/invite', [InvitationController::class, 'store'])->name('team.invite.store');


    Route::patch('/@{username}/{team:slug}', [TeamController::class, 'update'])->name('team.update');

    Route::delete('/@{username}/{team:slug}', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::post('/@{username}/{team:slug}/{invitation:token}', [InvitationController::class, 'accept'])->name('team.invite.accept');
});

require __DIR__ . '/auth.php';
