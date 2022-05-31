<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookSliderController;

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
Route::get('/', [HomeController::class, 'landing'])->name('landing');

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LangController@switchLang']);

//USER
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/confirmPassword', function () {
    return view('auth.confirm-password');
})->name('confirmPassword');

Route::post('/confirmCurrentPassword', [HomeController::class, 'confirmCurrentPassword'])->name('confirmCurrentPassword');

Route::get('/payment', [UserController::class, 'payment'])->name('payment');

Route::post('/newPayment', [UserController::class, 'newPayment']);


//Viewer route
Route::get('/read', function () {
    return view('viewer.bookViewer');
})->name('read');


//Book info route
Route::get('/book/{book}', [BookController::class, 'bookInfo'])->name('bookInfo');
Route::get('/bookStartReading', [BookController::class, 'bookStartReading'])->name('bookStartReading');


//Explorer route
Route::get('/explore', [HomeController::class, 'explore'])->name('explore')->middleware('auth');
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/booksList', [BookController::class, 'booksList'])->name('booksList');
Route::post('/searchBook', [BookController::class, 'searchBook'])->name('searchBook');


//Book section route
Route::get('/books', [BookController::class, 'bookSection'])->name('bookSection')->middleware('auth');


//Author route
Route::get('/authors', [AuthorController::class, 'authors'])->name('authors')->middleware('auth');
Route::get('/author/{author}', [AuthorController::class, 'authorInfo'])->name('authorInfo');

//Genre route
Route::get('/genre/{genre}', [GenreController::class, 'genreInfo'])->name('genreInfo');

//Book viewer route
Route::get('/read/{book}', [BookController::class, 'read'])->name('readBook')->middleware('auth');
Route::get('/bookmarkSave', [BookController::class, 'bookmarkSave'])->name('bookmarkSave');


//Bookshelf route
Route::get('/bookshelf', [BookController::class, 'bookshelf'])->name('bookshelf');
Route::get('/bookshelfAdd', [BookController::class, 'bookshelfAdd'])->name('bookshelfAdd');
Route::get('/bookshelfRemove', [BookController::class, 'bookshelfRemove'])->name('bookshelfRemove');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');

    //Slider
    Route::post('/bookSlider', [BookSliderController::class, 'bookSlider'])->name('bookSlider');
    Route::post('/updateBookSlider', [BookSliderController::class, 'updateBookSlider'])->name('bookSlider');
    Route::get('/removeBookSlider/{book}', [BookSliderController::class, 'removeBookSlider'])->name('removeBookSlider');


    //Files - upload
    Route::post('/upload', [UploadController::class, 'store']);
    
    //Author - admin
    Route::get('/admin/author', [AuthorController::class, 'index'])->name('authorAdmin')->middleware('auth');

    Route::get('/admin/author/new', [AuthorController::class, 'authorAdminCreate'])->name('authorAdminCreate')->middleware('auth');
    Route::post('/createAuthor', [AuthorController::class, 'authorCreate']);

    Route::get('/admin/author/{author}', [AuthorController::class, 'authorAdminUpdate'])->name('authorAdminUpdate')->middleware('auth');
    Route::post('/updateAuthor', [AuthorController::class, 'authorUpdate']);

    Route::post('/deleteAuthor', [AuthorController::class, 'authorDelete']);

    //Genre - admin
    Route::get('/admin/genre', [GenreController::class, 'index'])->name('genreAdmin')->middleware('auth');

    Route::get('/admin/genre/new', [GenreController::class, 'genreAdminCreate'])->name('authorAdminCreate')->middleware('auth');
    Route::post('/createGenre', [GenreController::class, 'genreCreate']); 

    Route::get('/admin/genre/{genre}', [GenreController::class, 'genreAdminUpdate'])->name('authorAdminUpdate')->middleware('auth');
    Route::post('/updateGenre', [GenreController::class, 'genreUpdate']);

    Route::post('/deleteGenre', [GenreController::class, 'genreDelete']);

    //Book - admin
    Route::get('/admin/book', [BookController::class, 'index'])->name('bookAdmin')->middleware('auth');

    Route::get('/admin/book/new', [BookController::class, 'bookAdminCreate'])->name('bookAdminCreate')->middleware('auth');
    Route::post('/createBook', [BookController::class, 'bookCreate']); 

    Route::get('/admin/book/{book}', [BookController::class, 'bookAdminUpdate'])->name('authorAdminUpdate')->middleware('auth');

    Route::post('/updateBook', [BookController::class, 'bookUpdate']);

    Route::post('/deleteBook', [BookController::class, 'bookDelete']);

//User
Route::post('/deleteUser', [UserController::class, 'userDelete']);
Route::get('/updateUser', [UserController::class, 'userUpdate']);

require __DIR__.'/auth.php';
