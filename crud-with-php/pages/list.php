<h1>bread recipes</h1>

<?php 

if (isset($_POST)) {
	writeRecipe();
	// formatVar(getRecipe());
	echo "<ul>";
	if (getRecipe()) {
		foreach (getRecipe() as $recipe) {
		// formatVar($recipe);
		echo "<li>" 
		. "<h2>" . "flour:" . sanitizeInput($recipe["flour"]) . "</h2>"
		. "<p>" . "water: " . sanitizeInput($recipe["water"]) . "</p>" .
		"<p>" . "salt: " . sanitizeInput($recipe["salt"]) . "</p>" . 
		"<p>" . "leavening_agent: " . sanitizeInput($recipe["levening_agent"]) . "</p>" 
		. "</li>";
		}
	}
	
	echo "</ul>";
}	


?>