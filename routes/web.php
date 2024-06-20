<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournementController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MatchController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('teams', TeamController::class);
    Route::resource('members', MemberController::class);
    Route::resource('matches', MatchController::class)->except(['create']);
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware(['admin'])->group(function () {
        Route::resource('tournements', TournementController::class);
        Route::resource('results', ResultController::class);
        Route::resource('goals', GoalController::class);

        Route::post('matches/create', [MatchController::class, 'createMatch'])->name('matches.create');
        Route::post('matches/{match}/generate-outcome', [MatchController::class, 'generateOutcome'])->name('matches.generateOutcome');
    });
});

require __DIR__.'/auth.php';
