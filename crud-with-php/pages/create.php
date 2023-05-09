<h2><mark>create</mark></h2>
<?php include "components/todo-form.php";?>

<?php
if (in_array("submit", $_POST)) {
	writeToDoDB();
	
	echo getId();

}

?>