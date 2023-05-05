<?php
function formatVar($var) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

function sanitizeInput($input) {
	$result = "";
	$result = stripcslashes($input);
	$result = htmlspecialchars($input);
	return $result;
}

function readData($filename) {
  $data = file_get_contents($filename);
  return json_decode($data, true);
}

function writeData($filename, $data) {
  file_put_contents($filename, json_encode($data));
}

function writeRecipe() {
  $existingData = readData('recipe-data.json');

  $newItem = $_POST;

  // Filter out the submit button from the POST array
  $newItem = array_filter($newItem, function($key) {
  	return $key !== 'submit';
  }, ARRAY_FILTER_USE_KEY);
  if (isset($_POST) && count($_POST) > 0) {
  	$existingData[] = $newItem;
  }
  

  // Write the updated data back to the file
  writeData('recipe-data.json', $existingData);
}

function getRecipe() {
  return readData('recipe-data.json');
}

?>