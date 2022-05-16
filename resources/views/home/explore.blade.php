@extends('layouts.app')

@section('content')

<section class="home-explore">
	<div class="search-box explore-bar">
        <input type="search" name="search" id="search-explore" class="text-color" placeholder="Search for a book..." autocomplete="off">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <div id="search-list">
    	
    </div>
</section>

<script>
	$(document).ready(function(){
		$('#search-explore').on('keyup', function(){
			var query = $(this).val();
			$.ajax({
				url: "/search",
				type: "GET",
				data: {'search':query},
				success: function(data){
					$('#search-list').html(data);
				}
		});
	});
	});
</script>

@endsection