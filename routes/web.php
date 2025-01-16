<?php

use App\Http\Controllers\NieuwsItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () 
{
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('mail', [ContactController::class, 'sendMail']);

Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');

Route::get('nieuws', [NieuwsItemController::class, 'index'])->name('nieuws');

Route::get('faqs', [FaqController::class, 'index'])->name('faqs');


Route::get('contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('contact', [ContactController::class, 'sendMail'])->name('contact.send');


Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth','admin')->group(function () {
    
    Route::get('nieuws/admin', [NieuwsItemController::class, 'admin'])->name('admin.nieuws');
    Route::post('nieuws/admin', [NieuwsItemController::class, 'store'])->name('nieuws.store');
    Route::get('nieuws/admin/{NieuwsItem}/edit', [NieuwsItemController::class, 'edit'])->name('nieuws.edit');
    Route::put('nieuws/admin/{nieuwsItem}', [NieuwsItemController::class, 'update'])->name('nieuws.update');
    Route::delete('nieuws/admin/{NieuwsItem}', [NieuwsItemController::class, 'destroy'])->name('nieuws.destroy');


    Route::get('faqs/bewerking', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs/bewerking', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('faqs/bewerking/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('faqs/bewerking/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');


    Route::post('categorieën', [CategorieController::class, 'store'])->name('categorieën.store');
    Route::delete('categorieën/{id}', [CategorieController::class, 'destroy'])->name('categorieën.destroy');

});
