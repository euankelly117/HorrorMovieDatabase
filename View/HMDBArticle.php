<!DOCTYPE html>
<?php
	require '../Model/api.php';	
	$Article_id = $_GET['id'];
	$result = json_decode(getArticle($Article_id));
	for ($i = 0; $i < count($result);$i++){
		$a_title = $result[$i]->a_title;
		$a_picture = $result[$i]->a_picture;
		$a_content = $result[$i]->a_content;
	}
	
	$com_result = json_decode(getCommentsByArticle($Article_id));
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>title</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body style="height:100%;">
		<div class="bg-secondary" style="height:100%">
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
					<h1><?php echo $a_title ?></h1>
				</div>
			</div>
			
			<img src="<?php echo $a_picture ?>" style="margin: auto;">
			
			<p> <?php echo $a_content ?> </p>
			
			<?php 
				if(isset($_COOKIE['hm_user'])) {
					echo "<form action=\"../Model/commentinsert.php\" method=\"POST\">";
					echo "<textarea rows=\"4\" cols=\"50\" name=\"comment\"> Post a Comment? </textarea>";
					echo "<input type=\"hidden\" name=\"article\" value=\"$Article_id\" />";
					echo "<br>";
					echo "<input type=\"submit\">";
					echo "</form>";
				}
			?>
			</br>
			<table class="table table-dark table-hover">
			<?php
				for ($i=0;$i<count($com_result);$i++){
					echo "<tr>";
							echo "<td>";
									echo "<p>".$com_result[$i]->c_date."</p>";									
							echo"<td>";
							echo "<td>";									
									echo "<p>".getUserName($com_result[$i]->c_user)."</a>";
							echo"<td>";
							echo "<td>";									
									echo "<p>".$com_result[$i]->c_content."</a>";
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