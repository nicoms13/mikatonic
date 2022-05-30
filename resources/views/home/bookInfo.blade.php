@extends('layouts.app')

@section('content')

<section class="home-info">
	<img class="info-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
	<div class="info-txt">
		<h2 class="home-title ff-main fs-600">{{ $book->title }}</h2>
		<div class="bookshelf-icon">

			<i id="bookshelf-icon" class="fa-solid fa-bookmark add-bookshelf"></i>

		</div>
		<div>
			@foreach($book->genres()->get() as $genre)
			<span class="book-genre fs-300 ff-main" onclick="location.href='/genre/{{ $genre->idGen }}'">{{ $genre->name }}</span>
			@endforeach
		</div>
		<a class="read-btn flex">
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
					<img class="info-author-img" src="{{ $author->getFirstMediaUrl('logo') }}">
					<span class="info-author-txt ff-light">{{ $author->firstName }} <strong>{{ $author->lastName }}</strong></span>
				</div>
			@endforeach
		</div>
	</div>
</section>

<audio>
	<source id="SuccessSoundEffect" src="\sounds\SuccessSoundEffect.mp3" type="audio/mp3">
</audio>

@foreach($book->user()->get() as $user)
	@if($user->idUser == auth()->user()->idUser)
	<script>

		var bookshelf = document.getElementById('bookshelf-icon');
		var audioElement = document.getElementById('SuccessSoundEffect');

		var audio = new Audio('/sounds/SuccessSoundEffect.mp3');

		bookshelf.classList.remove("add-bookshelf");
		bookshelf.classList.add("remove-bookshelf");

		bookshelf.style.color = "#11998E";

	</script>
	@endif
@endforeach

<script>

	$('.add-bookshelf').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookshelfAdd') }}',
			data: {'isbn':$idBook},
			success: function(){
				$('#bookshelf-icon').css('color', '#11998E');
				new Audio('/sounds/SuccessSoundEffect.mp3').play();
			}
		});
	})

	$('.remove-bookshelf').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookshelfRemove') }}',
			data: {'isbn':$idBook},
			success: function(){
				$('#bookshelf-icon').css('color', '#fff');
			}
		});
	})

	$('.read-btn').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookStartReading') }}',
			data: {'isbn':$idBook},
			success: function(){
				window.location.href = '/read/{{ $book->isbn }}';
			}
		});
	})

</script>

@endsection