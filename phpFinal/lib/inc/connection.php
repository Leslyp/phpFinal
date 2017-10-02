<?php
	try {
		// connecting to mysql database, use hardcoded vars, use default to limit database access
	  $conn = new PDO("mysql:dbname=Challenges;host=localhost;port=8888", "default", "eB0pBlUcnSZNpdNh");
	} catch(PDOException $e) {  // catches exceptions (unsuccessful)
	   echo "Connection failed: " . $e->getMessage();
	}
?>