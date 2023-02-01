<?php include "functions.php"; ?>
<?php include "./components/modules/header.php"; ?>
<?php echo var_dump($_GET)  ?>

<section class="<?= sanitizeString(getPage() ) ?? "home" ?>-section">
	<inner-column>
		<?php generatePage(); ?>
	</inner-column>
</section>


<?php include "./components/modules/footer.php"; ?> 

