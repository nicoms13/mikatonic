<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {

        $authors = Author::all();

        return view('admin.author', ['authors' => $authors]);
    }

    public function authorAdminUpdate(Author $author) {

        return view('admin.authorUpdate', ['author' => $author]);
    }

    public function authorUpdate(Request $req) {

        request()->validate(['idAut' => 'required']);

        $idAut = request('idAut');
        $author = Author::find($idAut);

        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'desc' => 'required',
            'logo' => 'required',
            'wallpaper' => 'required',            
        ]);

        $author->update([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'desc' => request('desc'),
            'logo' => request('logo'),
            'wallpaper' => request('wallpaper'),
        ]);

        return redirect('/admin/author');
    }

    public function authorAdminCreate() {

        return view('admin.authorCreate');
    }

    public function authorCreate(Request $req) {

        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'desc' => 'required',
            'logo' => 'required',
            'wallpaper' => 'required',            
        ]);

        Author::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'desc' => request('desc'),
            'logo' => request('logo'),
            'wallpaper' => request('wallpaper'),
        ]);

        return redirect('/admin/author');
    }

    public function authorDelete(Request $req) {

        request()->validate(['idAut' => 'required']);

        $idAut = request('idAut');
        $author = Author::find($idAut);

        $author->delete();

        return redirect('/admin/author');
    }
}
