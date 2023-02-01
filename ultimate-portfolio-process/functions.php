<?php function generateNavLinks(array $array) { ?>
	<?= "<ul class='page-list'>" ?>

	<?php foreach ($array as $linkText => $queryString): ?>
		<?="<li><a href='$queryString'>$linkText</a></li>" ?>

	<?php endforeach; ?>
	<?= "</ul>" ?>
<?php } ?>


<?php 
	function formatInput(array $arr) {
		echo "<pre>";
			var_dump($arr);
		echo "</pre>";
	}

	function getQueryString() {
		return $_GET["page"] ?? null;
	}

	function getApprovedQueryString() {
		$pages = ["home", "about", "contact", "404"];

		if ( in_array(getQueryString(), $pages ) ) {
			return getQueryString();
		}
		return "generic";
	}

	function is_set($var) {
		return isset($var) ? "true" : "false";  
		//a human-readable isset(), instead of returning 1 for true/ nothing for false.. ,
	}

	// function getPage() {
	// 	$page = $_GET["page"] ?? null;

	// 	if (is_set($page) === "false") return null; //trying out this syntax just to piss off Derek, haha :)

	// 	return $page;
	// }

	function getPage() {
		if (is_set(getQueryString()) === "false") return null; //trying out this syntax just to piss off Derek, haha :)

		return getApprovedQueryString();

	}

	// function is404() {
	// 	$trustedPages = ["home", "about", "contact"];
	// 	$page = $_GET["page"] ?? null;
	// 	// return in_array($page, $trustedPages) ? "true" : "false";
	// 	return in_array($page, $trustedPages) ? "false" : "true";
	// }

	function is404() {
		$trustedPages = ["home", "about", "contact"];

		// return in_array($page, $trustedPages) ? "true" : "false";
		return in_array(getQueryString(), $trustedPages) ? "false" : "true";
	}

	function sanitizeString($str) {
		return preg_replace("/[^a-zA-Z]+/", "", $str);
	}


	function generatePage() {
		// if (!getQueryString()) {
		// 	// return false;
		// 	echo "false";
		// }

		switch (getQueryString()) {
			// case "home":
			// 	include "./pages/home.php";
			// 	break;

			case "about":
				include "./pages/about.php";
				break;

			case "contact":
				include "./pages/contact.php";
				break;

			case is404() === "true":
				include "./pages/404.php";
				break;

				// toDO, check for empty string "" for $_GET[page]
			
			default:
				// echo "!home!";
				include "./pages/home.php";
				break;
		}
	}


	function renderSectionClass() {
		return isset($_GET['page']) ? getApprovedQueryString() . "-section": "home-section";
	}

	function templateHTML($pageData) {
	  $output = "";
	  $page = getQueryString() ?? "home";

	  if (array_key_exists($page, $pageData)) {
	    $output .= "<h2>$page</h2>";
	    foreach ($pageData[$page] as $p) {
	      $output .= "<p>$p</p>";
	    }
	  } else {
	    $output = "Page not found";
	  }
	  return $output;
	}

	function templateImages($imageData) {
	  $output = "";
	  $page = $_GET["page"] ?? "home";

	  if (array_key_exists($page, $imageData)) {
	    foreach ($imageData[$page] as $src => $alt) {
	      $output .= "<img src='$src' alt='$alt'>";
	    }
	  } 
	   else {
	    $output .= "<img src='./images/404.jpg'>";
	  }
	  return $output;
	}

	function checkStringLength() {
		
	}





?>


	
