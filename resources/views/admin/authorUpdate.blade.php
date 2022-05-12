@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Update the author {{ $author->lastName }}</h2>
	</div>
	<div class="swiper popular-swiper">
		<form method="POST" action="/updateAuthor">
		@csrf

		    <input style="display: none;" type="text" id="idAut" name="idAut" value="{{ $author->idAut }}">

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">First Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="firstName" name="firstName" value="{{ $author->firstName }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Last Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="lastName" name="lastName" value="{{ $author->lastName }}" required>
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
		        <input type="text" id="logo" name="logo" value="{{ $author->logo }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Wallpaper</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="wallpaper" name="wallpaper" value="{{ $author->wallpaper }}" required>
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
@endsection