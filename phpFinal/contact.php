<?php include("./lib/inc/header.php"); ?>

		<title>contact page</title>
	
	
<div id="container">
   <h1>Contact Form</h1>
	<main class="contact">
		<form id="contactForm" action="contact.php" method="POST">	
		  <!-- name -->
		  <div class="nameArea">
		    <label for="firstname"><span>*</span>First Name:</label>
		    <input type="text" id="firstname" name="firstname" required />
		  </div>
		  <div class="nameArea">
		    <label for="lastname"><span>*</span>Last Name:</label>
		    <input type="text" id="lastname" name="lastname" required />
		  </div>

		  <!-- email-->
	   	<div class="emailArea">
		    <label for="email"><span>*</span>Email:</label>
		    <input type="email" id="email" name="email" required />
	   	</div>

		  <!-- phone-->
	   	<div class="phoneNum">
		    <label for="phone"><span>*</span>Phone:</label>
		    <input type="tel" id="phone" name="phone" required pattern="/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/" title="XXX-XXX-XXXX"/>
	   	</div>

		  <!-- comments/questions-->
	   	<div id="textarea">
		    <label for="comments">Comments/Questions:</label>
		    <textarea rows="6" cols="40" id="comments" name="comments" required=""></textarea>
	   	</div>

		  <!-- save button-->
	   	<div class="submitbtm">
		  	<button type="submit" name="submit" value="Submit">Submit</button>
	   	</div>	   
		</form> 
	</main>
</div>



 <?php include("./lib/inc/footer.php"); ?>