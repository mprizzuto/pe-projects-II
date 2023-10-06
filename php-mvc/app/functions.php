<?php
function formatInput($input) {
	echo "<pre>";
		var_dump($input);
	echo "</pre>";
}


function generateLinks() {
  $pathToLinks = "../app/models/nav-links.json";
  
  $fileJSON = file_get_contents($pathToLinks);

  $linksAsArray = json_decode($fileJSON, true);
  
  return formatInput($linksAsArray);
}