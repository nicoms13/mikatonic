@extends('layouts.app')

@section('content')

	<section class="home home-container flex" id="home">

		<div class="swiper-slide swiper-main flex">
			<img src="/images/portraits/hpLovecraftPortrait.png" class="home-img">

			<div class="home-txt">
				<h1 class="home-title author-title ff-light fs-600">Howards Philips<br>
					@foreach($authors as $author)
					@if($author->lastName == 'Lovecraft')
						<strong class="fs-700 lovecraft-title" onclick="location.href='/author/{{ $author->idAut }}'">Lovecraft</strong>
					@endif
					@endforeach
				</h1>
				<div class="author-txt-box">
					@foreach($genres as $genre)
						<span class="author-genre fs-400 ff-main" onclick="location.href='/genre/{{ $genre->idGen }}'">{{ $genre->name }}</span>
					@endforeach
					</div>
				</div>
		</div>

	</section>

<section id="author-container">

	@foreach($authors as $author)
	@if($author->lastName != 'Lovecraft')
	<div class="author-box" onclick="location.href='/author/{{ $author->idAut }}'">
		<img src="{{ $author->getFirstMediaUrl('wallpaper') }}" class="author-box-img">
		<div class="book-box-txt">
			<h2 class="book-title fs-600 ff-main">{{ $author->firstName }} <strong>{{ $author->lastName }}</strong></h2>
			</div>
	</div>
	@endif
	@endforeach

</section>

@endsection