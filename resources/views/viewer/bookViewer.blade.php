<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<! -- Stylesheet -->
    <link href="viewer/viewer.css" rel="stylesheet">
    <! -- FontAwesome -->
    <script src="https://kit.fontawesome.com/91a731da61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js" integrity="sha512-IM60GPudO4jk+ZQm3UlJgKHhXQi5pNDM6mP+pLKL968YgkHMc7He3aGJOVHEZ9rJ4vAaEtJ8W6SKa7Qq4inzBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Miskatonic</title>
</head>
<body>
	<main>
		<h3 style="font-weight: 200;"><strong>Error.</strong> No book selected</h3>
		<canvas class="pdf-viewer hidden"></canvas>
	</main>

	<footer>
		<ul>
			<li>
			<button id="closePDF" onclick="location.href='{{ route('home') }}'">
				<i class="fa-solid fa-circle-xmark"></i>
			</button>

				<input type="file" id="inputFile" hidden>

			</li>

			<li class="pagination-container">
				<button id="previous"><i class="fa-solid fa-caret-left"></i></i></button>
				<span id="current_page">0 of 0</span>
				<button id="next"><i class="fa-solid fa-caret-right"></i></button>
			</li>

			<li class="zoom-container">
				<span id="zoomValue">150%</span>
				<input type="range" id="zoom" name="cowbell" min="100" max="300" value="150" step="50" disabled>
			</li>
		</ul>
	</footer>

</body>
<script src="viewer/viewer.js"></script>
</html>