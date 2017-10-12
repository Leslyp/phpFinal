<?php
  // section variable lets us find which page is selected to show that it's selected on nav
	$section = "products"; 
	include("./lib/inc/header.php");
	$productId = $_GET['productId'];
	$products = PetProducts::get_products_by_id($productId);
?>

<main>
	<h1>Product Details</h1>
	<div class="detailsContainer">
		<?php foreach($products as $product): ?>
			<figure class="selectedItem">
				<!-- pass id as img attr so it knows which product details pg to go to -->
				<img src= '.<?= $product['image'] ?>' alt="product pic">	
				<figcaption>
					<p class="productName"><?= $product['name'] ?></p>
					<p><?= $product['description'] ?></p>
					<p>Color: <?= $product['color'] ?></p>
					<p>Price: $<?= $product['price'] ?></p>
				</figcaption>
			</figure>
			<!-- form to let user select quantity of items they want -->
			<form id="purchaseItem" action="products.php" method="GET">
				<label for="purchaseNumber">Number of products you want to purchase:</label>
				<select name="purchaseNumber" id="purchaseNumber">
					<option name="purchaseNumber" value="1">1</option>
					<option name="purchaseNumber" value="2">2</option>
					<option name="purchaseNumber" value="3">3</option>
					<option name="purchaseNumber" value="4">4</option>
					<option name="purchaseNumber" value="5">5</option>
				</select> 
				<div class="submitBtn">
					<!-- onclick call js function to alert user -->
					<button type="submit" onClick="addItemToCart()" id="addBtn" value="Add to Cart">Add to Cart</button> 
				</div>
			</form>
	  <?php endforeach; ?>
	</div>	 	
</main>

<?php include("./lib/inc/footer.php"); ?>
