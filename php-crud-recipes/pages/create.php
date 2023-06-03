<h2>create a recipe</h2>
<?php include "./components/forms/recipe-form.php";?>

<?php 

if (count($_POST) > 0) {
	addRecipeToDb();
	// formatInput(getPhotoName());
	
	formatInput($_POST);
}
?>
