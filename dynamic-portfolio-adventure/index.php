index.php
<?php include "utilities.php"; ?>

<?php 
$page = currentPage();
$json = file_get_contents("data/pages/$page.json");
$pageData = json_decode($json, true);
?>



<header class="site-header">
	<p><?=queryString();?></p>
	<?php include "partials/site-map.php"; ?>
</header>

<?php renderPageTemplate(currentPage()); ?>