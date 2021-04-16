<?php
			try{
				$host 		= 	'lochnagar.abertay.ac.uk';
				$dbname 	= 	'sql1505050';
				$username 	= 	'sql1505050';
				$password 	= 	'BtHm9qit9Hck';

				$con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
				
				
			} catch (PDOException $e) {
				
				die($e);
			}
?>