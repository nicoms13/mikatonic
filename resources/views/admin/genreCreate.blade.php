@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Create a new genre</h2>
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
		<form method="POST" action="/createGenre">
		@csrf

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="name">Name</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="name" name="name" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="firstName">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required></textarea>
		    </div>

		    <div class="admin-button-group">
			    <button class="admin-button">Create</button>
			    <button class="admin-button" onclick="location.href='{{ route('genreAdmin') }}'">Go Back</button>
		    </div>

		</form>
	</div>
</section>
@endsection