<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>crud with php</title>

		<style type="text/css">
			/* form styles */
		form {
		/*   line-height: 1.5; */
		  margin-top: 20px;
		}

		:is(label, input) {
		  display: block;
		}

		label +  input, label + select {
		  margin-top: 5px;
		}


		:is(input + label, select + label, 
		fieldset + fieldset, [class$="results"]) {
		  margin-top: 20px;
		}

		label {
		  margin-top: 10px;
		  text-transform: capitalize;
		  font-weight: bolder;
		  letter-spacing: 0.03em;
		}

		input {
		  display: block;
		  width: 100%;
		  max-width: 150px;
		  margin-top: 5px;
		}

		:is(input, select) {
		  padding: .5em 1em;
		}

		input[type="submit"] {
		  margin-top: 20px;
		  max-width: 100px;
		  font-weight: bolder;
		}

		input:invalid {
		  border: 5px double maroon;
		}

		legend {
		  font-size: clamp(1.8em, 3vw, 4em)
		}

		/*  Setup */
		:root {
		  --main-line-height: 1.1;
		  --main-max-width: 600px;
		}

		*, *:before, *:after {
		  box-sizing: inherit;
		}

		html {
		  box-sizing: border-box;
		}

		picture {
		  display: block;
		}

		picture img {
		  display: block;
		  height: auto;
		  width: 100%;
		}

		inner-column {
		  display: block;
		  max-width: var(--main-max-width);
		  margin-right: auto;
		  margin-left: auto;
		  line-height: var(--main-line-height);
		  padding: 5px;
		}

		/* typography */
		strong {
		  font-weight: bolder;
		}

		em {
		  font-style: italic;
		}


		</style>
	</head>
	<body>


		<main>
			<header>
				<inner-column>
					<h1>PHP with crud</h1>

					<nav>
						<a href="?">home</a>
						<a href="?page=list">list</a>
					</nav>
					
				</inner-column>
			</header>
			<section>
				<inner-column>
				<?php
					@require "functions.php";
					$page = $_GET["page"] ?? null;
					
					
					switch ($page) {
						case "list":
							include "pages/list.php";
							break;

						case "create":
							include "./pages/create.php";
							break;

						case "detail":
							include "./pages/detail.php";
							break;

						case "update":
							include "./pages/update.php";
							break;

						case "delete":
							include "./pages/delete.php";
							break;

						default:
							include "./pages/list.php";
					}
				?>

				<?php 
				$detail = $_POST["detail"] ?? null;
				?>

				</inner-column>
			</section>
			
		</main>

	</body>
</html>