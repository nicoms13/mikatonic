<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Genre;
use App\Models\Book;

class GenreController extends Controller
{
    public function index() {

        $genre = Genre::all();
        $books = Book::all();

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.genre', ['genres' => $genre, 'books' => $books]); 
        }

        else return redirect('/home');
    }

    public function genreInfo(Genre $genre) {

        $books = $genre->books()->get();

        return view('home.genreInfo', ['genre' => $genre, 'books' => $books]);
    }

    public function genreAdminUpdate(Genre $genre) {

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.genreUpdate', ['genre' => $genre]);
        }

        else return redirect('/home');
    }

    public function genreUpdate(Request $req) {

        request()->validate(['idGen' => 'required']);

        $idGen = request('idGen');
        $genre = Genre::find($idGen);

        request()->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:10000',          
        ]);

        $genre->update([
            'name' => request('name'),
            'desc' => request('desc'),
        ]);

        return redirect('/admin/genre');
    }

    public function genreAdminCreate() {

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.genreCreate');
        }

        else return redirect('/home');
    }

    public function genreCreate(Request $req) {

        request()->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:10000',            
        ]);

        Genre::create([
            'name' => request('name'),
            'desc' => request('desc'),
        ]);

        return redirect('/admin/genre');
    }

    public function genreDelete(Request $req) {

        request()->validate(['idGen' => 'required']);

        $idGen = request('idGen');
        $genre = Genre::find($idGen);

        $genre->delete();

        return redirect('/admin/genre');
    }
}
