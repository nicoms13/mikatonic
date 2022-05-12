<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BookController extends Controller
{
    public function index() {

        $books = Book::all();

        return view('admin.book', ['books' => $books]);
    }

    public function bookAdminCreate() {

        return view('admin.bookCreate', ['authors' => Author::all(), 'genres' => Genre::all()]);
    }

    public function bookCreate(Request $req) {

        request()->validate([
            'title' => 'required',
            'cover' => 'required',
            'wallpaper' => 'required',
            'desc' => 'required',
            'pages' => 'required',            
        ]);

        $book = Book::create([
            'title' => request('title'),
            'cover' => request('cover'),
            'wallpaper' => request('wallpaper'),
            'desc' => request('desc'),
            'pages' => request('pages'),
        ]);

        $book->authors()->attach($req->input('authors', []));

        $book->genres()->attach($req->input('genres', []));

        return redirect('/admin/book');
    }
}
