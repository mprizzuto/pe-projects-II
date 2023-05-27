<h2>detail page for</h2>

<?php 
if (checkDatabaseForId()) {
	echo checkDatabaseForId() ?? "invalid id";
}
if (checkDatabaseForId() === false) {
	//getRecipeId() === null|| 
	echo "invalid id";
}
// echo checkDatabaseForId();
?>