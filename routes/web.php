<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;

use App\Http\Livewire\Books;

/*
|--------------------------------------------------------------------------
| Web Routes --- Miskatonic
|--------------------------------------------------------------------------
|
| Nicolas Moreno
|
*/

//Default route
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');


//Viewer route
Route::get('/read', function () {
    return view('viewer.bookViewer');
})->name('read');


//Book info route
Route::get('/book/{book}', [BookController::class, 'bookInfo'])->name('bookInfo');

//Explorer route
Route::get('/explore', [HomeController::class, 'explore'])->name('explore');
Route::get('/search', [BookController::class, 'search'])->name('search');


//Book section route
Route::get('/books', [BookController::class, 'bookSection'])->name('bookSection');


//Author route
Route::get('/authors', function () {
    return view('home.authors');
})->name('authors');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//Book viewer route
Route::get('/read/{book}', [BookController::class, 'read'])->name('readBook');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return view('admin.home');
})->name('admin');

    //Files - upload
    Route::post('/upload', [UploadController::class, 'store']);
    
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

    //Book - admin
    Route::get('/admin/book', [BookController::class, 'index'])->name('bookAdmin');

    Route::get('/admin/book/new', [BookController::class, 'bookAdminCreate'])->name('bookAdminCreate');
    Route::post('/createBook', [BookController::class, 'bookCreate']); 

    Route::get('/admin/book/{book}', [BookController::class, 'bookAdminUpdate'])->name('authorAdminUpdate');
    Route::post('/updateBook', [BookController::class, 'bookUpdate']);

    Route::post('/deleteBook', [BookController::class, 'bookDelete']);

require __DIR__.'/auth.php';
