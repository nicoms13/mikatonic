<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SliderBooks;
use App\Models\Book;

class BookSliderController extends Controller
{
    public function bookSlider(Request $req) {

        request()->validate(['isbn' => 'required']);

        SliderBooks::create([
            'isbn' => request('isbn'),
        ]);

        return redirect()->back();
    }

        public function removeBookSlider(Book $book) {

        SliderBooks::where('isbn','=',$book->isbn)->delete(); 

        return redirect()->back();
    }
}
