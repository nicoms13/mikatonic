<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class Books extends Component
{

    public $amount = 5;

    public function loadMore() {
        dd($amount);
        $this->amount += 3;
    }

    public function render() {

        return view('livewire.books', [
            "books" => Book::query()->paginate($this->amount)
        ]);
    }

}
