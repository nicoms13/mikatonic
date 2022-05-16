<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class HomeController extends Controller
{
    public function home() {

        $books = Book::all();

        return view('home.home', ['books' => $books]);
    }

    public function explore() {

        return view('home.explore');
    }
}
