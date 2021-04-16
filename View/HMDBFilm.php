<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	$film_id = $_GET['id'];
	
	$resultJSON = getFilm($film_id);
	$result = json_decode($resultJSON);
	
	for ($i = 0; $i < count($result);$i++){
		$f_title = $result[$i]->f_title;
		$f_director = $result[$i]->f_dir;
		$f_picture = $result[$i]->f_pic;
		$f_date = $result[$i]->f_date;
	}
	
	$pic_result = json_decode(getPictures($film_id));
	
	$art_result = json_decode(getArticlesFromFilm($film_id));
	
	$dir_result = json_decode(getDirector($f_director));
	
	$roles_result = json_decode(getRolesFromFilm($film_id));
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>HMDB - <?php echo $f_title ?></title>
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
				<h1><?php echo $f_title ?></h1>
				<a href="HMDBDirector.php?id=<?php echo $dir_result[0]->d_id?>"> <?php echo $dir_result[0]->d_forename." ".$dir_result[0]->d_surname ?> </a>
			</div>
		</div>
		<!-- Carousel -->
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<?php for ($i = 0; $i < count($pic_result);$i++){
					if ($i != 0){
						echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"".($i+1)."\"></li>";
					}
				}?>
			</ol>
			<div class="carousel-inner m-auto">
				<?php for ($i = 0; $i < count($pic_result);$i++){
					if ($i == 0){echo "<div class=\"carousel-item active\">";} else {echo "<div class=\"carousel-item\">";}
					echo "<img class=\"img-fluid d-block w-90 m-auto\" src=".$pic_result[$i]->p_src." alt=".$pic_result[$i]->p_caption." style=\"max-width:1080px;max-height:720px;\">";
					echo "<div class=\"carousel-caption d-none d-md-block\">";
						echo "<span class=\"bg-secondary p-1\">".$pic_result[$i]->p_caption."</span>";
					echo "</div>";
				echo "</div>";
				}
				?>
			</div>
			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			</div>
		</div>
		<!-- Cast List -->
		<div class="card-deck">
		
			<?php
				for ($i = 0; $i < count($roles_result);$i++){
					echo "<div class=\"col-3\">";
						echo "<div class=\"card\">";
							echo "<img class=\"card-img-top\" src=".getActorPicture($roles_result[$i]->r_actor).">";
							echo "<div class=\"card-body\">";
								echo "<h5 class=\"card-title\">".$roles_result[$i]->r_character."</h5>";
								echo "<a href=\"HMDBActor.php?id=".$roles_result[$i]->r_actor."\">".getActorName($roles_result[$i]->r_actor)."</a>";
							echo "</div>";
						echo"</div>";
					echo"</div>";
				}
			?>
			<!-- -->
			
			</div>
		
		<!-- Articles List -->
		<div class="card-deck">
		
			<?php
				for ($i = 0; $i < count($art_result);$i++){
					echo "<div class=\"col-3\">";
						echo "<div class=\"card\">";
							echo "<img class=\"card-img-top\" src=".$art_result[$i]->a_picture.">";
							echo "<div class=\"card-body\">";
								echo "<h5 class=\"card-title\">".$art_result[$i]->a_title."</h5>";
								echo "<a href=\"HMDBArticle.php?id=".$art_result[$i]->a_id."\"> Go to Article </a>";
							echo "</div>";
						echo"</div>";
					echo"</div>";
				}
			?>
			<!-- -->
			
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