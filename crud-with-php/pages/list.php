<h1>bread recipes <mark>read</mark></h1>

<?php 
	$recipeData = file_get_contents("recipe-data.json");
	$recipeJSON = json_decode($recipeData, true);

	// formatData($recipeJSON);
	echo "<ul>";
	foreach ($recipeJSON as $recipe) {
		// formatData($recipe);
		foreach ($recipe as $key => $value) {

			// formatData($key);
			echo "<li>" . 
			"<ul>" . 
				"<li>" . "<h2>recipe</h2>" . "</li>" .  "<li>" . "flour: " . sanitizeInput($value["flour"]) . "</li>" . 
			 "<li>" . "salt: " . $value["salt"] ."g" . "</li>" .
			 "<li>" . "water: " . $value["water"] . "</li>" .
			 "<li>" . "levening agent: " . $value["levening_agent"] . "</li>" .
			 "<li>" . "<a href=?page=detail&id=" . $key. ">" . "detail" . "</a>" . "</li>" .
			 "</ul>" . 
			 "</li>";
		}
	}
	echo "</ul>";
?>