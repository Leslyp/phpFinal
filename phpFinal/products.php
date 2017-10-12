<?php 
	// section variable lets us find which page is selected to show that it's selected on nav
  $section = "products";
	include("./lib/inc/header.php");

	// add to all variables to get rid of undefined index error
	$search = !empty($_GET['search']) ? $_GET['search'] : '';

	// calling method in pet products class to return results
	$categories = PetProducts::get_all_categories();
  
  if (empty($search) || $search == "Browse All") { // show all products
  	$products = PetProducts::get_all_products();
  } else {  //show products that match the user color selected
  	$products = PetProducts::get_products_by_category($search);
  }

?>


<main class="tableContainer">
	<h1>Products</h1>
	<div class="formContainer">
		<form id="searchForm" method="GET" action="products.php">
			<label for="search">Categories</label>
			<!-- create select dropdown with mysql data -->
			<select id='search' name='search' onChange=>
			<option>Browse All</option>
				<?php foreach($categories as $category): ?>
					<!-- add selected to option to show it in dropdown -->
					<option <?= ($search == $category['category'] ?'selected' : '') ?> value='<?= $category['category'] ?>'>
					<?= $category['category'] ?>
					</option>
				<?php endforeach; ?>
			</select>
			<div class="submitBtn">
				<button type='submit'>Submit</button>
			</div>
		</form>
	</div>
  <div class="new">
		<?php foreach($products as $product): ?>
			<figure class="figures">
				<a href='productDetails.php?productId=<?= $product['productId'] ?>'><img src= '.<?= $product['image'] ?>' alt="product pic"></a>
				<figcaption>
					<p class="productName"><?= $product['name'] ?></p>
					<p><?= $product['description'] ?></p>
					<p>$<?= $product['price'] ?></p>
				</figcaption>
			</figure>
    <?php endforeach; ?>
  </div>
</main>
<?php include("./lib/inc/footer.php"); ?>

