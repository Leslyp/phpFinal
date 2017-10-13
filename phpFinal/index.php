<?php	
  // section variable lets us find which page is selected to show that it's selected on nav
  $section = "home"; 
	include("./lib/inc/header.php"); 
  // calling static methods from class
	$featuredItems = PetProducts::get_featured_products();
?>

<main class="homePage">
  <div class="fotorama" data-width="100%" data-height="50%" data-autoplay="3000" data-transition="crossfade" >
    <img src="./lib/img/holo.jpg" alt="dog costumes">
    <img src="./lib/img/pugAd.jpg" alt="discount code">
    <img src="./lib/img/subscribe.jpg" alt="subscribe photo">
  </div>
  <div class="containHome">
    <div class="containFeatured">
      <div class="new">
        <h1>Featured Items</h1>
        <?php foreach ($featuredItems as $item): ?>
          <figure class="figures">
            <a href='productDetails.php?productId=<?= $item['productId'] ?>'>
              <img src= '.<?= $item['image'] ?>' alt="featured product pic">
            </a>
            <figcaption><?= $item['name'] ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
    <section class="containFeatured">
      <div class="new">
        <h1>#1 Dog Store</h1>
          <div class="homeBox">
            <p>We care about our customers.</p> 
          </div>
          <div class="homeBox">
            <p>We provide wonderful service for your furry friends.</p>   
          </div>
      </div>
    </section>
  </div>
</main>

<?php include("./lib/inc/footer.php"); ?>