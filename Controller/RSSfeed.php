<?php
	
	require '../Model/api.php';	
	
	$result = json_decode(getAllArticles());
	header('Content-type: text/xml');
	
	
	echo "<?xml version='1.0' encoding='UTF-8'?>";
	echo "<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>\n";
	echo "<channel>\n";

	echo "<title>Demo RSS Feed</title>\n";
	echo "<description>RSS Description</description>\n";

	for($i=0;$i<count($result);$i++){
		
		echo "<item>\n";
		echo "<title>".$result[$i]->a_title."</title>\n";
		echo "<link>https://mayar.abertay.ac.uk/~1505050/Week10/View/HMDBArticle.php?id=".$result[$i]->a_id."</link>\n";
		echo "</item>\n";
	}
	
	echo "</channel>\n";
	echo "</rss>\n";
	
?>