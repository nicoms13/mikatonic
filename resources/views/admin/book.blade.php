@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Manage the books</h2>
		<i onclick="location.href='/admin/book/new'" class="fa-solid fa-file-circle-plus"></i>
	</div>
	<div class="swiper popular-swiper">
		<table>
		  <thead>
		    <tr>
		      <th class="ff-title fs-400" scope="col">ISBN</th>
		      <th class="ff-title fs-400" scope="col">Title</th>
		      <th class="ff-title fs-400" scope="col">Pages</th>
		      <th class="ff-title fs-400" scope="col">Author</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($books as $book)
		    <tr>
		      <td class="ff-light" data-label="ID">{{ $book->isbn }}</td>
		      <td class="ff-light" data-label="First Name">{{ $book->title }}</td>
		      <td class="ff-light" data-label="Last Name">{{ $book->pages }}</td>
		      <td class="ff-light" data-label="Last Name">{{ $book->pages }}</td>
		      <td class="ff-light" data-label="Action">
		      	<button onclick="location.href='/admin/book/{{ $book->isbn }}'" class="admin-button">Edit {{ $book->isbn }}</button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</section>
@endsection