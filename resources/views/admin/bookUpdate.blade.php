@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Update the book {{ $book->title }}</h2>
	</div>

	@if ($errors->any())
          <div class="alert alert-danger">
            <h3>Woops! Something went wrong</h3>
              <ul>
                  @foreach (array_slice($errors->all(), 0, 5) as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
    @endif

	<div class="swiper popular-swiper">
		<form method="POST" action="/updateBook" enctype="multipart/form-data">
		@csrf

			<input style="display: none;" type="text" id="isbn" name="isbn" value="{{ $book->isbn }}">

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="title">Title</label>
		    	</div>
		    <div class="col-75-admin">
		        <input type="text" class="@error('title') is-invalid @enderror" id="title" name="title" value="{{ $book->title }}" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="desc">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required>{{ $book->desc }}</textarea>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="pages">Pages</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="number" id="pages" class="@error('pages') is-invalid @enderror" name="pages" value="{{ $book->pages }}" required>
		    </div>
			
		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="cover">New Cover</label>
		    </div>
		    
		    <div class="col-75-admin">	
		        <input id="cover" type="file" name="cover">
		    </div>	

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="wallpaper">New Wallpaper</label>
		    	</div>
		    
		    <div class="col-75-admin">
		        <input id="wallpaper" type="file" name="wallpaper">
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="pdf">New PDF</label>
		    </div>
		    <div class="col-75-admin">
		        <input id="pdf" type="file" name="pdf">
		    </div>

		</div>

		<section class="home-info" style="margin: 2rem 0 0 0 !important;">
			<img class="info-img" src="{{ $book->getFirstMediaUrl('wallpaper') }}">
		</section>

		    <div class="row-admin select-admin-multi">
			    <div class="col-75-admin">
			    	<label for="pages">Author/s</label>
	 				<select class="form-control book-select" id="sel1" name="authors[]" style="width:auto; height: auto;" multiple>
				  		@foreach($authors as $author)
				  			@if($book->authors->contains($author->idAut))
				  			<option selected value="{{ $author->idAut }}">{{ $author->lastName }}</option>
				  			@else
				  			<option value="{{ $author->idAut }}">{{ $author->lastName }}</option>
				  			@endif
				  		@endforeach
	      			</select>
	      			</br>
			    </div>
			</div>
		    <script>
				function getSelectedAuthor(){
				    var e = document.getElementById("sel1");
				    var choiceValue = e.value;
				    var choicetext = e.options[e.selectedIndex].text;

				    var newDiv = document.createElement('span');
				    newDiv.setAttribute("class","book-select");
				    newDiv.innerHTML=choicetext+ " ";

				    var spanDiv = document.createElement('i');
				    spanDiv.setAttribute("class","fa fa-close");
				    spanDiv.setAttribute("onclick",'closeDiv(this)');

				    var inputDiv = document.createElement('input');
				    inputDiv.setAttribute("style","display: none;");
				    inputDiv.setAttribute("id", "idAut");
				    inputDiv.setAttribute("name", "idAut");
				    inputDiv.setAttribute("value", choiceValue);

				    newDiv.appendChild(spanDiv);
				    var displaydiv=document.getElementById('displaydiv');
				    displaydiv.appendChild(newDiv);
				    displaydiv.appendChild(inputDiv);
				}

				function closeDiv(x){
				    var parentDiv=x.parentNode.parentNode;
				    parentDiv.removeChild(x.parentNode);
				}
		    </script>

		    <div class="row-admin select-admin-multi">
			    <div class="col-75-admin">
			    	<label for="pages">Genre/s</label>
	 				<select class="form-control book-select" id="sel2" name="genres[]" style="width:auto; height: auto;" multiple>
				  		@foreach($genres as $genre)
				  			@if($book->genres->contains($genre->idGen))
				  			<option selected value="{{ $genre->idGen }}">{{ $genre->name }}</option>
				  			@else
				  			<option value="{{ $genre->idGen }}">{{ $genre->name }}</option>
				  			@endif
				  		@endforeach
	      			</select>
	      			</br>
			    </div>
			</div>

		    <div class="admin-button-group">
			    <button class="admin-button">Update</button>
			    <button class="admin-button" onclick="location.href='{{ route('authorAdmin') }}'">Go Back</button>
		    </div>

		</form>
	</div>
</section>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
	const inputElementCov = document.querySelector('input[id="cover"]');
	const pondCov = FilePond.create(inputElementCov);

	const inputElementWall = document.querySelector('input[id="wallpaper"]');
	const pondWall = FilePond.create(inputElementWall);

	const inputElementPdf = document.querySelector('input[id="pdf"]');
	const pondPdf = FilePond.create(inputElementPdf);

	FilePond.setOptions({
		server: {
			url: '/upload',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		}
	})
</script>
@endsection