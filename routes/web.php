<?php

use App\Http\Controllers\NieuwsItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');

Route::get('/nieuws', [NieuwsItemController::class, 'index'])->name('nieuws');
Route::post('/nieuws', [NieuwsItemController::class, 'store'])->name('nieuws.store');
Route::delete('/nieuws/{nieuws}', [NieuwsItemController::class, 'destroy'])->name('nieuws.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware(['auth','admin']);

