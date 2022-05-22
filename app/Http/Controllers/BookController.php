<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;

use App\Models\TemporaryFile;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Bookmark;

class BookController extends Controller
{

    public function index() {

        $books = Book::all();

        return view('admin.book', ['books' => $books]);
    }

    public function search(Request $req) {

        $output = '';

        $books = Book::where('title', 'Like', '%'.$req->search.'%')->get();

        if (count($books) > 0) {
            foreach($books as $book) {
                $output.='
                <div class="book-box" onclick="location.href=\'/book/'.$book->isbn.'\'">
                        <img src="'.$book->getFirstMediaUrl('cover').'" class="books-box-img">
                        <div class="book-box-txt">
                            <h2 class="book-title fs-400 ff-main">'.$book->title.'</h2>
                            <div>
                                <span class="book-genre fs-100 ff-main">Weird Tales</span>
                            </div>
                        </div>
                </div>';
            }
        }

        else $output = "No results found";

        return response($output);
    }

    public function bookshelf(Request $req) {

        $user = Auth::user();

        $books = $user->books()->get();

        $booksReading = $user->booksReading()->get();

        return view('home.bookshelf', ['books' => $books], ['booksReading' => $booksReading]); 
    }

    public function bookshelfAdd(Request $req) {

            $user = Auth::user();

            $book = Book::find($req->isbn);

            $user->books()->attach($req->isbn);  
    }

    public function bookshelfRemove(Request $req) {

            $user = Auth::user();

            $book = Book::find($req->isbn);

            $user->books()->detach($req->isbn);  
    }

    public function bookStartReading(Request $req) {

            $user = Auth::user();

            $book = Book::find($req->isbn);
            $pageTotal = $book->pages;

            $user->booksReading()->attach($req->isbn, ['pageTotal' => $pageTotal, 'pageCurrent' => 1]);
    }

    public function bookInfo(Book $book) {

        return view('home.bookInfo', ['book' => $book]);
    }

    public function bookSection() {

        $books = Book::all();

        return view('home.bookSection', ['books' => $books]);
    }

    public function read(Book $book) {

        $user = Auth::user();

        $bookmark = Bookmark::select('*')
            ->where('isbn', '=', $book->isbn)
            ->where('idUser', '=', $user->idUser)
            ->get()->first();

        return view('viewer.bookViewer', ['book' => $book, 'bookmark' => $bookmark]);
    }

    public function bookmarkSave(Request $req) {

        $user = Auth::user();
        $isbn = $req->isbn;

        $book = Book::find($isbn);

        if($book->pages <= $req->pageCurrent) {
            $bookmark = Bookmark::select('*')
            ->where('isbn', '=', $isbn)
            ->where('idUser', '=', $user->idUser)
            ->delete();
        }

        else {
            $bookmark = Bookmark::select('*')
            ->where('isbn', '=', $isbn)
            ->where('idUser', '=', $user->idUser)
            ->update(['pageCurrent' => $req->pageCurrent]);
        }

    }

    public function bookAdminCreate() {

        return view('admin.bookCreate', ['authors' => Author::all(), 'genres' => Genre::all()]);
    }

    public function bookCreate(Request $req) {

        request()->validate([
            'title' => 'required',
            'desc' => 'required',
            'pages' => 'required',            
        ]);

        $book = Book::create([
            'title' => request('title'),
            'desc' => request('desc'),
            'pages' => request('pages'),
        ]);

        //Wallpaper - media
        $temporaryFile = TemporaryFile::where('folder', request('wallpaper'))->first();

        if($temporaryFile) {
            $book->addMedia(storage_path('app/public/files/tmp/' . request('wallpaper') . '/' . $temporaryFile->filename))->toMediaCollection('wallpaper');
            
            rmdir(storage_path('app/public/files/tmp/' . request('wallpaper')));
            $temporaryFile->delete();

        }

        //Cover - media
        $temporaryFile = TemporaryFile::where('folder', request('cover'))->first();

        if($temporaryFile) {
            $book->addMedia(storage_path('app/public/files/tmp/' . request('cover') . '/' . $temporaryFile->filename))->toMediaCollection('cover');
            
            rmdir(storage_path('app/public/files/tmp/' . request('cover')));
            $temporaryFile->delete();
        }

        //PDF - media
        $temporaryFile = TemporaryFile::where('folder', request('pdf'))->first();

        if($temporaryFile) {
            $book->addMedia(storage_path('app/public/files/tmp/' . request('pdf') . '/' . $temporaryFile->filename))->toMediaCollection('pdf');
            
            rmdir(storage_path('app/public/files/tmp/' . request('pdf')));
            $temporaryFile->delete();

        }

        $book->authors()->attach($req->input('authors', []));

        $book->genres()->attach($req->input('genres', []));

        return redirect('/admin/book');
    }
}
