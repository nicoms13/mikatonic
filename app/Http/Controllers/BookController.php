<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use App\Models\TemporaryFile;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

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

    public function bookInfo(Book $book) {

        return view('home.bookInfo', ['book' => $book]);
    }

    public function bookSection() {

        $books = Book::all();

        return view('home.bookSection', ['books' => $books]);
    }

    public function read(Book $book) {

        return view('viewer.bookViewer', ['book' => $book]);
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
