<?php
	session_start();

	// this file takes care of adding purchase number to array, so that it won't change everytime page is refreshed
	if (isset($_POST['purchaseNumber'])) { 
		$purchaseNumber = $_POST['purchaseNumber'];
		$_SESSION['cart'][] = $purchaseNumber;
	} 

	// takes me back to products page 
	header("Location: products.php");
?>