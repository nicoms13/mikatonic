<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class Books extends Component
{

    public $amount = 10;

    public function loadMore() {

        $this->amount += 10;
    }

    public function render() {

        return view('livewire.books', [
            "books" => Book::paginate($this->amount)
        ]);
    }

    public function bookmarkSave(Request $req) {

        $user = Auth::user();
        $isbn = $req->isbn;

        $book = Book::find($isbn);

        if($book->pages <= $req->pageCurrent) {
            $bookmark = Bookmark::select('*')
            ->where('isbn', '=', $isbn)
            ->where('idUser', '=', $user->idUser)
            ->delete();
        }

        else {
            $bookmark = Bookmark::select('*')
            ->where('isbn', '=', $isbn)
            ->where('idUser', '=', $user->idUser)
            ->update(['pageCurrent' => $req->pageCurrent]);
        }

    }

}
