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
		      <th class="ff-title fs-400" scope="col">ID</th>
		      <th class="ff-title fs-400" scope="col">First Name</th>
		      <th class="ff-title fs-400" scope="col">Last Name</th>
		      <th class="ff-title fs-400" scope="col">Books</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($authors as $author)
		    <tr>
		      <td class="ff-light" style="display: flex; align-items: center; justify-content: center;">
		      	<img style="max-height: 75px; max-width: 75px;" src="{{ $author->getFirstMediaUrl('logo') }}" />
		      </td>
		      <td class="ff-light" data-label="First Name">{{ $author->firstName }}</td>
		      <td class="ff-light" data-label="Last Name">{{ $author->lastName }}</td>
		      <td class="ff-light" data-label="Last Name">
		      	<select class="author-select">
		      		<option>Test</option>
		      		<option>Test</option>
		      		<option>Test</option>
		      	</select>
		      </td>
		      <td class="ff-light" data-label="Action">
		      	<button onclick="location.href='/admin/author/{{ $author->idAut }}'" class="admin-button">Edit {{ $author->lastName }}</button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</section>
@endsection