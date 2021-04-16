<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	
	$domOBJ = new DOMDocument();
	$domOBJ->load("https://mayar.abertay.ac.uk/~1505050/Week10/Controller/RSSfeed.php");
	
	$content = $domOBJ -> getElementsByTagName("item");
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>HMDB - RSS Feed</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body style="height:100%;">
		<div class="bg-secondary h-100">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="../View/HorrorMovieDatabase.php">Return Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Controller/RSSfeed.php">view XSLT</a>
			</li>
		</ul>
	</div>
</nav>
		<!-- Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1>RSS Feed</h1>
			</div>
		</div>
		
		
		<table class="table table-dark">
		<?php
			foreach($content as $data){
				$title = $data->getElementsByTagName("title")->item(0)->nodeValue;
				$link = $data->getElementsByTagName("link")->item(0)->nodeValue;
				echo "<tr><td>$title</td><td><a href=".$link.">$link</td></tr>";
			}
		?>
		</table>
		
		<h1> Horror Movie Podcast episodes - External RSS feed </h1>
		
		<table class="table table-dark">
		<?php
			$domOBJ2 = new DOMDocument();
			$domOBJ2->load("http://feeds.feedburner.com/horrormoviepodcast");
	
			$content = $domOBJ2 -> getElementsByTagName("item");
			
			foreach($content as $data){
				$title = $data->getElementsByTagName("title")->item(0)->nodeValue;
				$link = $data->getElementsByTagName("link")->item(0)->nodeValue;
				echo "<tr><td>$title</td><td><a href=".$link.">$link</td></tr>";
			}
		?>
		</table>
		
		<!-- Footer -->
		<div class="footer fixed-bottom text-center">
			<div class="container bg-secondary text-white">Copyright &copy; Your Website</div>
		</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>