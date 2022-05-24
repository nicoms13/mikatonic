<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;

use App\Models\Author;
use App\Models\Genre;
use App\Models\TemporaryFile;

class AuthorController extends Controller
{
    
    public function authors() {

        $authors = Author::all();

        $genres = Genre::all();

        return view('home.authors', ['authors' => $authors, 'genres' => $genres]);
    }

    public function index() {

        $authors = Author::all();

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.author', ['authors' => $authors]);
        }

        else return redirect('/home');
    }

    public function authorInfo(Author $author) {

        $books = $author->books()->get();

        return view('home.authorInfo', ['author' => $author, 'books' => $books]);
    }

    public function authorAdminUpdate(Author $author) {

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.authorUpdate', ['author' => $author]); 
        }

        else return redirect('/home');
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

        if(Auth::user()->hasRole('Admin')) {
           return view('admin.authorCreate'); 
        }

        else return redirect('/home');
    }

    public function authorCreate(Request $req) {

        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'desc' => 'required',           
        ]);

        $author = Author::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'desc' => request('desc'),  
        ]);

        //Wallpaper - media
        $temporaryFile = TemporaryFile::where('folder', request('wallpaper'))->first();

        if($temporaryFile) {
            $author->addMedia(storage_path('app/public/files/tmp/' . request('wallpaper') . '/' . $temporaryFile->filename))->toMediaCollection('wallpaper');
            
            rmdir(storage_path('app/public/files/tmp/' . request('wallpaper')));
            $temporaryFile->delete();

        }

        //Logo - media
        $temporaryFileLogo = TemporaryFile::where('folder', request('logo'))->first();

        if($temporaryFileLogo) {
            $author->addMedia(storage_path('app/public/files/tmp/' . request('logo') . '/' . $temporaryFileLogo->filename))->toMediaCollection('logo');
            
            rmdir(storage_path('app/public/files/tmp/' . request('logo')));
            $temporaryFileLogo->delete();

        }

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
