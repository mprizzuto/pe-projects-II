<?php include "partials/site-menu.php"; ?>
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

/*
foreach ($pageData["sections"] as $section) {
		foreach($section as $heading => $content) {
			echo <<<THIS
				"<h2>$heading</h2>" . "<p>$content</p>";
			THIS;
		}
	}
*/ 
?>
