<?php
function formatInput($input) {
	echo "<pre>";
		var_dump($input);
	echo "</pre>";
}


function navLinksArray() {
  $pathToLinks = "../app/models/nav-links.json";
  
  $fileJSON = file_get_contents($pathToLinks);

  $linksAsArray = json_decode($fileJSON, true);
  
  return $linksAsArray;
}


function generateLinks( $linksArr ) {
  foreach ($linksArr as $key) {
    foreach ($key as $subKey => $subValue) {
      echo " ";
      echo <<< HEREDOC
      <a href="$subValue">$subKey</a>
      HEREDOC;
    }
  }
}

function getCurrentPage() {
  return $_GET["page"] ?? null;
}
