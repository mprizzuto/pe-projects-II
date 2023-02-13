<?php include "partials/site-menu.php"; ?>
<?php include "functions.php"; ?>

<?php
$pageData = pageData();
?>


<?php renderPageTemplate(currentPage()); ?> 

<?php 
// if (currentPage() === "about") {
// 	var_dump( $pageData["sections"]) ;
// }
switch (currentPage()) {
	case 'about':
		echo "about";
		break;

	case 'list':
		echo "list";
		break;

	default:
		foreach ($pageData["sections"] as $section) {
			foreach($section as $key => $value) {
				echo $key . $value;
			}
		}
		break;
}
?>
