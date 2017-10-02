<?php include("./lib/inc/header.php"); 
	$productId = $_GET['productId'];
		try {
	    // using prepare(protects from SQL injections) to build select statement so it can occur multiple times
	    $sth = $conn->prepare("SELECT * FROM PetProducts WHERE productId = '{$productId}'");
	    // execute runs prepared statement, but doesn't actually return data
	    $sth->execute();
	    // fetch returns the data
	    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {  // catches exceptions (unsuccessful)
		   echo "Connection failed: " . $e->getMessage();
	}

?>

<header>
	<h1>Product Details</h1>
</header>
	<div class="detailsContainer">
		<?php foreach($products as $product): ?>
			<figure class="selectedItem">
				<img src= '.<?= $product['image'] ?>' alt="product pic">	
				<figcaption>
					<p class="productName"><?= $product['name'] ?></p>
					<p><?= $product['description'] ?></p>
					<p>Color: <?= $product['color'] ?></p>
					<p>Price: $<?= $product['price'] ?></p>
				</figcaption>
			</figure>
			<button type="text" id="addBtn" onClick="addItemToCart()">push me</button> 

			<form id="purchaseItem"  onSubmit="return addItemToCart()" action="#" method="GET">
				<label for="purchaseNumber">Number of products you want to purchase:</label>
				<input type="text" name="purchaseNumber" id="purchaseNumber">

<!-- 				<button type="submit" id="addBtn" onClick="addItemToCart()">Add to Cart</button> 
 -->			</form>
    <?php endforeach; ?>
  </div>	 	
<?php include("./lib/inc/footer.php"); ?>
