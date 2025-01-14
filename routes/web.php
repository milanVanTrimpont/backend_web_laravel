<?php

use App\Http\Controllers\NieuwsItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');

Route::get('/nieuws', [NieuwsItemController::class, 'index'])->name('nieuws');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth','admin')->group(function () {
    Route::get('admin/nieuws', [AdminController::class, 'index'])->name('admin.nieuws');
    Route::post('admin/nieuws', [AdminController::class, 'store'])->name('nieuws.store');
    Route::delete('admin/nieuws/{nieuws}', [AdminController::class, 'destroy'])->name('nieuws.destroy');

});
