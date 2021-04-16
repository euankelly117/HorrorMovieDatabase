<?php

include_once 'dbconnection.php';
			
			
			$Comment 			= $_POST['comment'];
			$Article 			= $_POST['article'];
			$User 				= $_COOKIE['hm_user'];
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
				header("Location:../View/HMDBArticle.php?id=".$Article);
			}
			
			if (strcmp($Password,$ConfirmPassword)!=0){
				header("Location:../View/HMDBArticle.php?id=".$Article);
			}
			
			$passwordHash = password_hash($Password, PASSWORD_DEFAULT);
			$query = $con->prepare("
			insert into hm_comments (c_user, c_article, c_content)
			VALUES (:user, :article, :content)
			");
			$success = $query->execute([
			'user' 	=> $User,
			'article' 	=> $Article,
			'content'	=> $Comment,
			]);
			header("Location:../View/HMDBArticle.php?id=".$Article); /* Redirect browser */
			exit();

?> 
<!DOCTYPE html >  
<head>          
    <title></title>
</head> 
<body> 
    
</body>
</html>