<?php 
// if ( /*get["id"] === id in db */ ) {
	// show success message
	// echo "item deleted"; 
// }
// if id cannot be found in database output error

if (deletePost()) {
	echo "post deleted";
}
else {
	echo "id not found. either you already deleted your post or it doesn't exist.";
}
// deletePost();
?>