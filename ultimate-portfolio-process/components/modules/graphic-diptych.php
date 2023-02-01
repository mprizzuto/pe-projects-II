<?php 
include "./data/page-data.php";
include "./data/image-data.php";
?>

<graphic-diptych>
	<picture class="diptych-photo <?=getApprovedQueryString()?>-diptych-img">
		<?=templateImages($imageData)?>
	</picture>

	<section class="diptych-section">

		<?php echo templateHTML($pageData); ?>
	</section>
</graphic-diptych>