@extends('layouts.app')

@section('content')

<section class="home-info">
	<img class="info-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
	<div class="info-txt">
		<h2 class="home-title ff-main fs-600">{{ $book->title }}</h2>
		<div class="bookshelf-icon">
			<i class="fa-solid fa-bookmark"></i>
		</div>
		<div>
			@foreach($book->genres()->get() as $genre)
			<span class="book-genre fs-300 ff-main">{{ $genre->name }}</span>
			@endforeach
		</div>
		<a onclick="location.href='/read/{{ $book->isbn }}'" class="read-btn flex">
			<div class="flex">
				<i class="fa-solid fa-play"></i>
				<span>Read now</span>
			</div>
		</a>
	</div>
</section>

<section>
	<div class="about-book-container">
		<h2 class="ff-title text-color-main">{{ $book->title }}</h2>
		<p class="ff-light">{{ $book->desc }}</p>
		<h2 class="ff-title info-author-title">Author</h2>
		<div class="authors-info-box">
			@foreach($book->authors()->get() as $author)
				<div class="author-info-box">
					<img class="info-author-img" src="{{ $author->getFirstMediaUrl('wallpaper') }}">
					<span class="info-author-txt ff-light">{{ $author->firstName }} <strong>{{ $author->lastName }}</strong></span>
				</div>
			@endforeach
		</div>
	</div>
</section>

@endsection