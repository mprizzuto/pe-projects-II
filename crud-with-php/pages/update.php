<?php 
session_start();
// formatInput($_POST);
// formatInput($_SESSION);
?>

<section>
	<inner-column>
		<h2><mark>update TODO</mark></h2>
		<!-- <?=returnCurrentToDo(getId(), decodeJSONAsArray())?> -->
		<!-- <p>todo: <?=sanitizeInput(getToDo())?> </p> -->
		
	<?php 
	// include "components/todo-form.php";
	if (!isset($_SESSION["logged-in"]) || 
		count($_SESSION) === 0  || $_SESSION["logged-in"] === false) {
		// include "components/todo-form.php";
		echo "log in to update todo!";
		include "./components/login-form.php";
		$_SESSION["logged-in"] = false;
	} 
	if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] || validateUser()) {
		echo "<p>todo: <?=sanitizeInput( returnCurrentToDo(getId(), decodeJSONAsArray()) )?></p>";
		echo sanitizeInput(updateToDoDb(getId()));
		include "components/todo-form.php";
		$_SESSION["logged-in"] = true;
		echo "loggged in!";
		generateLogoutLink("logout");
	}
	?>

	</inner-column>
</section>