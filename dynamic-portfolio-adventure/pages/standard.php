<?php include "page-header.php"; ?>

<?php 
foreach ($pageData["sections"] as $sections) {
	include "partials/page-section.php";
}
?>