<?php

use App\Http\Controllers\NieuwsItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');

Route::get('/nieuws', [NieuwsItemController::class, 'index'])->name('nieuws');

Route::get('faqs', [FaqController::class, 'index'])->name('faqs');

Route::post('categorieën', [CategorieController::class, 'store'])->name('categorieën.store');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth','admin')->group(function () {
    Route::get('admin/nieuws', [AdminController::class, 'index'])->name('admin.nieuws');
    Route::post('admin/nieuws', [AdminController::class, 'store'])->name('nieuws.store');
    Route::delete('admin/nieuws/{nieuws}', [AdminController::class, 'destroy'])->name('nieuws.destroy');
    
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs', [FaqController::class, 'store'])->name('faqs.store');


});
