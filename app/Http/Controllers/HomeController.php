<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\SliderBooks;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

        $sliderISBNs = SliderBooks::all();

        $sliderBooks = collect();
        foreach($sliderISBNs as $sliderISBN) {
            $sliderBooks->push(Book::find($sliderISBN->isbn));             
        }

        return view('home.home', ['books' => $books, 'popularBooks' => $popularBooks, 'sliderBooks' => $sliderBooks]);
    }

    public function explore() {

        return view('home.explore');
    }

    public function landing() {

        return view('home.landing');
    }

    public function dashboard() {

        $cardNumber = substr((Auth::user()->cardNumber), -3);

        if(Auth::user()->paymentType == 'month') {
            $date = Auth::user()->created_at->addMonth(Auth::user()->subscribedMonths);
        }

        else {
           $date = Auth::user()->created_at->addYear(Auth::user()->subscribedMonths);
        }
        $dateFormat = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');

        return view('dashboard', ['cardNumber' => $cardNumber, 'date' => $dateFormat]);
    }

    public function confirmCurrentPassword() {

        if(Hash::check(request('password'), Auth::user()->password)) {
            return redirect('/payment');
        }

        return redirect()->back();
        
    }

    public function admin() {

        if(Auth::user()->hasRole('Admin')) {

            $books = Book::all();

            $sliderISBNs = SliderBooks::all();

            $sliderBooks = collect();
            foreach($sliderISBNs as $sliderISBN) {
                $sliderBooks->push(Book::find($sliderISBN->isbn));             
            }

            return view('admin.home', ['books' => $books, 'sliderBooks' => $sliderBooks]); 
        }

        else return redirect('/home');
    }
}
