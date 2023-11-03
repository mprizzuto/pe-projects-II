<?php 
session_start();

include "./app/functions.php";

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
	$_SESSION["user_data"] = [];

	date_default_timezone_set('America/New_York');
	$_SESSION["start"] = time();
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
	<link rel="stylesheet" type="text/css" href="./public/styles/style.css">

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
			 // formatInput($_SESSION);
			
			?>
      <!-- <p>to leave a comment, go to the guestbook  <a href="?page=guestbook">guestbook</a></p> -->
		</inner-column>
	</header>

	<main>
		<section>
			<inner-column>
