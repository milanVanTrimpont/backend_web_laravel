<?php

use App\Http\Controllers\KledingItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

//home pagina
Route::get('/', function () {
    return redirect()->route('kleding');
});

// gedeelte voor niet ingelogde gebruikers
Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');
Route::get('kleding', [KledingItemController::class, 'index'])->name('kleding');
Route::get('faqs', [FaqController::class, 'index'])->name('faqs');
Route::get('contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('contact', [ContactController::class, 'sendMail'])->name('contact.send');





Route::middleware('auth')->group(function () {
    // gedeelte voor ingelogde gebruikers om hun profiel aan te passen
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth','admin')->group(function () {
    // gedeelte voor de admins om de gebruikers aan te passen
    Route::get('profielen/bewerking', [ProfileController::class, 'admin'])->name('profielen.bewerking');
    Route::get('profielen/bewerking/{profiel}/edit', [ProfileController::class, 'editAsAdmin'])->name('profielen.editAsAdmin');
    Route::put('profielen/bewerking/{profiel}', [ProfileController::class, 'updateAsAdmin'])->name('profielen.updateAsAdmin');
    Route::put('profielen/bewerking/{userId}/change-usertype', [ProfileController::class, 'changeUserType'])->name('profielen.changeUserType');
    Route::delete('profielen/bewerking/{profiel}', [ProfileController::class, 'destroy'])->name('profielen.destroy');
    Route::get('profielen/bewerking/create', [ProfileController::class, 'create'])->name('profielen.create');
    Route::post('profielen/bewerking', [RegisteredUserController::class, 'store'])->name('profielen.store');

    // gedeelte voor de admins om de kledingpagina aan te passen
    Route::get('kleding/bewerking', [KledingItemController::class, 'admin'])->name('kleding.bewerking');
    Route::post('kleding/bewerking', [KledingItemController::class, 'store'])->name('kleding.store');
    Route::get('kleding/bewerking/{kledingItem}/edit', [KledingItemController::class, 'edit'])->name('kleding.edit');
    Route::put('kleding/bewerking/{kledingItem}', [KledingItemController::class, 'update'])->name('kleding.update');
    Route::delete('kleding/bewerking/{kledingItem}', [KledingItemController::class, 'destroy'])->name('kleding.destroy');

    //gedeelte voor de admins om de faq en categorieën aan te passen
    Route::get('faqs/bewerking', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs/bewerking', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('faqs/bewerking/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('faqs/bewerking/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');


    Route::post('categorieën', [CategorieController::class, 'store'])->name('categorieën.store');
    Route::delete('categorieën/{id}', [CategorieController::class, 'destroy'])->name('categorieën.destroy');

});
