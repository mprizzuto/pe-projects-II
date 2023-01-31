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

	function is_set($var) {
		return isset($var) ? "true" : "false";  
		//a human-readable isset(), instead of returning 1 for true/ nothing for false.. ,
	}

	function getPage() {
		$page = $_GET["page"] ?? null;

		if (is_set($page) === "false") return null; //trying out this syntax just to piss off Derek, haha :)

		return $page;
	}

	function is404() {
		$trustedPages = ["home", "about", "contact"];
		$page = $_GET["page"] ?? null;
		return in_array($page, $trustedPages) ? "true" : "false";
	}

	function generatePage() {
		if (!getQueryString()) {
			return false;
		}

		switch (getQueryString()) {
			case "home":
				echo "home!";
				break;

			case "about":
				echo "about!";
				break;

			case "contact":
				echo "contact!";
				break;		


			case is404() === "false":
				echo "404!!";
				break;
			
			default:
				echo "home!";
				break;
		}
	}
?>