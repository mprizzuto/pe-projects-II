<?php
function getPage() {
	return $_GET["page"] ?? null;
}

function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}
?>