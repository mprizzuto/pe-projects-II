	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHP MVC guerstbook</title>
		<!-- <link rel="stylesheet" type="text/css" href="../app/styles/style.css"> -->
		<style type="text/css">
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
				<h1>header</h1>

				<nav>
					<?php 
					ini_set('display_errors', 1);

					include "../app/functions.php";
					// formatInput($_POST);

				  generateLinks(	navLinksArray() );

					?>
				</nav>
			</inner-column>
		</header>
		
		<main>
			<section>
				<inner-column>
