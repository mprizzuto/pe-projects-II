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
					<h2>PHP with crud</h2>

					<nav>
						<a href="?">home</a>
						<a href="?page=list">list</a>
						<a href="?page=create">create</a>
					</nav>
					
				</inner-column>
			</header>
			<section>
				<inner-column>
				<?php 
					$page = $_GET["page"] ?? null;
					@require "functions.php";
					
					switch ($page) {
						case "list":
						// case "";
							include "pages/list.php";
							break;

						case "create":
							include "./pages/create.php";
							break;

						default:
							include "./pages/home.php";
					}

					
									// formatVar($recipeJSON);

				?>

				</inner-column>
			</section>
			
		</main>

	</body>
</html>