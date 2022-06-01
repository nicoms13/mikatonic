@extends('layouts.app')

@section('content')

<section class="home-explore">
	<div class="search-box explore-bar">
        <input type="search" name="search" id="search-explore" class="text-color" placeholder="Find something amazing..." autocomplete="off">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</section>

<section id="books-container" class="default-container">

	@include('layouts.data')

</section>

<section id="content-explore" class="content-container">

</section>

<script>

	function loadMoreData(page) {
		$.ajax({
			url:'?page='+ page,
			type: 'get',
		})
		.done(function(data){
			if(data.html == " ") {
				$('.ajax').html("No more books found");
				return;
			}
			$('#books-container').append(data.html);
		})
		.fail(function(jqXHR,ajaxOptions,thrownError){
			alert("Server not responding...");
		});
	}

	var page = 1;
	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() >= $(document).height()) {
			page++;
			loadMoreData(page);
		}
	})

	$('#search-explore').on('keyup', function(){

		$value = $(this).val();

		if($value) {
			$('.default-container').hide();
			$('.content-container').show();
		}

		else {
			$('.default-container').show();
			$('.content-container').hide();
		}

		$.ajax({
			type:'get',
			url:'{{ URL::to('search') }}',
			data:{'search':$value},
			success:function(data) {
				$('#content-explore').html(data);
			}
		});
	})
</script>

@endsection