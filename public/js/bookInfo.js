	$('.add-bookshelf').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookshelfAdd') }}',
			data: {'isbn':$idBook},
			success: function(){
				$('#bookshelf-icon').css('color', '#11998E');
				new Audio('/sounds/SuccessSoundEffect.mp3').play();
			}
		});
	})

	$('.remove-bookshelf').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookshelfRemove') }}',
			data: {'isbn':$idBook},
			success: function(){
				$('#bookshelf-icon').css('color', '#fff');
			}
		});
	})

	$('.read-btn').on('click', function(){

		$idBook = {{ $book->isbn }};

		$.ajax({
			type: 'get',
			url: '{{ URL::to('bookStartReading') }}',
			data: {'isbn':$idBook},
			success: function(){
				window.location.href = '/read/{{ $book->isbn }}';
			}
		});
	})