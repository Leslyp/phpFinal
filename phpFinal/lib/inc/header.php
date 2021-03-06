<?php 
	session_start(); //  creates a session / resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.

	// initialize cart variable so there is no undefined index error
	$_SESSION['cart'] = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
	
	// Bootstrap files handle all the dynamic requests coming to a server / loads project enviroment
	require("./lib/inc/bootstrap.php"); 

	// set the default timezone to use. Available since PHP 5.1
	date_default_timezone_set('UTC');
  $sum = 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Specifies the character encoding for the HTML document -->
		<!-- UTF-8 = Character encoding for Unicode -->
		<meta charset="utf-8">
		<!-- keep smaller view ports from scaling the page -->
		<meta name="viewport" content="width=device-width" />
		<title>PHP Final Project</title>
		<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="lib/css/php.css?v=<?php echo time(); ?>">
		<!-- add favicon to tab -->
		<link rel="icon" href="./lib/img/favicon.ico">

		<!-- jquery validation plugin -->
		<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
		<script src="lib/js/form-validation.js?v=<?php echo time(); ?>"></script>

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
