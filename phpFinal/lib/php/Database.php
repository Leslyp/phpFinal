<?php
	class Database
	{
		// static means you will only have 1 instance of it in the entire program
		private static $connection;
		
		// get_connection function that creates new instance of connection if not set
		// protected means it can be accessed by the same class that declared it / classes that inherit the declared class
		protected function get_connection(){
			// echo $_SERVER['HTTP_HOST'];
			// echo $_SERVER['REQUEST_URI'];
			// var_dump($_SERVER);
			if(!isset(static::$connection)){
				// if ($this->local_host()) {
				// 	$dbname = "Challenges";
				// 	$username = "default";
				// 	$password = "eB0pBlUcnSZNpdNh";
				// 	$port = 8888;
				// }
				static::$connection = new PDO(
			  	"mysql:host=localhost;dbname=lperez_Challenges", "r2hstudent", "SbFaGzNgGIE8kfP"
					// "mysql:dbname=Challenges;host=localhost;port=8888",
				 // 	"default",
				 //  "eB0pBlUcnSZNpdNh"
				);
			} 
			return static::$connection;
		}

		// protected function local_host()
		// {
		// 	$serverHost = $_SERVER['HTTP_HOST'];
		// 	if ($serverHost == "localhost:8888") {
		// 		return true;
		// 	} 
		// } 

		// fetch _all function that takes 2 params to prepare query and bind params
	  public function fetch_all($query, $boundParameters = [])
	  {
	  	try {
	  		$sth = $this->get_connection()->prepare($query);
		  	$sth->execute($boundParameters);
		  	$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	  	} catch(PDOException $e) {  // catches exceptions (unsuccessful)
			   echo "Connection failed: " . $e->getMessage();
			}
	  	return $results;
	  }	 
	}
 
?>