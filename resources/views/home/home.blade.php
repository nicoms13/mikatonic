@extends('layouts.app')

@section('content')

<!-- Main wrapper -->
<section class="home home-container flex" id="home">
	<div class="swiper">
		<div class="swiper-wrapper">

			@foreach($sliderBooks as $sliderBook)
			<div class="swiper-slide swiper-main flex">
				<img src="{{ $sliderBook->getFirstMediaUrl('wallpaper') }}" class="home-img">

				<div class="home-txt">
					<h1 class="home-title ff-main fs-600">{{ $sliderBook->title }}</h1>
					<p class="	fs-200 ff-main home-author">
						@foreach($sliderBook->authors()->get() as $author)
							@if ($loop->first)
								{{ $author->firstName }} {{ $author->lastName }}
							@else
								& {{ $author->firstName }} {{ $author->lastName }}
							@endif
						@endforeach
					</p>

					<p class="fs-200 home-pages"><span class="ff-main">{{ $sliderBook->pages }}</span> pages</p>
					<div>
						@foreach($sliderBook->genres()->get() as $genre)
							<span class="author-genre fs-400 ff-main" onclick="location.href='/genre/{{ $genre->idGen }}'">{{ $genre->name }}</span>
						@endforeach
					</div>
					<a href="/book/{{ $sliderBook->isbn }}" class="read-btn flex">
						<div class="flex">
							<i class="fa-solid fa-play"></i>
							<span>{{ __('messages.read_now') }}</span>
						</div>
					</a>
				</div>
			</div>
			@endforeach

		</div>
		<div class="swiper-pagination"></div>
	</div>
	<script>
		const swiper = new Swiper('.swiper', {
		  
		  pagination: {
		    el: '.swiper-pagination',
		  },

		  
		  navigation: {
		    nextEl: '.swiper-button-next',
		    prevEl: '.swiper-button-prev',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  autoplay: {
    		delay: 10000,
  		  },
  		  loop: true,
		});

	</script>
</section>

<!-- Popular section -->
<section id="top-home">
	<div class="home-heading">
		<h2 class="fs-400 ff-main">{{ __('messages.popular_books') }}</h2>
		<div class="swiper-btn flex">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
	<div class="swiper popular-swiper">
		<div class="swiper-wrapper">

			@forelse($popularBooks as $popularBook)
			<div class="swiper-slide" onclick="location.href='/book/{{ $popularBook->isbn }}'">
				<div class="book-box">
					<img class="book-box-img" src="{{ $popularBook->getFirstMediaUrl('cover') }}">
					<div class="book-box-txt">
						<h2 class="book-title fs-500 ff-main">{{ $popularBook->title }}</h2>
						<div>
							@foreach($popularBook->genres()->get() as $genre)
								<span class="book-genre fs-200 ff-main" onclick="location.href='/genre/{{ $genre->idGen }}'">{{ $genre->name }}</span>
							@endforeach
						</div>
						<div>
						</div>
					</div>
				</div>
			</div>

			@empty
			<p style="margin-bottom: 5rem;">No popular books yet</p>
			@endforelse

		</div>
	</div>
	<script>
		var swiperPopular = new Swiper('.popular-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next',
		    prevEl: '.swiper-button-prev',
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

<!-- Cthulu section -->
<section id="cthulu-home">
	<div class="home-heading">
		<h2 class="fs-400 ff-main">{{ __('messages.cthulu_mythos') }}</h2>
		<div class="swiper-btn flex">
			<div class="swiper-button-prev swiper-button-prev-mythos"></div>
			<div class="swiper-button-next swiper-button-next-mythos"></div>
		</div>
	</div>

	<div class="swiper mythos-swiper">
		<div class="swiper-wrapper">
			@forelse($books as $book)
				@if(strpos($book->genresNames(), 'Cthulu Mythos') !== false)
				<div class="swiper-slide">
					<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
						<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
						<div class="book-box-txt">
							<h2 class="book-title fs-500 ff-main">{{ $book->title }}</h2>
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
				@endif
			@empty
			<p style="margin-bottom: 5rem;">You are not reading any book now</p>
			@endforelse	
		</div>
	</div>

	<script>
		var swiperMythos = new Swiper('.mythos-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-mythos',
		    prevEl: '.swiper-button-prev-mythos',
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

<!-- Dream section -->
<section id="dream-home">
	<div class="home-heading">
		<h2 class="fs-400 ff-main">{{ __('messages.dream_cycle') }}</h2>
		<div class="swiper-btn flex">
			<div class="swiper-button-prev swiper-button-prev-dream"></div>
			<div class="swiper-button-next swiper-button-next-dream"></div>
		</div>
	</div>
	<div class="swiper dream-swiper">
		<div class="swiper-wrapper">
			@forelse($books as $book)
				@if(strpos($book->genresNames(), 'Dream Cycle') !== false)
				<div class="swiper-slide">
					<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
						<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
						<div class="book-box-txt">
							<h2 class="book-title fs-500 ff-main">{{ $book->title }}</h2>
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
				@endif
			@empty
			<p style="margin-bottom: 5rem;">You are not reading any book now</p>
			@endforelse	
		</div>
	</div>
	<script>
		var swiperDream = new Swiper('.dream-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-dream',
		    prevEl: '.swiper-button-prev-dream',
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

<!-- Weird Section -->
<section id="weird-home">
	<div class="home-heading">
		<h2 class="fs-400 ff-main">{{ __('messages.weird_tales') }}</h2>
		<div class="swiper-btn flex">
			<div class="swiper-button-prev swiper-button-prev-weird"></div>
			<div class="swiper-button-next swiper-button-next-weird"></div>
		</div>
	</div>
	<div class="swiper weird-swiper">
		<div class="swiper-wrapper">
			@forelse($books as $book)
				@if(strpos($book->genresNames(), 'Weird Tales') !== false)
				<div class="swiper-slide">
					<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
						<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
						<div class="book-box-txt">
							<h2 class="book-title fs-500 ff-main">{{ $book->title }}</h2>
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
				@endif
			@empty
			<p style="margin-bottom: 5rem;">You are not reading any book now</p>
			@endforelse	
		</div>
	</div>
	<script>
		var swiperWeird = new Swiper('.weird-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-weird',
		    prevEl: '.swiper-button-prev-weird',
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
@endsection