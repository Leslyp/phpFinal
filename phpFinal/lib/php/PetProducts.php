<?php
	class PetProducts
	{
	  // class properties do not need an initial value
	  // keyword public allows you to reference these in & out of the class
		public $selectAll = "SELECT * FROM PetProducts";
		public $selectDistinct = "SELECT DISTINCT category FROM PetProducts";
		public $selectByCategory = "SELECT * FROM PetProducts WHERE category = '{$search}'";
		public $selectById = "SELECT * FROM PetProducts WHERE productId = '{$productId}'");
		public $selectBySearch = "SELECT * FROM PetProducts WHERE category = '{$category}' AND name LIKE '%{$name}%' AND description LIKE '%{$description}%'";
	}
?> 