<?php 
  // section variable lets us find which page is selected to show that it's selected on nav
	$section = "search";
	include("./lib/inc/header.php");

	$price = !empty($_GET['filterPrice']) ? $_GET['filterPrice'] : '';
	$term = !empty($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

	// fetch all categories to form select dropdown
	$categories = PetProducts::get_all_categories();

	if (isset($_GET['submit'])) {  
		// use switch statement to check price value to know which select function to execute 
		switch ($price) {
			case 'low':
				$products = PetProducts::get_products_by_search_low($term);
				break;
			case 'medium':
				$products = PetProducts::get_products_by_search_medium($term);
				break;
			case 'high':
				$products = PetProducts::get_products_by_search_high($term);
				break;
			default:
				$products = PetProducts::get_products_by_search_all($term);
				break;
		}
	} 

?>

<main>
	<h1>Search For Item</h1>
	<form id="searchItemForm" action="search.php" method="GET">
		<div>
			<label for="searchTerm">&#128269; </label>
			<input type="text" id="searchTerm" name="searchTerm" placeholder="Search For Product..." value="<?php echo htmlspecialchars($term); ?>">
		</div>
		<div>
			<label for="filterPrice">Select Price</label>
			<select id="filterPrice" name="filterPrice">
				<option <?= ($price == "all" ?'selected' : '') ?> value="all">Browse All Prices</option>
				<option <?= ($price == "low" ?'selected' : '') ?> value="low">$8 - $16</option>
				<option <?= ($price == "medium" ?'selected' : '') ?> value="medium">$20 - $25</option>
				<option <?= ($price == "high" ?'selected' : '') ?> value="high">$30 - $40</option>
			</select>
		</div>
		<div class="submitBtn">
			<button type="submit" name="submit" value="Submit">Submit</button> 
		</div>
	</form>
	<div class="new">
		<!-- use if statement to show products if there are any -->
		<?php if (isset($_GET['submit']) && !empty($products)): ?>
		<?php foreach($products as $product): ?>
			<figure class="figures">
				<a href='productDetails.php?productId=<?= $product['productId'] ?>'>
					<img src= '.<?= $product['image'] ?>' alt="product pic">
				</a>
				<figcaption>
					<p class="productName"><?= $product['name'] ?></p>
					<p><?= $product['description'] ?></p>
					<p>$<?= $product['price'] ?></p>
				</figcaption>
			</figure>
	  <?php endforeach; ?>
		<?php endif; ?>
		<!-- use if statement to show error message if there aren't any products -->
		<?php if (isset($_GET['submit']) && empty($products)): ?>
	  <p id="noResults"><?= 'No results found, please enter another term.'; ?></p>
		<?php endif; ?>
	</div>
</main>

<?php include("./lib/inc/footer.php"); ?>