<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnviromentController;

Route::get('/', function () {
    return view('calculator');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/calculator', [EnviromentController::class, 'calculateForm'])->name('calculator');
Route::post('/handle-submit', [EnviromentController::class, 'handleSubmit'])->name('handleSubmit');
Route::get('/results', [EnviromentController::class, 'showResults'])->name('results');

require __DIR__.'/auth.php';
