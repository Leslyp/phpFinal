<?php 
	session_start(); //  creates a session / resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
	require("./lib/inc/connection.php"); 

	if (isset($_GET['purchaseNumber'])) { // if get variable is set, then store it in array
		$purchaseNumber = $_GET['purchaseNumber'];
		$sum = 0;
		$_SESSION['cart'][] = $purchaseNumber;
	} else {
		$_SESSION['cart'][] = 0;
	}
 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="lib/css/php.css?v=<?php echo time(); ?>">
		<script src="lib/js/functions.js?v=<?php echo time(); ?>"></script>

		<!--put fonts in head so they load before js--> 
	</head>
	<body>
		<header>
		<nav>
	   	 <!-- id is used for dropdown class in media query -->
	   	<ul id="myNavBar" class="nav-bar">
	   		<li id="logo"><a href="index.php">The Dog Shop</a></li>
	      <li><a href="index.php" class="<?php if ($section == "home") {echo "selected";} ?>">Home</a></li>
	      <li><a href="products.php" class="<?php if ($section == "products") {echo "selected";} ?>">Products</a></li>
	      <li><a href="search.php" class="<?php if ($section == "search") {echo "selected";} ?>">Search</a></li>
	      <li><a href="contact.php" class="<?php if ($section == "contact") {echo "selected";} ?>">Contact</a></li> 
	      <!-- "trigram for heaven" - hamburger icon -->
	      <!-- onClick calls js function when clicked, shows/ hides dropdown  -->
	      <li class="home-icon"><a href="#" onClick="toggleMobileDropdown()">&#9776;</a></li> 
	  	</ul>
	  </nav>
	  <div id="cartIcon">
	  	<p>&#x1f6d2;</p>
	  	<div id="cartQuantity">
	  		<?php foreach($_SESSION["cart"] as $value): ?>
					<?php $sum += $value; ?>
				<?php endforeach; ?>
				<p><?= $sum ?> <?= ($sum > 1 ? 'Items' : 'Item') ?></p>
	  	</div>
	  	
	  </div>
	</header>



