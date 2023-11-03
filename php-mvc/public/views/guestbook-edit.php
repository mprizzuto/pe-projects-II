<?php include "guestbook-form.php"; ?>
<?php
 //getPostById(); 
if ( $_GET["page"] === "edit" && $_SERVER["REQUEST_METHOD"] === "POST" ) {
	editPost();
}
?>

