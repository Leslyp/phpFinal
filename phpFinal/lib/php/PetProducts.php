<?php

	class PetProducts
	{
		// function to get all distinct categories to form dropdown
		public static function get_all_categories(){
			// create a new instance of the database class
			$db = new Database();
			return $db->fetch_all("SELECT DISTINCT category FROM PetProducts");
		}

		// function to get all products on products page
		public static function get_all_products(){
			// create a new instance of the database class
			$db = new Database();
			return $db->fetch_all("SELECT * FROM PetProducts");
		}

		// function to filter products based on the users category choice
		public static function get_products_by_category($category){
			// create a new instance of the database class
			$db = new Database();
			// Binds a parameter to the specified variable name
			$boundParameters = array(
				":category" => $category
			);
			return $db->fetch_all("SELECT * FROM PetProducts WHERE category = :category", $boundParameters);
		}

		// function to go to specific products details page based on img clicked 
		public static function get_products_by_id($productId){
			// create a new instance of the database class
			$db = new Database();
			// bind params and store in an array to execute later
			$boundParameters = array(
				":productId" => $productId
			);
			return $db->fetch_all("SELECT * FROM PetProducts WHERE productId = :productId", $boundParameters);
		}

 		// function to search for products in low price range
		public static function get_products_by_search_low($term){
			$db = new Database();
			$boundParameters = array(
				":term" => '%' .$term. '%',
			);
   		return $db->fetch_all("SELECT * FROM PetProducts WHERE price BETWEEN 8 AND 16 AND (category LIKE :term OR name LIKE :term OR description LIKE :term OR color LIKE :term)", $boundParameters);
		}

 		// function to search for products in medium price range
		public static function get_products_by_search_medium($term){
			$db = new Database();
			$boundParameters = array(
				":term" => '%' .$term. '%',
			);
   		return $db->fetch_all("SELECT * FROM PetProducts WHERE price BETWEEN 20 AND 25 AND (category LIKE :term OR name LIKE :term OR description LIKE :term OR color LIKE :term)", $boundParameters);
		}

	 	// function to search for products in high price range
		public static function get_products_by_search_high($term){
			$db = new Database();
			$boundParameters = array(
				":term" => '%' .$term. '%',
			);
   		return $db->fetch_all("SELECT * FROM PetProducts WHERE price BETWEEN 30 AND 40 AND (category LIKE :term OR name LIKE :term OR description LIKE :term OR color LIKE :term)", $boundParameters);
		}

		// function to search for products in all price ranges
		public static function get_products_by_search_all($term){
			$db = new Database();
			$boundParameters = array(
				":term" => '%' .$term. '%',
			);
   		return $db->fetch_all("SELECT * FROM PetProducts WHERE price BETWEEN 0 AND 40 AND (category LIKE :term OR name LIKE :term OR description LIKE :term OR color LIKE :term) ", $boundParameters);
		}

		// function to get featured products for slider
		public static function get_featured_products(){
			$db = new Database();
   		return $db->fetch_all("SELECT * FROM PetProducts WHERE featuredItems = 'Featured'");
		}
	}

?> 