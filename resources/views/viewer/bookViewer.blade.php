@extends('layouts.viewer')

@section('content')
	<main>
		<h3 style="font-weight: 200;"><strong>Error.</strong> No book selected</h3>
		<canvas id="pdf-render" class="pdf-viewer hidden"></canvas>
	</main>

	<footer>
		<ul>
			<li>
			<button>
				<i class="fa-solid fa-circle-xmark" id="closePDF"></i>
				<i class="fa-solid fa-circle-half-stroke" id="colorChange"></i>
			</button>

			</li>

			<li class="pagination-container">
				<button id="previous"><i class="fa-solid fa-caret-left"></i></i></button>
				<span id="current_page">{{ $bookmark->pageCurrent }} of {{ $bookmark->pageCurrent }}</span>
				<button id="next"><i class="fa-solid fa-caret-right"></i></button>
			</li>

			<li class="zoom-container">
				<span id="zoomValue">150%</span>
				<input type="range" id="zoom" name="cowbell" min="100" max="300" value="150" step="50">
			</li>
		</ul>
	</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
var pdfRoute = '{{ $book->getFirstMediaUrl('pdf') }}';
pdfRoute = pdfRoute.substring(pdfRoute.indexOf("0/") + 1);

var backgroundColor = 'rgba(255, 255, 255, 1.0)';

const zoomButton = document.getElementById('zoom');
const currentPage = document.getElementById('current_page');
const viewer = document.querySelector('.pdf-viewer');
let currentPDF = {};

function resetCurrentPDF() {
	currentPDF = {
		file: null,
		countOfPages: 0,
		currentPage: {{ $bookmark->pageCurrent }},
		zoom: 1.5
	}
}

function reloadPDF() {
	currentPDF = {
		file: null,
		countOfPages: 0,
		currentPage: currentPDF.currentPage,
		zoom: 1.5
	}
}

zoomButton.addEventListener('input', () => {
	if (currentPDF.file) {
		document.getElementById('zoomValue').innerHTML = zoomButton.value + "%";
		currentPDF.zoom = parseInt(zoomButton.value) / 100;
		renderCurrentPage();
	}
});

document.getElementById('next').addEventListener('click', () => {
	const isValidPage = currentPDF.currentPage < currentPDF.countOfPages;
	if (isValidPage) {
		currentPDF.currentPage += 1;
		renderCurrentPage();
	}
});

document.getElementById('previous').addEventListener('click', () => {
	const isValidPage = currentPDF.currentPage - 1 > 0;
	if (isValidPage) {
		currentPDF.currentPage -= 1;
		renderCurrentPage();
	}
});

window.addEventListener("load", function(event) {
	const pdfFile = pdfjsLib.getDocument(pdfRoute);
	resetCurrentPDF();
	pdfFile.promise.then((doc) => {
		currentPDF.file = doc;
		currentPDF.countOfPages = doc.numPages;
		viewer.classList.remove('hidden');
		document.querySelector('main h3').classList.add("hidden");
		renderCurrentPage();
	});

});

function renderCurrentPage() {
	currentPDF.file.getPage(currentPDF.currentPage).then((page) => {
		var context = viewer.getContext('2d');
		var viewport = page.getViewport({ scale: currentPDF.zoom, });
		viewer.height = viewport.height;
		viewer.width = viewport.width;

		var renderContext = {
			canvasContext: context,
			background: backgroundColor,
			viewport: viewport
		};
		page.render(renderContext);
	});
	currentPage.innerHTML = currentPDF.currentPage + ' of ' + currentPDF.countOfPages;
}

$('#closePDF').on('click', function(){

	$idBook = {{ $book->isbn }};
	$currentPage = currentPDF.currentPage;

	$.ajax({
		type: 'get',
		url: '{{ URL::to('bookmarkSave') }}',
		data: {'isbn': $idBook, 'pageCurrent': $currentPage},
		success: function(){
			window.location.href = '/bookshelf';
		}
	});
})

$('#colorChange').on('click', function(){

	$idBook = {{ $book->isbn }};
	$currentPage = currentPDF.currentPage;

	$.ajax({
		type: 'get',
		url: '{{ URL::to('bookmarkSave') }}',
		data: {'isbn': $idBook, 'pageCurrent': $currentPage},
		success: function(){	
			var pdfFile = pdfjsLib.getDocument(pdfRoute);

			if (backgroundColor == 'rgba(255, 255, 255, 1.0)') backgroundColor = 'rgba(255, 240, 168, 1.0)';

			else backgroundColor = 'rgba(255, 255, 255, 1.0)';

			reloadPDF();
			pdfFile.promise.then((doc) => {
				currentPDF.file = doc;
				currentPDF.countOfPages = doc.numPages;
				viewer.classList.remove('hidden');
				document.querySelector('main h3').classList.add("hidden");
				renderCurrentPage();
			});
		}
	});
})

</script>
@endsection