index.php
<?php include "partials/site-menu.php"; ?>
<?php include "functions.php"; ?>

<?php
$pageData = pageData();
?>
<?php var_dump($pageData)?>



<header class="site-header">
	<p><?=queryString();?></p>
	<?php include "partials/site-map.php"; ?>
</header>

<!-- <?php renderPageTemplate(currentPage()); ?> -->