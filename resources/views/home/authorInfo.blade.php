@extends('layouts.app')

@section('content')

<section class="home-info">
	<div class="author-info-box author-content">
		<h2 class="book-title fs-600 ff-light">{{ $author->firstName }} <strong>{{ $author->lastName }}</strong></h2>
		<img class="info-author-img" src="{{ $author->getFirstMediaUrl('logo') }}">
	</div>

	<p class="ff-light author-desc">{{ $author->desc }}</p>

	<div class="home-heading">
		<h2 class="fs-400 ff-main">{{ $author->lastName }}</h2>
		<div class="swiper-btn flex">
			<div class="swiper-button-prev-info-author"></div>
			<div class="swiper-button-next-info-author"></div>
		</div>
	</div>

	<div class="swiper author-info-swiper">
		<div class="swiper-wrapper">
			@foreach($books as $book)
				<div class="swiper-slide">
					<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
						<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
						<div class="book-box-txt">
							<h2 class="book-title fs-400 ff-main">{{ $book->title }}</h2>
						</div	>
					</div>
				</div>
			@endforeach	
		</div>
	</div>

</section>

<script>
	var swiperBookshelf = new Swiper('.author-info-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-info-author',
		    prevEl: '.swiper-button-prev-info-author',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  breakpoints: {
		  	280:{
		  		slidesPerView: 1,
		  		spaceBetween: 10,
		  	},
		  	320:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	510:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	758:{
		  		slidesPerView: 3,
		  		spaceBetween: 15,
		  	},
		  	900:{
		  		slidesPerView: 4,
		  		spaceBetween: 20,
		  	},
		  },
		});
</script>

@endsection