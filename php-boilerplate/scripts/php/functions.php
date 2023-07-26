<?php 

function formatData($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}

function templateNavLinks() {
	$linksFile = file_get_contents("./data/nav-links.json");
	$linksJSON = json_decode($linksFile, true);
	// formatData($linksJSON);
	// $HTML = "<li><a href=''></a></li>";

	foreach ($linksJSON as $firstArr => $value) {
		foreach ($value as $subKey => $subValue) {
			// echo $subKey . $subValue;
			echo "<li><a href='$subValue'>$subKey</a></li>";
		}
	}

}

function is404() {
	if ( !isSafePage() ) {
		return "true";
	}
	else {
		return "false";
	}
}

function pageRouter() {
	if ( is404() === "true") {
		include "./pages/404.php";
	}

	else {
		switch ( getPage() ) {
			case null:
			case "home":
				include "./pages/home.php";
				break;

			case "about":
				include "./pages/about.php";
				break;

			case "contact":
				include "./pages/contact.php";
				break;		
			
			default:
				include "./pages/home.php";
		}
	}
}

function getPage() {
	return $_GET["page"] ?? null;
}

function isSafePage() {
	$safePages = ["about", "home", null, "contact"];

	return in_array(getPage(), $safePages);
}
?>