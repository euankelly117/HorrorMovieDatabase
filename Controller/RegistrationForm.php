<!DOCTYPE html>
<?php
	require '../Model/api.php';	
?>
<html style="height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>title</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://www.google.com/recaptcha/api.js?render=6LfFP7wUAAAAANhy8VEPhjdTpyWeauBQtTlCHnoa"></script>
		</head>
	<body style="height:100%;">
		<div class="bg-secondary h-100">
		<!-- Jumbotron -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1>Register your Account</h1>
				</div>
			</div>
			
		<!-- Form -->
		<div style = "width: 90%; display: block; margin: auto;">
			<form action="../Model/insert.php" method="post">
				<div class="form-group">
					<label for="Forename"> First Name </label>
					<input type="text" class="form-control" name="forename" placeholder="First Name" required>
					<label for="Surname"> Surname </label>
					<input type="text" class="form-control" name="surname" placeholder="Surname" required>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile Phone Number</label>
					<input type="tel" class="form-control" name="mobile" placeholder="Mobile Number" required>
					<label for="Email">Email address</label>
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email, or phone number, with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" minlength="8" required>
					<label for="confirmPassword">Confirm Password</label>
					<input type="Password" class="form-control" name="confirmPassword" placeholder="Confirm Password" minlength="8" required>
				</div>
				<div class="captcha_wrapper">
					<div class="g-recaptcha" data-sitekey="6LfFP7wUAAAAANhy8VEPhjdTpyWeauBQtTlCHnoa"></div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
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