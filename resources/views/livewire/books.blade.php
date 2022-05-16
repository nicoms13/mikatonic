@extends('layouts.app')

@section('content')

<section id="books-container">

    @foreach($books as $book)
    <div class="book-box books-container-box">
        <img src="/images/covers/dagoncover.png" class="books-box-img">
        <div class="book-box-txt">
            <h2 class="book-title fs-400 ff-main">{{ $amount }}</h2>
            <div>
                <span class="book-genre fs-100 ff-main">Weird Taless</span>
                </div>
        </div>
    </div>
    @endforeach

</section>

<section>
    <button wire:click="loadMore" type="button">Load more...</button>
</section>

@endsection