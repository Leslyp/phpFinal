<?php
	//session_start(); // you are telling PHP that you want to use the session
	include("./lib/inc/header.php");
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
			<!-- <button type="text" id="addBtn" onClick="addItemToCart()">push me</button>  -->

			<form id="purchaseItem" action="products.php" method="GET">
				<label for="purchaseNumber">Number of products you want to purchase:</label>
				<select name="purchaseNumber" id="purchaseNumber">
					<option name="purchaseNumber" value="1">1</option>
					<option name="purchaseNumber" value="2">2</option>
					<option name="purchaseNumber" value="3">3</option>
					<option name="purchaseNumber" value="4">4</option>
					<option name="purchaseNumber" value="5">5</option>
				</select> 
				<div>
					<input type="button" onClick="addItemToCart()" id="addBtn" value="Add to Cart"> 
				</div>
			</form>
    <?php endforeach; ?>
  </div>	 	
<?php include("./lib/inc/footer.php"); ?>
