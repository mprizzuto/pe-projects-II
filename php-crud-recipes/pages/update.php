<?php
// echo getRecipeId();

if (checkDatabaseForId() === false) {
	echo "invalid id";
}
else {
	echo "update page for " . "<mark>" . matchIdToRecipeName() . "</mark>";
	include "./components/forms/recipe-form.php";
}


?>