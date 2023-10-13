<?php
session_start();
// $_SESSION["user_name"] = [];
if ( !isset($_SESSION["user_data"] ) ) {
	$_SESSION["user_data"] = [];
}
// echo strlen(trim(" f "));
?>

<?php 
  include "../app/functions.php";

  if ( $_SERVER["REQUEST_METHOD"] === "POST") {
  	
    header("Location: index.php");
    // exit;
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP MVC guerstbook</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">

</head>
<body>		
	<header>
		<inner-column>
      <nav>
        <?php 
        ini_set('display_errors', 1);

        generateLinks(  navLinksArray() );

        ?>
      </nav>

			<h1>PHP guestbook</h1>

			<?php 
			formatInput($_SESSION);
			?>
      <!-- <p>to leave a comment, go to the guestbook  <a href="?page=guestbook">guestbook</a></p> -->
		</inner-column>
	</header>

	<main>
		<section>
			<inner-column>
