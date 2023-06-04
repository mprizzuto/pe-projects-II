<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav>
	<a href="?page=home">read recipes</a>
	<a href="?page=create">create recipes</a>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</nav>
<?php 
include "./functions.php";

switch (getPage()) {
	case null:
	case "home":
	case "read":
		include "./pages/read.php";
		break;

	case "create":
		include "./pages/create.php";
		break;

		case "update":
			include "./pages/update.php";
			break;

		case "delete":
			include "./pages/delete.php";
			break;

		case "detail":
			include "./pages/detail.php";
			break;	
	
	default:
		include "./pages/404.php";
}
?>

</body>
</html>