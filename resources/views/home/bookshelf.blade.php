@extends('layouts.app')

@section('content')
<section class="home-bookshelf home-bookshelf-bookshelf">
	<h2 class="ff-title info-author-title">Continue reading</h2>
</section>

<section>

	<div class="swiper bookshelf-swiper">
		<div class="swiper-wrapper">
			@forelse($booksReading as $book)
				<div class="swiper-slide">
					<div class="book-box" onclick="location.href='/read/{{ $book->isbn }}'">
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
						</div	>
					</div>
				</div>
				@empty
				<p style="margin-bottom: 5rem;">You are not reading any book now</p>
			@endforelse	
		</div>
	</div>

</section>


<section class="home-bookshelf bookshelf-container">
	<h2 class="ff-title info-author-title">Your bookshelf</h2>
</section>

<section>

	<div class="swiper bookshelf-swiper">
		<div class="swiper-wrapper">
			@forelse($books as $book)
				<div class="swiper-slide">
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
				</div>
				@empty
				<p style="margin-bottom: 5rem;">You haven't saved any book yet</p>
			@endforelse	
		</div>
	</div>

	<script>
		var swiperBookshelf = new Swiper('.bookshelf-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-bookshelf',
		    prevEl: '.swiper-button-prev-bookshelf',
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
</section>

</section>

@endsection