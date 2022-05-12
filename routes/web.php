<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes --- Miskatonic
|--------------------------------------------------------------------------
|
| Nicolas Moreno
|
*/

Route::get('/', function () {
    return redirect('home');
});

//Default
Route::get('/home', function () {
    return view('home.home');
})->name('home');


Route::get('/read', function () {
    return view('viewer.bookViewer');
})->name('read');

Route::get('/book', function () {
    return view('home.bookInfo');
})->name('bookInfo');

Route::get('/books', function () {
    return view('home.bookSection');
})->name('bookSection');

Route::get('/authors', function () {
    return view('home.authors');
})->name('authors');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Admin
Route::get('/admin', function () {
    return view('admin.home');
})->name('admin');
    
    //Author - admin
    Route::get('/admin/author', [AuthorController::class, 'index'])->name('authorAdmin');

    Route::get('/admin/author/new', [AuthorController::class, 'authorAdminCreate'])->name('authorAdminCreate');
    Route::post('/createAuthor', [AuthorController::class, 'authorCreate']);

    Route::get('/admin/author/{author}', [AuthorController::class, 'authorAdminUpdate'])->name('authorAdminUpdate');
    Route::post('/updateAuthor', [AuthorController::class, 'authorUpdate']);

    Route::post('/deleteAuthor', [AuthorController::class, 'authorDelete']);

    //Genre - admin
    Route::get('/admin/genre', [GenreController::class, 'index'])->name('genreAdmin');

    Route::get('/admin/genre/new', [GenreController::class, 'genreAdminCreate'])->name('authorAdminCreate');
    Route::post('/createGenre', [GenreController::class, 'genreCreate']); 

    Route::get('/admin/genre/{genre}', [GenreController::class, 'genreAdminUpdate'])->name('authorAdminUpdate');
    Route::post('/updateGenre', [GenreController::class, 'genreUpdate']);

    Route::post('/deleteGenre', [GenreController::class, 'genreDelete']);

require __DIR__.'/auth.php';
