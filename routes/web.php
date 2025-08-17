    <?php

    use App\Http\Controllers\KledingItemController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\CategorieController;
    use App\Http\Controllers\FaqController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\Auth\RegisteredUserController;
    use Illuminate\Support\Facades\Route;

    //home pagina
    Route::get('/', function () {
        return redirect()->route('kleding');
    });

    // niet ingelogde gebruikers
    Route::get('profielen', [ProfileController::class, 'index'])->name('profielen');

    Route::get('kleding', [KledingItemController::class, 'index'])->name('kleding');
    Route::get('/kleding/{id}', [KledingItemController::class, 'show'])->name('kleding.show');

    Route::get('faqs', [FaqController::class, 'index'])->name('faqs');

    Route::get('contact', [ContactController::class, 'showForm'])->name('contact');
    Route::post('contact', [ContactController::class, 'sendMail'])->name('contact.send');




    // ingelogde gebruikers
    Route::middleware('auth')->group(function () {
        // profiel aanpassen
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('/kleding/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

    });


    // admin gedeelte
    Route::middleware('auth','admin')->group(function () {

        // gebruikers aanpassen
        Route::prefix('profielen/bewerking')->name('profielen.')->group(function () {
            Route::get('/', [ProfileController::class, 'admin'])->name('bewerking');
            Route::get('{profiel}/edit', [ProfileController::class, 'editAsAdmin'])->name('editAsAdmin');
            Route::put('{profiel}', [ProfileController::class, 'updateAsAdmin'])->name('updateAsAdmin');
            Route::put('{userId}/change-usertype', [ProfileController::class, 'changeUserType'])->name('changeUserType');
            Route::delete('{profiel}', [ProfileController::class, 'destroy'])->name('destroy');
            Route::get('create', [ProfileController::class, 'create'])->name('create');
            Route::post('/', [RegisteredUserController::class, 'store'])->name('store');
            Route::delete('delete/{userId}', [ProfileController::class, 'deleteUser'])->name('delete');
        });
        
        // kleding aanpassen
        Route::prefix('admin/kleding/bewerking')->name('kleding.')->group(function () {
            Route::get('/', [KledingItemController::class, 'admin'])->name('bewerking');
            Route::post('/', [KledingItemController::class, 'store'])->name('store');
            Route::get('{kledingItem}/edit', [KledingItemController::class, 'edit'])->name('edit');
            Route::put('{kledingItem}', [KledingItemController::class, 'update'])->name('update');
            Route::delete('{kledingItem}', [KledingItemController::class, 'destroy'])->name('destroy');
        });
        
        // faq aanpassen
        Route::prefix('faqs/bewerking')->name('faqs.')->group(function () {
            Route::get('/', [FaqController::class, 'create'])->name('create');
            Route::post('/', [FaqController::class, 'store'])->name('store');
            Route::get('{id}/edit', [FaqController::class, 'edit'])->name('edit');
            Route::put('{id}', [FaqController::class, 'update'])->name('update');
            Route::delete('{id}', [FaqController::class, 'destroy'])->name('destroy');
        });
        // categorieën aanpassen
        Route::resource('categorieën', CategorieController::class)->names('categorieën');


        // contact formulieren bekijken als admin
        Route::get('contact/bekijken', [ContactController::class, 'index'])->name('contact.bekijken');

    });

    require __DIR__.'/auth.php';
