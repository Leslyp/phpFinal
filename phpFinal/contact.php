<?php 
	$section = "contact"; 
	include("./lib/inc/header.php"); 

	$fname = ($_POST['firstName']);
	$lname = ($_POST['lastName']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);
	$comment = ($_POST['comments']);

	if(isset($_POST['submit'])) {
    try {
      $sql = "INSERT INTO Contacts (contactId, fname, lname, email, phone, comment) ";
      $sql .= "VALUES(NULL,:fname, :lname, :email, :phone, :comment)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':phone', $phone);
      $stmt->bindParam(':comment', $comment);
      $stmt->execute();    	
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    try {
	   	$sth = $conn->prepare("SELECT * FROM Contacts");
	    $sth->execute();
	    $contacts = $sth->fetchAll(PDO::FETCH_ASSOC);  
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    
	}

?>

<title>contact page</title>	
	
<div id="container">
   <h1>Contact Form</h1>
	<main class="contact">
		<form id="contactForm" action="contact.php"  method="POST">	
		  <!-- name -->
		  <div class="nameArea">
		    <label for="firstName"><span>*</span>First Name:</label>
		    <input type="text" id="firstName" name="firstName" required />
		  </div>
		  <div class="nameArea">
		    <label for="lastName"><span>*</span>Last Name:</label>
		    <input type="text" id="lastName" name="lastName" required />
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
	   	<div class="submitbtn">
		  	<button type="submit" name="submit" value="Submit">Submit</button>
	   	</div>	   
		</form> 

		<div class="showComments">
			<!-- array reverse returns an array in reverse order, required param = array -->
			<?php foreach (array_reverse($contacts) as $contact): ?>
				<h2>Posted by: <?= $contact['fname'] ?></h2>
				<p>Comment: <?= $contact['comment'] ?></p>
			<?php endforeach; ?>

			<!-- <div class="likeAndDislikeBtns">
		  	<button type="submit" id="addLikeBtn" onClick="reactToComment()" name="addLikeBtn">0</button>
		  	<button type="submit" id="addDislikeBtn" name="addDislikeBtn">0</button>
	   	</div>	 -->
		</div>
	</main>
</div>



 <?php include("./lib/inc/footer.php"); ?>