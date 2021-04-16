<?php
	// Connect to database
	require "dbconnection.php";

	function getAllFilms(){
		$queryText = "select * from hm_films;";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getFilm($id){
		$queryText = "select * from hm_films where f_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getFilmName($id){
		$queryText = "select * from hm_films where f_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result[0]['f_title'];
	}
	
	function getFilmsByDirector($id){
		$queryText = "select * from hm_films where f_dir = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function insertNewFilm($title, $date, $desc, $pic, $dir){
		$sql = "INSERT INTO hm_films (f_title, $f_date, $f_desc, $f_pic, $f_dir)
				VALUES ('".$title."', '".$date."', '".$desc."', '".$pic."', '".$dir."')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	function getPictures($id){
		$queryText = "select * from hm_pictures where p_f_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getArticle($id){
		$queryText = "select * from hm_articles where a_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getArticlesFromFilm($id){
		$queryText = "select * from hm_articles where a_f_id = '".$id."' OR a_f_id_2 = '".$id."' ;";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getAllArticles(){
		$queryText = "select * from hm_articles;";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getPassword($email) {
		$queryText = "select * from hm_users where u_email = '".$email."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		for ($i = 0; $i < count($result);$i++){
			$password = $result[$i]['u_password'];
		}
		return $password;
	}
	
	function getName($email) {
		$queryText = "select * from hm_users where u_email = '".$email."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		for ($i = 0; $i < count($result);$i++){
			$name = $result[$i]['u_firstname']." ".$result[$i]['u_surname'];
		}
		return $name;
	}
	
	function getDirector($id) {
		$queryText = "select * from hm_directors where d_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getActor($id) {
		$queryText = "select * from hm_actors where a_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getRolesFromFilm($id){
		$queryText = "select * from hm_roles where r_film = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getActorName($id){
		$queryText = "select * from hm_actors where a_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result[0]['a_forename']." ".$result[0]['a_surname'];
	}
	
	function getActorPicture($id){
		$queryText = "select * from hm_actors where a_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result[0]['a_picture'];
	}
	
	function getFilmsByActor($id){
		$queryText = "select * from hm_roles where r_actor = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode( $result);
	}
	function getUserName($id){
		$queryText = "select * from hm_users where u_id = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result[0]['u_firstname']." ".$result[0]['u_surname'];
	}
	
	function getUserIDFromEmail($email){
		$queryText = "select * from hm_users where u_email = '".$email."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result[0]['u_id'];
	}
	
	function getCommentsByArticle($id){
		$queryText = "select * from hm_comments where c_article = '".$id."';";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
	
	function getMostRecentElectricImpData(){
		$queryText = "select * from electricImp;";
		global $con;
		$query = $con->query("$queryText");
		$result = $query->fetchALL(PDO::FETCH_ASSOC);		
		return json_encode($result);
	}
?>