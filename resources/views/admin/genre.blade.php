@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Manage the genres</h2>
		<i onclick="location.href='/admin/genre/new'" class="fa-solid fa-file-circle-plus"></i>
	</div>
	<div class="swiper popular-swiper">
		<table>
		  <thead>
		    <tr>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($genres as $genre)
		    <tr>
		      <td class="ff-light book-name" data-label="First Name" onclick="location.href='/admin/genre/{{ $genre->idGen }}'">{{ $genre->name }}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</section>

<section>
<h2 class="book-title fs-600 ff-main">Cthulu Mythos</h2>
</section>

<section id="books-container" class="default-container">

	@foreach($books as $book)
		@if(strpos($book->genresNames(), 'Cthulu Mythos') !== false)
		<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
			<img class="book-box-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
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
		@endif
	@endforeach

</section>

<section>
<h2 class="book-title fs-600 ff-main">Dream Cycle</h2>
</section>

<section id="books-container" class="default-container">

	@foreach($books as $book)
		@if(strpos($book->genresNames(), 'Dream Cycle') !== false)
		<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
			<img class="book-box-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
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
		@endif
	@endforeach

</section>

<section>
<h2 class="book-title fs-600 ff-main">Weird Tales</h2>
</section>

<section id="books-container" class="default-container">

	@foreach($books as $book)
		@if(strpos($book->genresNames(), 'Weird Tales') !== false)
		<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
			<img class="book-box-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
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
		@endif
	@endforeach

</section>
@endsection