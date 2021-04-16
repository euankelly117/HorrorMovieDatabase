<?php
class film{

	include "../../api";

	private $table_name = "hm_films";

	public $id;
	public $title;
	public $date;
	public $desc;
	public $pic;
	public $director;

	public function __construct(){
		
	}
}
?>
