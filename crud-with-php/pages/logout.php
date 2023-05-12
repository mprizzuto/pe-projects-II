<?php 
session_start();
// formatInput($_SESSION);

if ($_GET["page"] === "logout" && isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true) {
	// Logout user
	session_destroy();
	session_unset();
	$isLoggedIn = $_SESSION["logged-in"] = false;
	// Output success message
	echo "<h2>Successfully logged out</h2>";
}
// else {
// 	// Output error message
// 	echo "<h2>Error: Unable to log out</h2>";
// }
?>
