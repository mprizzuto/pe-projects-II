<?php include "./views/header.php"; ?>
<?php include "../app/controllers/page-controller.php"; ?>
<?php include "./views/footer.php"; ?>

<?php 
if (isFileEmpty("./views/contact.php")) {
	echo "404 INCLUDED";
}
?>