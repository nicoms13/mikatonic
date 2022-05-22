<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Bookmark;

class HomeController extends Controller
{
    public function home() {

        $books = Book::all();

        $popularBooksISBN = Bookmark::select('isbn', DB::raw('COUNT(isbn) as occurrences'))
            ->groupBy('isbn')
            ->orderBy('occurrences', 'DESC')
            ->limit(10)
            ->get();

        $popularBooks = collect();
        foreach($popularBooksISBN as $popularBookISBN) {

            $popularBooks->push(Book::find($popularBookISBN->isbn));
        }

        return view('home.home', ['books' => $books, 'popularBooks' => $popularBooks]);
    }

    public function explore() {

        return view('home.explore');
    }
}
