<?php

namespace App\Http\Livewire;

use Livewire\Component;
    use App\Models\Book;

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

}
