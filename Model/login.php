<?php

include_once 'dbconnection.php';
include_once 'api.php';
			
			$Email 				= $_POST['email'];
			$Password 			= $_POST['password'];
			$passwordHash   	= password_hash($Password, PASSWORD_DEFAULT);
			$actualPassword = getPassword($Email);
			$actualPassword = password_hash($actualPassword, PASSWORD_DEFAULT, $options);
			$name = getName($Email);
			echo $actualPassword;
			echo $name;
			if (strcmp($Password,$actualPassword)!=0){
				header("Location:../View/HorrorMovieDatabase.php");
			}
			
			setcookie("hm_user", getUserIDFromEmail($Email), time() + (86400 * 30), "/");
			
			header("Location:../View/HorrorMovieDatabase.php"); /* Redirect browser */
			exit();

?> 
<!DOCTYPE html >  
<head>          
    <title></title>
</head> 
<body> 
    
</body>
</html>