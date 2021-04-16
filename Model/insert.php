<?php

include_once 'dbconnection.php';
			
			
			$F_Name 			= $_POST['forename'];
			$L_Name 			= $_POST['surname'];
			$Email 				= $_POST['email'];
			$Mobile 			= $_POST['mobile'];
			$Password 			= $_POST['password'];
			$ConfirmPassword 	= $_POST['confirmPassword'];
			$response = $_POST["g-recaptcha-response"];
			
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array(
				'secret' => 'YOUR_SECRET',
				'response' => $_POST["g-recaptcha-response"]
			);
			$options = array(
				'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$verify = file_get_contents($url, false, $context);
			$captcha_success=json_decode($verify);
			if ($captcha_success->success==false) {
				header("Location:../View/HorrorMovieDatabase.php");
			}
			
			if (strcmp($Password,$ConfirmPassword)!=0){
				header("Location:../View/HorrorMovieDatabase.php");
			}
			
			$passwordHash = password_hash($Password, PASSWORD_DEFAULT);
			$query = $con->prepare("
			insert into hm_users (u_firstname, u_surname, u_mobile, u_email, u_password)
			VALUES (:fname, :lname, :mobile, :email, :password)
			");
			$success = $query->execute([
			'fname' 	=> $F_Name,
			'lname' 	=> $L_Name,
			'mobile'	=> $Mobile,
			'email' 	=> $Email,
			'password' 	=> $passwordHash,
			]);
			header("Location:../Controller/Login.php"); /* Redirect browser */
			exit();

?> 
<!DOCTYPE html >  
<head>          
    <title></title>
</head> 
<body> 
    
</body>
</html>