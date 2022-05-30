@extends('layouts.admin')

@section('content')

<!-- Popular section -->
<section class="admin-container">
	<div class="home-heading admin-heading">
		<h2 class="fs-400 ff-main">Create a new book</h2>
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
		<form method="POST" action="/createBook" enctype="multipart/form-data">
		@csrf

			<div class="row-admin">
		      <div class="col-25-admin">
		        <label for="title">Title</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="text" id="title" name="title" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="cover">Cover</label>
		    </div>
		    <div class="col-75-admin">
		        <input id="cover" type="file" name="cover" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="wallpaper">Wallpaper</label>
		    </div>
		    <div class="col-75-admin">
		        <input id="wallpaper" type="file" name="wallpaper" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="desc">Description</label>
		    </div>
		    <div class="col-75-admin">
		        <textarea id="desc" name="desc" required></textarea>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="pages">Pages</label>
		    </div>
		    <div class="col-75-admin">
		        <input type="number" id="pages" name="pages" required>
		    </div>

		    <div class="row-admin">
		      <div class="col-25-admin">
		        <label for="pdf">PDF</label>
		    </div>
		    <div class="col-75-admin">
		        <input id="pdf" type="file" name="pdf" required>
		    </div>

		</div>

		    <div class="row-admin select-admin-multi">
			    <div class="col-75-admin">
			    	<label for="pages">Author/s</label>
	 				<select class="form-control book-select" id="sel1" name="authors[]" style="width:auto; height: auto;" multiple>
				  		@foreach($authors as $author)
				  			<option value="{{ $author->idAut }}">{{ $author->lastName }}</option>
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
				  			<option value="{{ $genre->idGen }}">{{ $genre->name }}</option>
				  		@endforeach

	      			</select>
	      			</br>
			    </div>
			</div>

		    <div class="admin-button-group">
			    <button class="admin-button">Create</button>
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