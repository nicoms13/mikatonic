@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Update the genre {{ $genre->name }}</h2>
	</div>

	@if ($errors->any())
          <div class="alert alert-danger">
            <h3>Woops! Something went wrong</h3>
              <ul>
                  @foreach ($errors->all()->slice(1, 5) as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
    @endif

	<div class="swiper popular-swiper">
		<form method="POST" action="/updateGenre">
		@csrf

		    <input style="display: none;" type="text" id="idGen" name="idGen" value="{{ $genre->idGen }}">

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="name">Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="name" name="name" value="{{ $genre->name }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required>{{ $genre->desc }}</textarea>
		    </div>

		    <div class="admin-button-group">
			    <button class="admin-button">Update</button>
			    <button class="admin-button" onclick="location.href='{{ route('genreAdmin') }}'">Go Back</button>
		    </div>

		</form>

		<form method="POST" action="/deleteGenre">
		@csrf
			<input style="display: none;" type="text" id="idGen" name="idGen" value="{{ $genre->idGen }}">

		    <button class="admin-button delete-btn" onclick="location.href='{{ route('genreAdmin') }}'">Delete <i class="fa-solid fa-triangle-exclamation"></i></button>

		</form>

	</div>
</section>
@endsection