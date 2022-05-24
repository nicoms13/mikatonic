@extends('layouts.app')

@section('content')

<section class="genre-info">
	<div class="author-info-box author-content">
		<h2 class="book-title fs-600 ff-main">{{ $genre->name }}</h2>
	</div>

	<p class="ff-light author-desc">{{ $genre->desc }}</p>

</section>

<section id="books-container" class="default-container">

	@foreach($books as $book)
	<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
		<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
		<div class="book-box-txt">
			<h2 class="book-title fs-400 ff-main">{{ $book->title }}</h2>
			<p class="	fs-200 ff-main home-pages">
				@foreach($book->authors()->get() as $author)
					@if ($loop->first)
						{{ $author->firstName }} {{ $author->lastName }}
					@else
						& {{ $author->firstName }} {{ $author->lastName }}
					@endif
				@endforeach
			</p>
		</div>
	</div>
	@endforeach

</section>

@endsection