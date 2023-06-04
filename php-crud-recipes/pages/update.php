<h2>update</h2>
<?php
echo sanitizeInput(matchIdToRecipe());
?>

<form method="POST">
	<label for="<?=sanitizeInput(matchIdToRecipe())?>">update <?=sanitizeInput(matchIdToRecipe())?></label>
	<input type="text" name="<?=sanitizeInput(matchIdToRecipe())?>" id="<?=sanitizeInput(matchIdToRecipe())?>">
</form>