<?php 
function sanitizeInput(string $input) {
	$result = htmlentities($input);

	return trim($result);
}
?>