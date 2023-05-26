<?php 
// @require "./upload.php";
?>

<form method="POST" enctype="multipart/form-data">
	<label for="recipe-name">recipe name</label>
	<input type="name" name="recipe name" id="recipe-name" placeholder="recipe name" required>

	<label for="flour">flour</label>
	<select name="flour" id="flour">
		<option value="pick a flour" disabled>pick a flour</option>
		<option value="all purpose(AP)">all purpose</option>
		<option value="whole wheat">whole wheat</option>
		<option value="bread flour(BF)">bread flour</option>
		<option value="other">other</option>
	</select>

	<label for="salt">salt</label>

	<select name="salt" id="salt">
		<option value="pick a salt" disabled>pick a salt</option>
		<option value="sea salt">sea salt</option>
		<option value="himalayan sea salt">himalayan sea salt</option>
		<option value="table salt">table salt</option>
		<option value="other">other</option>
	</select>

	<label for="water">water</label>
	<select name="water" id="water">
		<option value="pick a water source" disabled>pick a water source</option>
		<option value="tap water">tap water</option>
		<option value="filtered water">filtered water</option>
		<option value="other">other</option>
	</select>

	<label for="yeast">yeast</label>
	<select name="yeast" id="yeast">
		<option value="pick a yeast source" disabled>yeast</option>
		<option value="yeast water">yeast water</option>
		<option value="sourdough">sourdough</option>
		<option value="other">other</option>
	</select>

	<label for="recipe-photo">recipe photo</label>
	<input type="file" name="recipe-photo" accept="image/*" id="recipe-photo" required>
   
	<input type="submit" name="submit">
</form>
<?php 
// formatInput($_POST);
if (count($_POST) > 0) {
	addRecipeToDatabase();
	sanitizeRecipeDB();
}
// echo sanitizeRecipeDB();


?>

