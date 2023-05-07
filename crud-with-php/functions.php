<?php
function formatData($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}

function getPage() {
	return $_GET["page"] ?? null;
}

function getFormValues() {
	return $_POST;
}

function filterFormValues() {
	return array_filter(getFormValues(), function($key){
		return $key !== "submit";
	}, ARRAY_FILTER_USE_KEY);
}

function getDatabase() {
	$database = file_get_contents("recipe-data.json");
	$databaseDecoded = json_decode($database, true);
	return $databaseDecoded;
	// formatData($databaseDecoded);
}

function removeIdFromDatabase($id) {
	foreach (getDatabase() as $key => $value) {
		if ($key === $id) {
			unset($key);
		}
	}
	// hope this works...
}

function getCurrentDatabaseId() {
	return $_GET["id"] ?? null;
}

function verifyDatabaseId($id) {
	foreach (getDatabase() as $key => $value) {
		foreach ($value as $key => $value) {
			// formatData($key);
			if ($key === $id) {
				return "true";
			}
			else {
				return "false";
			}
			
		}

	}
}

function isIdValid() {
    foreach (getDatabase() as $key => $value) {
        foreach ($value as $innerKey => $innerValue) {
            if ($innerKey === $_GET["id"] ) {
                return true;
            }
        }
    }
    return false;
}




function createRecipe() {
	echo "<ul>";
	foreach (filterFormValues() as $key => $value) {
		echo "<li>" . $key . ": " . $value . "</li>";
	}
	echo "</ul>";
}

function sanitizeInput(string $input) {
	$result = htmlentities($input);

	return trim($result);
}



?>