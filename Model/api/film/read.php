<?php

	//header("Access-Control-Allow-Origin: *");
	//header("Content-Type: application/json; charset=UTF-8");
	
	include_once '../objects/film.php';
	$films = json_decode(getAllFilms());
	$films_array = array();
	if(count($films)>0){
		for ($i = 0; $i < count($films);$i++){
		
			$film_item=array(
				"id" => $films[$i] -> f_id,
				"title" => $films[$i] -> f_title,
				"desc" => $films[$i] -> f_desc,
				"pic" => $films[$i] -> f_pic,
				"director" => $films[$i] -> f_pic,
				"date" => $films[$i] -> f_date
			);
			
			array_push($films_array, $film_item);
		}
		http_response_code(200);
		echo json_encode($films_array);
	} else {
		echo "No Results Found";
	}
?>