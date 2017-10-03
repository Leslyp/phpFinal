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
function addItemToCart(event) {
		 //event.preventDefault();
		 alert("Added item(s) to cart");
		 document.getElementById("purchaseItem").submit(); 

		// console.log("got into addItemToCart", event);

  //   var addBtn = document.getElementById("addBtn"); 
  //   var cartQuantity = document.getElementById("cartQuantity").innerHTML;
  //   console.log("test1: ",cartQuantity); 
  //   var inputQuantity = document.getElementById("purchaseNumber").innerHTML; 
  //   console.log("test2: ",inputQuantity); 

  //   cartQuantity = parseInt(cartQuantity);
  //  	inputQuantity = parseInt(inputQuantity); 
  //   console.log("before: ",cartQuantity);
  //   console.log("before: ",inputQuantity);

  //   if (addBtn) {  // when btn is pushed
  //    	cartQuantity = cartQuantity + inputQuantity;  // add input to overall quantity
  //     console.log("after: ",cartQuantity);
		// }
		// document.getElementById("cartQuantity").innerHTML = cartQuantity; // update overall quantity
	

} 
