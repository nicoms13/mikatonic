@extends('layouts.app')

@section('content')
<section class="home home-container flex" id="home">

	<div class="swiper-slide swiper-main flex">
		<img src="/images/portraits/hpLovecraftPortrait.png" class="home-img">

		<div class="home-txt">
			<h1 class="home-title author-title ff-light fs-600">Howards Philips<br><strong class="fs-700">Lovecraft</strong></h1>
			<div class="author-txt-box">
				<span class="author-genre fs-400 ff-main">Cthulu mythos</span>
				<span class="author-genre fs-400 ff-main">Dream Cycle</span>
				<span class="author-genre fs-400 ff-main">Weird Tales</span>
				</div>
			</div>
	</div>

</section>

<section id="author-container">

	@foreach($authors as $author)
	@if($author->lastName != 'Lovecraft')
	<div class="author-box">
		<img src="{{ $author->getFirstMediaUrl('wallpaper') }}" class="author-box-img">
		<div class="book-box-txt">
			<h2 class="book-title fs-600 ff-main">{{ $author->firstName }} <strong>{{ $author->lastName }}</strong></h2>
			</div>
	</div>
	@endif
	@endforeach

</section>

@endsection