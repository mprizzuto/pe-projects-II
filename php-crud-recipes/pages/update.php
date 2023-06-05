<h2>update</h2>
<?php

if (count($_POST) > 0) {
	// echo outputUpdatedRecipeValue();
	echo updateRecipeValue();
	// formatInput(getRecipes());
	// formatInput($_GET);
}
else {
	echo sanitizeInput(matchIdToRecipe());
}
?>

<form method="POST">
	<label for="<?=sanitizeInput(matchIdToRecipe())?>">update <?=sanitizeInput(matchIdToRecipe())?></label>
	<input type="text" name="<?=sanitizeInput(matchIdToRecipe())?>" id="<?=sanitizeInput(matchIdToRecipe())?>">

	<input type="submit" name="submit">

</form>