<?php 
	$section = "search";
	include("./lib/inc/header.php");
	$category = $_GET['searchCategory'];
	$name = $_GET['searchName'];
	$description = $_GET['searchDescrip'];
	$price = $_GET['filterPrice'];
	
	try {
		$sth = $conn->prepare("SELECT DISTINCT category FROM PetProducts");
    $sth->execute();
    $categories = $sth->fetchAll(PDO::FETCH_ASSOC);   
	} catch(PDOException $e) {  // catches exceptions (unsuccessful)
	   echo "Connection failed: " . $e->getMessage();
	}
	
 	if (isset($_GET['submit']) && !empty($category) && !empty($name)) {
  	try {
	    $query = "";
	   	$isEmpty = false;

	   	//checks for products with low price range
	   	if ($price == "low") {
	   		$query = "SELECT * FROM PetProducts WHERE category = '{$category}' AND name LIKE '%{$name}%' AND description LIKE '%{$description}%' AND price BETWEEN 8 AND 16";
	   	} elseif ($price == "medium") { //checks for products with medium price range
	   		$query = "SELECT * FROM PetProducts WHERE category = '{$category}' AND name LIKE '%{$name}%' AND description LIKE '%{$description}%' AND price BETWEEN 20 AND 25";
	   	} elseif ($price == "high") { //checks for products with high price range
	   		$query = "SELECT * FROM PetProducts WHERE category = '{$category}' AND name LIKE '%{$name}%' AND description LIKE '%{$description}%' AND price BETWEEN 30 AND 40";
	   	}

	    
	    // using prepare(protects from SQL injections) to build select statement so it can occur multiple times
	    $sth = $conn->prepare($query);
	    // execute runs prepared statement, but doesn't actually return data
	    $sth->execute();
	    // fetch returns the data
	    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {  // catches exceptions (unsuccessful)
		   echo "Connection failed: " . $e->getMessage();
		}
  } else{  //show PetProducts that match the user input
  	$isEmpty = true;
  }

?>

<h1>Search For Item</h1>
<form id="searchItemForm" action="search.php" method="GET">
	<div>
		<label for="search">Search Category</label>
		<!-- create select dropdown with mysql data -->
		<select id='searchCategory' name='searchCategory'>
			<?php foreach($categories as $category): ?>
				<!-- add selected to option to show it in dropdown -->
				<option <?= ($category == $category['category'] ?'selected' : '') ?> value='<?= $category['category'] ?>'>
				<?= $category['category'] ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div>
		<label for="searchName">Search Name: </label>
		<input type="text" id="searchName" name="searchName">
	</div>
	<div>
		<label for="searchDescrip">Search Description: </label>
		<input type="text" id="searchDescrip" name="searchDescrip">
	</div>
	<div>
	<div>
		<label for="filterPrice">Select Price:</label>
		<select name="filterPrice">
			<option value="low">$8 - $16</option>
			<option value="medium">$20 - $25</option>
			<option value="high">$30 - $40</option>
		</select>
	</div>
		<input type="submit" name="submit" value="Submit">
	</div>
</form>
<div class="new">

	<?php foreach($products as $product): ?>
		<figure class="figures">
			<a href='productDetails.php?productId=<?= $product['productId'] ?>'><img src= '.<?= $product['image'] ?>' alt="product pic">	</a>
			<figcaption>
				<p class="productName"><?= $product['name'] ?></p>
				<p><?= $product['description'] ?></p>
				<p>$<?= $product['price'] ?></p>
			</figcaption>
		</figure>
  <?php endforeach; ?>
</div>

<?php include("./lib/inc/footer.php"); ?>