@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Create a new author</h2>
	</div>
	<div class="swiper popular-swiper">
		<form method="POST" action="/createAuthor">
		@csrf

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">First Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="firstName" name="firstName" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Last Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="lastName" name="lastName" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required></textarea>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Logo</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="logo" name="logo" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Wallpaper</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="wallpaper" name="wallpaper" required>
		    </div>

		    <div class="admin-button-group">
			    <button class="admin-button">Create</button>
			    <button class="admin-button" onclick="location.href='{{ route('authorAdmin') }}'">Go Back</button>
		    </div>

		</form>
	</div>
</section>
@endsection