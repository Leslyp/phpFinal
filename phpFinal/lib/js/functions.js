// toggle = switching from one thing to another
// function to show/hide dropdown in mobile
function toggleMobileDropdown() {
  var myNavBar = document.getElementById("myNavBar"); //calling id in ul 
  if (myNavBar.className === "nav-bar") {  // when dropdown isn't showing
      myNavBar.className += " dropdown";  // add dropdown class to display dropdown
  } else { // means dropdown is showing
      myNavBar.className = "nav-bar";  // then remove dropdown class
  }
} 

// function to add an item to the cart
function addItemToCart() {
	alert("Added item(s) to cart");
	document.getElementById("purchaseItem").submit(); 
} 



