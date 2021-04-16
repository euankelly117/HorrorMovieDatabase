<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	$Actor_id = $_GET['id'];
	$result = json_decode(getActor($Actor_id));
	for ($i = 0; $i < count($result);$i++){
		$a_name = $result[$i]->a_forename." ".$result[$i]->a_surname;
		$a_picture = $result[$i]->a_picture;
	}
	
	$films = json_decode(getFilmsByActor($Actor_id));
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $a_name ?></title>
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
					<h1><?php echo $a_name ?></h1>
					<img class="img-fluid" src="<?php echo $a_picture ?>">
				</div>
			</div>	

		<!-- Films -->
		<table class="table table-dark table-hover">
			<?php
				for ($i = 0; $i < count($films);$i++){
					
						echo "<tr>";
							echo "<td>";
									echo "<p>".$films[$i]->r_character."</p>";									
							echo"<td>";
							echo "<td>";									
									echo "<a href=\"HMDBFilm.php?id=".$films[$i]->r_film."\">".getFilmName($films[$i]->r_film)."</a>";
							echo"<td>";
						echo "</tr>";
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