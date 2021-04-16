<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	$result = json_decode(getMostRecentElectricImpData());
	$mostRecent = count($result) -1;
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Horror Movie Database</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body style="height:100%;">
		<div class="bg-secondary">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="HorrorMovieDatabase.php">Return Home<span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1>Electric Imp Data</h1>
				<p> Euan Kelly </p>
			</div>
		</div>
		
		<div class="card-group">
			<div class="card">
				<img src="https://png.pngtree.com/svg/20160128/temperature_sensor_453524.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">External Temperature</h5>
					<?php
					for ($i = 0; $i < count($result); $i++){
						echo "<h5 class =\"card-title\">".$result[$i] -> external_temperature."</h5>";
					}
					?>
				</div>
			</div>
			<div class="card">
				<img src="https://png.pngtree.com/svg/20160128/temperature_sensor_453524.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Internal Temperature</h5>
					<?php
					for ($i = 0; $i < count($result); $i++){
						echo "<h5 class =\"card-title\">".$result[$i] -> internal_temperature."</h5>";
					}
					?>
				</div>
			</div>
			<div class="card">
				<img src="https://img.icons8.com/pastel-glyph/2x/electricity.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Voltage</h5>
					<?php
					for ($i = 0; $i < count($result); $i++){
						echo "<h5 class =\"card-title\">".$result[$i] -> voltage."</h5>";
					}
					?>
				</div>
			</div>
			<div class="card">
				<img src="https://i.pinimg.com/originals/07/f4/55/07f455db8d1281b81ecd499d7e091337.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Light Level</h5>
					<?php
					for ($i = 0; $i < count($result); $i++){
						echo "<h5 class =\"card-title\">".$result[$i] -> light_level."</h5>";
					}
					?>
				</div>
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