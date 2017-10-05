<?php	$section = "products"; ?>
<?php 
	include("./lib/inc/header.php");
	$search = $_GET['search'];
	try {
    // use distinct to eliminate repeated values
    $sth = $conn->prepare("SELECT DISTINCT category FROM PetProducts");
    $sth->execute();
    $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
    $query = "";
    // show all products
    if (empty($search) || $search == "Browse All") {
    	$query = "SELECT * FROM PetProducts";
    } else{  //show PetProducts that match the user color selected
    	$query = "SELECT * FROM PetProducts WHERE category = '{$search}'";
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


?>
	<header>
		<h1>Products</h1>
	</header>
	<main class="tableContainer">
		<div class="formContainer">
			<form id="searchForm" method="GET" action="products.php">
				<label for="search">Browse Products</label>
				<!-- create select dropdown with mysql data -->
				<select id='search' name='search'>
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
					<a href='productDetails.php?productId=<?= $product['productId'] ?>'><img src= '.<?= $product['image'] ?>' alt="product pic">	</a>
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

