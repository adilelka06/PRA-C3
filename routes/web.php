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
    return view('Home');
});

Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::get('/matches{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');

Route::get('/tournements', [TournementController::class, 'index'])->name('tournements.index');
Route::get('/tournements/create', [TournementController::class, 'create'])->name('tournements.create');
Route::get('/tournements/{tournement}/edit', [TournementController::class, 'edit'])->name('tournements.edit');
Route::post('/tournements', [TournementController::class, 'store'])->name('tournements.store');
Route::put('/tournements/{tournement}', [TournementController::class, 'update'])->name('tournements.update');

Route::get('/Teams', [TeamController::class, 'index'])->name('Teams.index');
Route::get('/Teams/create', [TeamController::class, 'create'])->name('Teams.create');
Route::get('/Teams/{notice}/edit', [TeamController::class, 'edit'])->name('Teams.edit');
Route::post('/Teams', [TeamController::class, 'store'])->name('Teams.store');
Route::put('/Teams/{notice}', [TeamController::class, 'update'])->name('Teams.update');

Route::get('/Results', [MatchController::class, 'index'])->name('Results.index');
Route::get('/Results/create', [MatchController::class, 'create'])->name('Results.create');
Route::get('/Results/{notice}/edit', [MatchController::class, 'edit'])->name('Results.edit');
Route::post('/Results', [MatchController::class, 'store'])->name('Results.store');
Route::put('/Results/{notice}', [MatchController::class, 'update'])->name('Results.update');

Route::get('/Members', [MatchController::class, 'index'])->name('Members.index');
Route::get('/Members/create', [MatchController::class, 'create'])->name('Members.create');
Route::get('/Members/{notice}/edit', [MatchController::class, 'edit'])->name('Members.edit');
Route::post('/Members', [MatchController::class, 'store'])->name('Members.store');
Route::put('/Members/{notice}', [MatchController::class, 'update'])->name('Members.update');


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
