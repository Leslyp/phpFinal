<?php 
	session_start(); //  creates a session / resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
	
	// Bootstrap files handle all the dynamic requests coming to a server / loads project enviroment
	require("./lib/inc/bootstrap.php"); 

	// if get variable is set, then store it in array
	if (isset($_GET['purchaseNumber'])) { 
		$purchaseNumber = $_GET['purchaseNumber'];
		$sum = 0;
		$_SESSION['cart'][] = $purchaseNumber;
	} 
 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="lib/css/php.css?v=<?php echo time(); ?>">

		<!-- jquery validation plugin -->
		<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
		<script src="lib/js/form-validation.js?v=<?php echo time(); ?>""></script>

		<script src="lib/js/functions.js?v=<?php echo time(); ?>"></script>

		<!-- fotorama slider-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
		<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
		
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
	      <!-- onClick calls js function when toggles dropdown  -->
	      <li class="home-icon"><a href="#" onClick="toggleMobileDropdown()">&#9776;</a></li> 
	  	</ul>
	  </nav>

	   <div id="cartIcon">
	  	<div id="cartQuantity">
	  		<?php foreach($_SESSION["cart"] as $value): ?>
	  			<!-- sum is constantly updated with the new value user selects from quantity -->
					<?php $sum += $value; ?>
				<?php endforeach; ?>
				<p><span id="cartText"><?= $sum ?> <?= ($sum > 1 || $sum == 0 ? 'Items' : 'Item') ?> &#x1f6d2;</span></p>
	  	</div>
	  </div>

	 

	 
	</header>



