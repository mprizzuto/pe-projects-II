<h2> <?php echo strlen(returnCurrentToDo(getId(), decodeJSONAsArray()) )  === 0 ? "empty to do" : returnCurrentToDo(getId(), decodeJSONAsArray()) . " deleted" ?></h2>
<?php 
session_start();
// formatInput($_POST);
// formatInput($_SESSION);


if (!isset($_SESSION["logged-in"]) || 
	count($_SESSION) === 0 || $_SESSION["logged-in"] === false) {
	// include "components/todo-form.php";
	echo "log in to delete todo!";
	include "./components/login-form.php";
	$_SESSION["logged-in"] = false;
} 
if (!$_SESSION["logged-in"] && validateUser() === false) {
	echo "enter proper credentials";
}
// if (validateUser() === false) {
// 	echo "enter the proper credentials";
// }
if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] || validateUser()) {
	// include "components/todo-form.php";
	$_SESSION["logged-in"] = true;
	echo "successfully logged in! <br>";
	echo generateLogoutLink("logout");

	if (returnCurrentId(getId(), decodeJSONAsArray()) === false) {
		echo returnCurrentToDo(getId(), decodeJSONAsArray());
	}
	if (isLegalId(getId(), decodeJSONAsArray()) === false) {
		echo "<h2>" . returnCurrentToDo(getId(), decodeJSONAsArray()) .  "</h2>" . "item already deleted";
	}
	else {
		// echo "<h2>" . returnCurrentToDo(getId(), decodeJSONAsArray()) . " deleted" . "</h2>";
		deleteToDoFromDb(getId(), decodeJSONAsArray());	
	}
}

?>


