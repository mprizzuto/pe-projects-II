<?php include "functions.php"; ?>
<?php include "./components/modules/header.php"; ?>

<section class="<?= sanitizeString(getPage() ) ?? "home" ?><?=renderSectionClass()?>">
	<inner-column>
		<?php generatePage(); ?>
	</inner-column>
</section>


<?php include "./components/modules/footer.php"; ?> 

