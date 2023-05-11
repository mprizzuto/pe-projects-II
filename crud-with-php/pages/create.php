<?php
session_start();
formatInput($_POST);
formatInput($_SESSION);
// include "./components/login-form.php";
if (!isset($_SESSION["logged-in"]) || count($_SESSION) === 0) {
	include "./components/login-form.php";
	
	if (validateUser()) {
		echo "logged in!";
	}
	else {
		echo "enter credentials";
	}
}

if (validateUser() === true || isset($_SESSION["logged-in"]) ?? null) {
	$_SESSION["logged-in"] = true;
	include "./components/todo-form.php";
	$_SESSION["logged-in"] = true;

	writeToDoDB();
	echo  "<a href=?page=logout>" . "logout" . "</a>";
}


?>
