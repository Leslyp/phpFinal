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

// function to slide form up on submit
// function hideForm(event) {
// 		event.preventDefault();
// 		$( "#submit" ).click(function() {
// 	  $( "#contactForm" ).slideUp( "slow", function() {
// 	    // Animation complete.
// 	  });
// }

// function reactToComment() {
//   var addLikeBtn = document.getElementById("addLikeBtn"); 
//   var addDislikeBtn = document.getElementById("addDislikeBtn").innerHTML;

//   addLikeBtn = parseInt(addLikeBtn);
//  	addDislikeBtn = parseInt(addDislikeBtn); 

//   if (addLikeBtn) {  // when btn is pushed
//    	addLikeBtn = addLikeBtn + 1;  // add input to overall quantity
// 	}
// 	document.getElementById("addLikeBtn").innerHTML = addLikeBtn; // update overall quantity
// }

