<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {

        $genre = Genre::all();

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.genre', ['genres' => $genre]); 
        }

        else return redirect('/home');
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
            'name' => 'required',
            'desc' => 'required',          
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
            'name' => 'required',
            'desc' => 'required',            
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
