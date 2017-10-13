<?php
	class Database
	{
		// static means you will only have 1 instance of it in the entire program
		private static $connection;
		
		// get_connection function that creates new instance of connection if not set
		// protected means it can be accessed by the same class that declared it / classes that inherit the declared class
		protected function get_connection(){
			if(!isset(static::$connection)){
				static::$connection = new PDO(
			  	"mysql:host=localhost;dbname=lperez_Challenges", "r2hstudent", "SbFaGzNgGIE8kfP"
				);
			} 
			return static::$connection;
		}

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