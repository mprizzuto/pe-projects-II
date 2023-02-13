index.php
<?php include "utilities.php"; ?>

<?php 
$page = currentPage();
$json = file_get_contents("data/pages/$page.json");
?>



<header class="site-header">
	<p><?=queryString();?></p>
	<?php include "partials/site-map.php"; ?>
</header>

<?php renderPageTemplate(currentPage()); ?>