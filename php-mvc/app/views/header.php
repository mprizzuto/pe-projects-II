<?php 
  include "../app/functions.php";

  // if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
  //   header("Location: index.php");
  //   exit;
  // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP MVC guerstbook</title>
	<!-- <link rel="stylesheet" type="text/css" href="../app/styles/style.css"> -->
	<style>
		* {
  /*				color: red;*/
		}

		form * {
			margin-top: 20px;
		}

		inner-column {
			display: block;
			padding: 5px;
			margin-right: auto;
			margin-left: auto;
      max-width: 700px;
			line-height: 1.5;
		}

    fieldset {
    /*        border: none;*/
    }

    .user-name {
      font-weight: bolder;
    }

	</style>
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

			if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
				echo "POSTED";
			}
			?>
      <!-- <p>to leave a comment, go to the guestbook  <a href="?page=guestbook">guestbook</a></p> -->
		</inner-column>
	</header>
	
	<main>
		<section>
			<inner-column>
