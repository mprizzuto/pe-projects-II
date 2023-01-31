<?php include "functions.php"; ?>
<?php include "./components/modules/header.php"; ?>

<?php 
echo getPage() . "get is" . var_dump($_GET);
// echo is404();
?>

<section class="<?= sanitizeString(getPage()) ?? "home" ?>-section">
	<inner-column>
		<?php generatePage(); ?>
	</inner-column>
</section>


<?php include "./components/modules/footer.php"; ?> 

