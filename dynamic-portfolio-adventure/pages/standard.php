<?php include "page-header.php"; ?>

<?php 
foreach ($pageData["sections"] as $sections) {
	if ($sections["module"] == "generic_text") {
		include "partials/page-section.php";
	}

	if ($sections["module"] == "things-grid") {
		include "partials/things-grid.php";
	}

}
?>