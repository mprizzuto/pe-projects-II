<?php 
function currentPage() {
	if ( isset($_GET["page"]) ) {
		return $_GET["page"];
	}
	else {
		return "home";
	}
}

function pageData() {
	$page = currentPage();
	$filePath = "data/pages/$page.json";
	$json = file_get_contents($filePath);
	if (!$json) {
	 $json = file_get_contents("data/pages/404.json");
	}
	$pageData = json_decode($json, true);
	return $pageData;
}

function renderPageTemplate() {
	$filePath = "pages/" . "standard" . ".php";
	$pageData = pageData();
	if ( file_get_contents($filePath) ) {
		include "$filePath";
	}
	else {
		include "pages/404.php";
	}
}

// function renderJSON() {
// 	$pageData = pageData();
// 	foreach ($pageData["sections"] as $section) {
// 		foreach($section as $heading => $content) {
// 			echo <<<THIS
// 				<h2>$heading</h2> 
// 				<p>$content</p>
// 			THIS;
// 		}
// 	}
// }

function renderJSON() {
	$pageData = pageData();
	foreach ($pageData["sections"] as $section) {
		foreach($section as $heading => $content) {
			if ( is_array($content) ) {
				foreach($content as $key => $value) {
					echo "<h2>" . $value['title'] ."</h2>";
					// echo "<pre>";
					// var_dump($key);
					// echo "</pre>";
				}
			}
			else {
				echo <<<THIS
				<h2>$heading</h2> 
				<p>$content</p>
			THIS;
			// echo var_dump($content);
			}

		}
	}
}

