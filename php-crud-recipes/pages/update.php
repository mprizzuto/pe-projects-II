<?php
// echo getRecipeId();

if (checkDatabaseForId() === false) {
	echo "invalid id";
}
else {
	echo "update page for " . "<mark>" . matchIdToRecipeName() . "</mark>";
	updateDatabase();
	// formatInput(getRecipeFormData());
	include "./components/forms/recipe-form.php";
}


?>