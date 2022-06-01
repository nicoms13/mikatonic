
@foreach($books as $book)
<div class="book-box" onclick="location.href='/book/{{ $book->isbn }}'">
	<img class="book-box-img" src="{{ $book->getFirstMediaUrl('cover') }}">
	<div class="book-box-txt">
		<h2 class="book-title fs-400 ff-main">{{ $book->title }}</h2>
	</div>
</div>
@endforeach