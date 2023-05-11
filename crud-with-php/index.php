<?php require "functions.php";?>

<?php include "components/header.php"; ?>

<?php 
if(!isLegalPage()) {
	
	include "./pages/404.php";
}
else {
	generatePage();

}

?>

<?php include "components/footer.php"; ?>