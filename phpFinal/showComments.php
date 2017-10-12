<?php 
  // section variable lets us find which page is selected to show that it's selected on nav
	$section = "contact"; 
	include("./lib/inc/header.php"); 

	// collect post variables from contact form
	$fname = ($_POST['firstName']);
	$lname = ($_POST['lastName']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);
	$comment = ($_POST['comments']);

	// if form is submitted then bring to this page and show comments
	if(isset($_POST['submit']) && $_POST['submit'] == 'submit') {
		$insertContacts = Contacts::insert_contacts($fname, $lname, $email, $phone, $comment);
		$contacts = Contacts::get_all_comments();
	} 

?>

	
<main id="container">
   <h1>Comments / Reviews</h1>
		<section class="showComments">
			<!-- array reverse returns an array in reverse order, required param = array -->
			<?php foreach (array_reverse($contacts) as $contact): ?>
				<h2>Posted by: <?= htmlentities($contact['fname']) ?></h2>
				<!-- htmlentities convert characters into entities, which prevents browsers from using it as an HTML element -->
				<p>Comment: <?= htmlentities($contact['comment']) ?></p>
			<?php endforeach; ?>
		</section>

		<div>
			<a href="contact.php"><button>Post another comment</button></a>
		</div>
</main>

 <?php include("./lib/inc/footer.php"); ?>