@extends('layouts.admin')

@section('content')
<section class="admin-home-section home-explore">

	<form method="POST" action="/bookSlider">
	@csrf
		<h3>Add a book to the main slider:</h3>
		<select name="isbn">
			@foreach($books as $book)
	  			<option value="{{ $book->isbn }}">{{ $book->title }}</option>
	  		@endforeach
		</select>
		<button class="admin-button">Add</button>
	</form>

</section>


<section id="books-container" class="default-container">
	@foreach($sliderBooks as $book)
	<div class="book-box book-box-remove" onclick="location.href='/removeBookSlider/{{ $book->isbn }}'">
		<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
		<div class="book-box-txt">
			<h2 class="book-title fs-400 ff-main">{{ $book->title }}</h2>
		</div>
	</div>
	@endforeach
</section>

@endsection