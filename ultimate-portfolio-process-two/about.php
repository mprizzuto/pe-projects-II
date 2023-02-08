<?php include "header.php"; ?>

<?php 
$pageTitle = "about page title";
include "page-header.php"; 
?>

<section class="new-news">
	<inner-column>
		<?php 
		$heading = "new news";
		include "templates/modules/graphic-diptych/template.php";
		?>
	</inner-column>
</section>

<section class="other-news">
	<inner-column>
		<?php 
		$heading = "other news";
		include "templates/modules/graphic-diptych/template.php";
		?>
	</inner-column>
</section>

<?php include "footer.php"; ?>