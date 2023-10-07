	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHP MVC guerstbook</title>
	</head>
	<body>


		<?php 
		ini_set('display_errors', 1);

		include "../app/functions.php";
		// formatInput($_POST);

	 generateLinks(	navLinksArray());
		?>
		
		<header>
			<inner-column>
				<h1>header</h1>
			</inner-column>
		</header>
		
		<main>
			<section>
				<inner-column>
