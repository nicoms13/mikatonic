@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Manage the genres</h2>
		<i onclick="location.href='/admin/genre/new'" class="fa-solid fa-file-circle-plus"></i>
	</div>
	<div class="swiper popular-swiper">
		<table>
		  <thead>
		    <tr>
		      <th class="ff-title fs-400" scope="col">ID</th>
		      <th class="ff-title fs-400" scope="col">Name</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($genres as $genre)
		    <tr>
		      <td class="ff-light" data-label="ID">#{{ $genre->idGen }}</td>
		      <td class="ff-light" data-label="First Name">{{ $genre->name }}</td>
		      <td class="ff-light" data-label="Action">
		      	<button onclick="location.href='/admin/genre/{{ $genre->idGen }}'" class="admin-button">Edit {{ $genre->name }}</button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</section>
@endsection