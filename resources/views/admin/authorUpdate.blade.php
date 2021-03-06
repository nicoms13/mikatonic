@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Update the author {{ $author->lastName }}</h2>
		<img style="max-height: 50px; max-width: 50px;" src="{{ $author->getFirstMediaUrl('logo') }}" />
	</div>

	@if ($errors->any())
          <div class="alert alert-danger">
            <h3>Woops! Something went wrong</h3>
              <ul>
                  @foreach (array_slice($errors->all(), 0, 5) as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
    @endif
    
	<div class="swiper popular-swiper">
		<form method="POST" action="/updateAuthor">
		@csrf

		    <input style="display: none;" type="text" id="idAut" name="idAut" value="{{ $author->idAut }}">

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">First Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="firstName" class="@error('firstName') is-invalid @enderror" name="firstName" value="{{ $author->firstName }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Last Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="lastName" class="@error('lastName') is-invalid @enderror" name="lastName" value="{{ $author->lastName }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required>{{ $author->desc }}</textarea>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Logo</label>
		    </div>
		    <div class="col-75-admin">
		        <input id="logo" type="file" name="logo">
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Wallpaper</label>
		    </div>
		    <div class="col-75-admin">
				<input id="wallpaper" type="file" name="wallpaper">
		    </div>



		    <div class="admin-button-group">
			    <button class="admin-button">Update</button>
			    <button class="admin-button" onclick="location.href='{{ route('authorAdmin') }}'">Go Back</button>
		    </div>

		</form>

		<form method="POST" action="/deleteAuthor">
		@csrf
			<input style="display: none;" type="text" id="idAut" name="idAut" value="{{ $author->idAut }}">

		    <button class="admin-button delete-btn" onclick="location.href='{{ route('authorAdmin') }}'">Delete <i class="fa-solid fa-triangle-exclamation"></i></button>

		</form>

	</div>
</section>

<section>
<h2 class="book-title fs-500 ff-main">Books by {{ $author->lastName }}</h2>
</section>

<section id="books-container" class="default-container">

	@foreach($author->books as $book)
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

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
	const inputElement = document.querySelector('input[id="wallpaper"]');
	const pond = FilePond.create(inputElement);

	const inputElementLogo = document.querySelector('input[id="logo"]');
	const pondLogo = FilePond.create(inputElementLogo);

	FilePond.setOptions({
		server: {
			url: '/upload',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		}
	})
</script>

@endsection