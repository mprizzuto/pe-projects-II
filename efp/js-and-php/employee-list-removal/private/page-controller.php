<?php
// formatInput($_POST);
switch (getPage()) {
	case "":
		include "../public/views/home.php";
		break;

	case "employee-form":
		include "../public/components/employee-form.php";
		break;	
	
	default:
		include "../public/views/404.php";
		break;
}