<?php
	class Database
	{
	  

		// Methods go here
	  public static function prepareQuery()
	  {
	    return $conn->prepare($query);
	  }

	  public static function executeQuery()
	  {
	    return  $sth->execute();
	  }

	  public static function fetchAll()
	  {
	    return  $sth->fetchAll(PDO::FETCH_ASSOC);
	  }	 

	  // public static function prepareQuery()
	  // {
	  // 	$variabl;
	  // 	$variabl =  $conn->prepare($query2);
	  //  							$sth->execute();
	  //     					$categories = $sth->fetchAll(PDO::FETCH_ASSOC);
	  // }	
	}
 
?>