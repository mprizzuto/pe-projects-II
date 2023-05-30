<?php require "./components/header.php"; ?>
<?php require "functions.php";?>
<?php 
// echo sanitizeInput(formatInput($_POST));
// echo sanitizeInput(getImageName());

// var_dump( $_FILES);
// formatInput($_POST);
// echo isset($_POST);
?>

<?php 
if (in_array($_POST["submit"] ?? null, $_POST)) {
	uploadImageToDB();
	addRecipeToDatabase();
	// echo formatInput(getImageName());
	// getImageName();
}

?>
<?php 
switch (getPage()) {
	case 'create-a-recipe':
		include "./pages/create.php";
		break;

	case "":
	case null:
		include "./pages/read.php";
		break;

	case "detail":
		include "./pages/detail.php";
		break;


	case "update":
		include "./pages/update.php";
		break;

	case "delete":
		include "./pages/delete.php";
		break;		
	
	default:
		include "./pages/404.php";
}
?>
<?php require "./components/footer.php"; ?>