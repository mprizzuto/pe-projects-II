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


<form method="POST" enctype="multipart/form-data">
	<?php if (getIngredient() !== "photo_name") :?>
		<label for="<?=sanitizeInput(matchIdToRecipe())?>">update <?=sanitizeInput(matchIdToRecipe())?></label>
		<input type="text" name="<?=sanitizeInput(matchIdToRecipe())?>" id="<?=sanitizeInput(matchIdToRecipe())?>">

	<?php else: ?>
		<p>photo must be 500 kb or less</p>
		<label for="recipe-photo">recipe photo</label>
		<input type="file" name="recipe-photo" accept="image/*" id="recipe-photo" required>
	<?php endif; ?>
	<input type="submit" name="submit">

</form>

<?php 
if (count($_POST) > 0) {
	
	if (getIngredient() === "photo_name") {
		uploadImages();
	}
	updateRecipeValue();
}
?>
