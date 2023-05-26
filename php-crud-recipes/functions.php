<?php 
function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function sanitizeInput($input) {
  $cleanString = htmlspecialchars($input);
  $cleanString = stripcslashes($cleanString);
  return $cleanString;
}


function getPage() {
	return $_GET["page"] ?? null;
}

function generateUniqueId() {
	return uniqid();
}

function getImageName() {
	return $_FILES["recipe-photo"]["name"] ?? null;
}

function uploadImageToDB() {
	$target_dir = "uploads/";
	$uploaded_file = $_FILES["recipe-photo"]["name"];
	$file_extension = strtolower(pathinfo($uploaded_file, PATHINFO_EXTENSION));

	$target_file = $target_dir . basename($uploaded_file);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check if image file is an actual image or fake image
	if (isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["recipe-photo"]["tmp_name"]);
	  if ($check !== false) {
	    // echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, a file with the same name already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["recipe-photo"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		$allowed_extensions = ["jpg", "jpeg", "png", "gif"];
		if (!in_array($file_extension, $allowed_extensions)) {
		  echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed. <br>";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  // echo "Your file was not uploaded.";
		} else {
	  if (move_uploaded_file($_FILES["recipe-photo"]["tmp_name"], $target_file)) {
	    echo "The file " . htmlspecialchars($uploaded_file) . " has been uploaded<br>";
	  } else {
	    echo "There was an error uploading your file.";
	  }
	}
}

function getFileContents($file) {
	return file_get_contents($file);
}

// function getRecipeDB() {
// 	return file_get_contents("./database/recipes/recipe-database.json");
// }

function jsonToPHPArray($file) {
	return json_decode(getFileContents($file), true);
}

function filterSubmitKey($key) {
	return $key !== "submit";
}

function getRecipies() {
	$filteredArray = array_filter($_POST, "filterSubmitKey", ARRAY_FILTER_USE_KEY);
	return $filteredArray;
}

function addRecipeToDatabase() {
  $recipeDatabase = file_get_contents("./database/recipes/recipe-database.json");
  $recipeDBArray = json_decode($recipeDatabase, true);

  $recipeId = generateUniqueId();
  $newRecipe = [
    $recipeId => [
      [
        "post" => getRecipies(), // Assuming $_POST contains the recipe data
        "imageName" => sanitizeInput(getImageName())
      ]
    ]
  ];

  $recipeDBArray[] = $newRecipe;
  $recipeJSON = json_encode($recipeDBArray);

  file_put_contents("./database/recipes/recipe-database.json", $recipeJSON);
}

function getRecipesFromDB() {
	file_get_contents("./database/recipes/recipe-database.json");
}

function getRecipeDB() {
	$database = file_get_contents("./database/recipes/recipe-database.json");
	if (!isset($database)) {
		return "no records available";
	}
	return json_decode($database, true);
}

function readRecipeDB() {

}

function recipeJSONAsArray() {
	// return json_decode(getRecipeDB(), true);
}

function sanitizeRecipeDB() {
	$recipeData = jsonToPHPArray("./database/recipes/recipe-database.json");

  foreach ($recipeData as $key => $value) {
  	return formatInput($value);
  }
}


function generateRecipePhoto($image) {
  return <<< PHOTO
  <picture>
    <img src="./uploads/$image" alt="">
  </picture>
  PHOTO;
}

function getRecipePhotos() {
	$folder = "uploads";
	$recipePhotos = [];
	$files = scandir($folder);
	$filePathBlacklist = [".", "..", ".DS_Store"];
	foreach ($files as $file) {
	  if (!in_array($file, $filePathBlacklist)) {
	    array_push($recipePhotos, $file);
	  }
	}
	return $recipePhotos;
}


function databaseUploadsCheck() {
	if (getRecipeDB()) {
		foreach (getRecipeDB() as $recipeKey => $recipeValue) {
			formatInput($recipeValue);
		}
	}
	
}
