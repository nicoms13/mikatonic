@extends('layouts.app')

@section('content')

<section class="home-explore">
    <div class="search-box explore-bar">
        <input type="search" name="search" id="search-explore" class="text-color" placeholder="Find something amazing..." autocomplete="off">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</section>

<section id="books-container" class="default-container">

    @foreach($books as $book)
    <div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
        <img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
        <div class="book-box-txt">
            <h2 class="book-title fs-400 ff-main">{{ $book->title }}</h2>
        </div>
    </div>
    @endforeach

</section>

<section id="content-explore" class="content-container">

    <button wire:click='loadMore' type="button">Load more...</button>

</section>

<script>
    $('#search-explore').on('keyup', function(){

        $value = $(this).val();

        if($value) {
            $('.default-container').hide();
            $('.content-container').show();
        }

        else {
            $('.default-container').show();
            $('.content-container').hide();
        }

        $.ajax({
            type:'get',
            url:'{{ URL::to('search') }}',
            data:{'search':$value},
            success:function(data) {
                $('#content-explore').html(data);
            }
        });
    })
</script>

@endsection