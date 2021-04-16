<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	$films = json_decode(getAllFilms());
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Horror Movie Database</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body style="height:100%;">
		<div class="bg-secondary">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="#week1">Week 1<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week2/HorrorMovieDatabase.php">Week 2<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week3/View/HorrorMovieDatabase.php">Week 3<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week4/View/HorrorMovieDatabase.php">Week 4<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week5/View/HorrorMovieDatabase.php">Week 5<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week6/View/HorrorMovieDatabase.php">Week 6<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week7/View/ElectricImp.php">Week 7 - 9<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week10/View/HMDBRSS.php">Week 10 - RSS Feed<span class="sr-only"></span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week11/Controller/RSSfeed.php">Week 11 - XSLT</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="https://mayar.abertay.ac.uk/~1505050/Week12/View/HMDBREST.php">Week 12 - REST<span class="sr-only">(current)</span></a>
		</li>
		<?php 
			if(!isset($_COOKIE['hm_user'])) {
				echo "<li class=\"nav-item active\">";
				echo "<a class=\"nav-link\" href=\"../Controller/Login.php\"> Log In </a>";
				echo "</li>";
				echo "<li class=\"nav-item active\">";
				echo "<a class=\"nav-link\" href=\"../Controller/RegistrationForm.php\"> Register </a>";
				echo "</li>";
			} else {
				echo "<li class=\"nav-item active\">";
				echo "<a class=\"nav-link\" href=\"../Model/logout.php\"> Log Out </a>";
				echo "</li>";
			}
		?>
    </ul>
  </div>
</nav>
		<!-- Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1>Horror Movies</h1>
				<p> Euan Kelly </p>
				<?php 
					if(!isset($_COOKIE['hm_user'])) {
						echo "You are not logged in, would you like to <a href=\"../Controller/Login\"> Log In </a> or <a href=\"../Controller/RegistrationForm\"> Register? </a>";
					} else {
						echo "Welcome Back, " . getUserName($_COOKIE[hm_user]);
					}
				?>
			</div>
		</div>
		<!-- Week4 -->
		<div id="week4" style="width: 90vw; margin: auto;">
			<!-- -->
			<div class="card-deck">
		
			<?php
				for ($i = 0; $i < count($films);$i++){
					
						echo "<div class=\"col-3\">";
							echo "<div class=\"card\">";
								echo "<img class=\"card-img-top\" src=".$films[$i] -> f_pic.">";
								echo "<div class=\"card-body\">";
									echo "<h5 class=\"card-title\">".$films[$i]->f_title."</h5>";
									echo "<p class=\"card-text font-italic\">".$films[$i]->f_desc."</p>";
									echo "<a href=\"HMDBFilm.php?id=".$films[$i]->f_id."\"> Go to Film </a>";
								echo "</div>";
							echo"</div>";
						echo "</div>";
				}
			?>
			<!-- -->
			
			</div>
		</div>
		
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