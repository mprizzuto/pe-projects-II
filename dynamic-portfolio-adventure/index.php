index.php
<?php include "utilities.php"; ?>

<?php 
$page = currentPage();
?>

<header>
	<p><?=queryString();?></p>
	<h1><?=$page["title"]?></h1>
	<p><?=$page["intro"]?></p>

	<?php include "partials/site-map.php"; ?>
</header>

<?php renderPageTemplate(currentPage()); ?>

<section>
	<h2>section heading</h2>
</section>