<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('app')->group(function () {
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //invitations
    Route::get('/invitations', [InvitationController::class, 'index'])->name('team.invite.index');

    //teams
    Route::get('/teams', [TeamController::class, 'index'])->name('team');
    Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
    Route::get('/teams/{team:slug}', [TeamController::class, 'show'])->name('team.show');
    Route::patch('/teams/{team:slug}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/teams/{team:slug}', [TeamController::class, 'destroy'])->name('team.destroy');


    // invitation routes inside team routes
    Route::get('/teams/{team:slug}/invite', [InvitationController::class, 'create'])->name('team.invite.create');
    Route::post('/teams/{team:slug}/invite', [InvitationController::class, 'store'])->name('team.invite.store');
    Route::post('/teams/{team:slug}/{invitation:token}/accept', [InvitationController::class, 'accept'])->name('team.invite.accept');

    //project routes inside team routes
    Route::get('/teams/{team:slug}/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('/teams/{team:slug}/projects/{project:slug}', [ProjectController::class, 'show'])->name('project.show');
    Route::post('/teams/{team:slug}/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::patch('/teams/{team:slug}/projects/{project:slug}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/teams/{team:slug}/projects/{project:slug}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

// Route::middleware('auth')->group(function () {

//     Route::prefix('/{username}')->group(function () {
//         //profile
//         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//         Route::get('/invitations', [InvitationController::class, 'index'])->name('team.invite.index');
//         //teams
//         Route::get('/', [TeamController::class, 'index'])->name('team');
//         Route::post('/', [TeamController::class, 'store'])->name('team.store');
//         Route::get('/{team:slug}', [TeamController::class, 'show'])->name('team.show');
//         Route::patch('/{team:slug}', [TeamController::class, 'update'])->name('team.update');
//         Route::delete('/{team:slug}', [TeamController::class, 'destroy'])->name('team.destroy');

//         //invitations
//         Route::get('/{team:slug}/invite', [InvitationController::class, 'create'])->name('team.invite.create');
//         Route::post('/{team:slug}/invite', [InvitationController::class, 'store'])->name('team.invite.store');
//         Route::post('/{team:slug}/{invitation:token}', [InvitationController::class, 'accept'])->name('team.invite.accept');

//         //projects
//         Route::get('/{team:slug}/projects/create', [ProjectController::class, 'create'])->name('project.create');
//     });
// });

// Route::middleware('auth')->group(function () {

//     Route::get('/@{username}', [TeamController::class, 'index'])->name('team');
//     Route::post('/@{username}', [TeamController::class, 'store'])->name('team.store');

//     Route::get('/@{username}/invitations', [InvitationController::class, 'index'])->name('team.invite.index');

//     Route::get('/@{username}/{team:slug}/projects/new', [ProjectController::class, 'create'])->name('project.create');


//     Route::get('/@{username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/@{username}/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/@{username}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/@{username}/{team:slug}', [TeamController::class, 'show'])->name('team.show');


//     Route::get('/@{username}/{team:slug}/invite', [InvitationController::class, 'create'])->name('team.invite.create');

//     Route::post('/@{username}/{team:slug}/invite', [InvitationController::class, 'store'])->name('team.invite.store');


//     Route::patch('/@{username}/{team:slug}', [TeamController::class, 'update'])->name('team.update');

//     Route::delete('/@{username}/{team:slug}', [TeamController::class, 'destroy'])->name('team.destroy');

//     Route::post('/@{username}/{team:slug}/{invitation:token}', [InvitationController::class, 'accept'])->name('team.invite.accept');
// });
