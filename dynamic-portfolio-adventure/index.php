<header class="site-header">
	<?php include "partials/site-menu.php"; ?>
</header>
<?php include "functions.php"; ?>


<?php renderPageTemplate(currentPage()); ?> 

<?php 
switch (currentPage()) {
	case 'about':
		renderJSON();
		break;

	case 'list':
		// echo "list";
		renderJSON();
		break;

	default:
		renderJSON();
}
?>
