@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Manage the authors</h2>
		<i onclick="location.href='/admin/author/new'" class="fa-solid fa-file-circle-plus"></i>
	</div>
	<div class="swiper popular-swiper">
		<table>
		  <thead>
		    <tr>
		      <th class="ff-title fs-400" scope="col">Logo</th>
		      <th class="ff-title fs-400" scope="col">First Name</th>
		      <th class="ff-title fs-400" scope="col">Last Name</th>
		      <th class="ff-title fs-400" scope="col">Books</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($authors as $author)
		    <tr>
		      <td class="ff-light book-name" onclick="location.href='/admin/author/{{ $author->idAut }}'" style="display: flex; align-items: center; justify-content: center;">
		      	<img style="max-height: 75px; max-width: 75px;" src="{{ $author->getFirstMediaUrl('logo') }}" />
		      </td>
		      <td class="ff-light" data-label="First Name">{{ $author->firstName }}</td>
		      <td class="ff-light" data-label="Last Name">{{ $author->lastName }}</td>
		      <td class="ff-light" data-label="Last Name">
		      	<select class="author-select option-author-book">
		      		@forelse($author->books()->get() as $book)
		      			<option class="option-author-book">{{ $book->title }}</option>
		      			@empty
		      			<option class="option-author-book">00</option>
		      		@endforelse
		      	</select>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</section>
@endsection