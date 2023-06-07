<?php
function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function getPage() {
	return $_GET["page"] ?? null;
}

function getCurrentRecipeId() {
	return $_GET["id"] ?? null;
}

function getIngredient() {
	return $_GET["ingredient"] ?? null;
}

function decodeRecipeDb() {
	return json_decode(getRecipeDb(), true);
}

function getRecipes() {
	unset($_POST["submit"]);
	return $_POST ?? null;
}

function getPhotoName() {
	// $files = $_FILES["recipe-photo"]["name"];
	return $_FILES["recipe-photo"]["name"];
}

function getUniqueId() {
	return uniqid();
}

function sanitizeInput(mixed $input) {
	$stripslash = stripslashes($input);
	$htmlToEntities = htmlspecialchars($stripslash);
	
	return $htmlToEntities;
}

// function sanitizeInput($input) {
// 	$noHTML = htmlspecialchars($input);
// 	$noSlashes = stripslashes($noHTML);
// 	return $noSlashes;
// }

function uploadImages() {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["recipe-photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["recipe-photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["recipe-photo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["recipe-photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["recipe-photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}

function getRecipeDb() {
	return file_get_contents("./database/recipes/recipe-database.json");
}

function addRecipeToDb() {
  $todoDb = decodeRecipeDb() ?? [];
  $recipe = getRecipes();
  $recipe['photo_name'] = getPhotoName();
  $todoDb[] = [getUniqueId() => $recipe];

  $todoDbJSON = json_encode($todoDb);

  file_put_contents("./database/recipes/recipe-database.json", $todoDbJSON);
}

function generateRecipeList() {
	if (!decodeRecipeDb()) {
		echo "empty database, bettr add a recipe";
	}
	else {
		$subSubKey = &$recipeSubSubKey ?? null;
		$subSubValue = &$recipeSubSubValue ?? null;
		echo  "<ul>";
	foreach (decodeRecipeDb() as $recipeKey => $recipeValue) {
		echo "<li>" . "<recipe-card>";
		foreach ($recipeValue as $recipeSubKey => $recipeSubValue) {
			foreach ($recipeSubValue as $recipeSubSubKey => $recipeSubSubValue) {
// formatInput($subSubKey);
				if ($recipeSubSubKey === "photo_name") {
					continue;
				}
				// formatInput($recipeSubValue["photo_name"]);

				echo "<ul>" . "<li><strong>" . $recipeSubSubKey . "</strong>: " . sanitizeInput($subSubValue) . " <a href=\"?page=detail&ingredient=" . $subSubKey . "&id=" . $recipeSubKey . "\">detail</a></li></ul>";

				// echo "<ul>" ."<li>" ."<picture>" . "<img src=./uploads/" . $recipeSubValue["photo_name"] . ">" . "</picture>" . " <a href='?page=detail&ingredient=" . $subSubKey . "&id=" . $recipeSubKey . "'>" . "detail" . "</a> " . "</ . "</ul>";

			}

			if (isset($recipeSubValue["photo_name"])) {
				echo  "<ul class = " . checkDbEmptyValues() . ">" . "<ul>" ."<li>" ."<picture class=" . deletePhoto() . ">" . "<img src=./uploads/" . $recipeSubValue["photo_name"] . ">" . "</picture>" . " <a href=?page=detail&ingredient=" . $subSubKey . "&id=" . $recipeSubKey . ">" . "detail" . "</a> " . "</li>" . "</ul>";
			}

			// echo  "<ul class = " . checkDbEmptyValues() . ">" . "<ul>" ."<li>" ."<picture class=" . deletePhoto() . ">" . "<img src=./uploads/" . $recipeSubValue["photo_name"] . ">" . "</picture>" . " <a href=?page=detail&ingredient=" . $subSubKey . "&id=" . $recipeSubKey . ">" . "detail" . "</a> " . "</li>" . "</ul>";
			
		}
		echo "</recipe-card>" . "</li>";
	}
	echo "</ul>";
	}
}

function getRecipeDatabaseIds() {
	$idArray = [];
	/* get database
	if decodeRecipeDb()
		loop over database
		return array of IDs as strings
	*/ 
	if ( decodeRecipeDb() ) {
		foreach (decodeRecipeDb() as $dbKey => $dbValue) {
			// formatInput($dbValue);
			foreach ($dbValue as $subKey => $subValue) {
				array_push($idArray, $subKey);
				// formatInput($idArray);
			}
		}
	}
	// return null;
	return in_array(getCurrentRecipeId(), $idArray) ? true : false;
}




function deleteDbItem() {
	$isPhotoDeleted = 0;
	$recipesDb = decodeRecipeDb();
	foreach ($recipesDb as $dbKey => &$dbValue) {
		foreach ($dbValue as $dbSubKey => &$dbSubValue) {
			if (getCurrentRecipeId() === $dbSubKey) {
				foreach ($dbSubValue as $dbSubSubKey => &$dbSubSubValue) {
					if ( isset($dbSubValue["photo_name"]) ) {
						unset($recipesDb[$dbKey][getCurrentRecipeId()][getIngredient()]);
						$isPhotoDeleted = 1;
					}
					
					// formatInput($recipesDb[$dbKey][getCurrentRecipeId()][getIngredient()]);
					if (!getCurrentRecipeId() === $dbSubKey) {
						echo getCurrentRecipeId() . "delted";
					}
					
					
					// $isPhotoDeleted = 1;
					
				}

			}
			// echo getCurrentRecipeId();
			// formatInput( $recipesDb[$dbKey][getCurrentRecipeId()]);

		} 
	}

	$recipeJSON = json_encode($recipesDb);
	file_put_contents("./database/recipes/recipe-database.json", $recipeJSON);
}

function deletePhoto() {
	if (deleteDbItem()) {
		return "hidePhoto";
	}
	// return "showPhoto";
	return "hidePhoto";
}

function checkDatabaseForId() {

}

function matchIdToRecipe() {
	foreach (decodeRecipeDb() as $dbKey => $dbValue) {
		// formatInput($dbValue);
		foreach ($dbValue as $dbSubKey => $dbSubValue) {
			// formatInput($dbSubValue);
			if ($dbSubKey === getCurrentRecipeId()) {
				return getIngredient();
			}
		}
	}

	// formatInput(decodeRecipeDb()[$dbKey]);
}

function updateRecipeValue() {
	/*
	- click update on details page

	- bring user to page with custom label and input. the input and label attributes are interpolated from the ingredient key in $_GET superglobal
	- upon page submission get value from the form
	- loop over database
	- find key that matches the $_GET superglobal
	- make sure db id matches $_GET id
	- update the value of the matching key with the newly submitted value from the $_POST superglobal
	- encode updates array as JSON
	- put in database
	- return updated value
	*/ 
	$recipesDb = decodeRecipeDb();
	foreach ($recipesDb as $dbKey => &$dbValue) {
		foreach ($dbValue as $dbSubKey => &$dbSubValue) {
			if (getCurrentRecipeId() === $dbSubKey) {
				switch (getIngredient()) {
					case "recipe_name":
						$dbSubValue[getIngredient()] = getRecipes()["recipe_name"] ?? null;
						break;
					
					case "flour":
						$dbSubValue[getIngredient()] = getRecipes()["flour"] ?? null;
						break;

					case "salt":
						$dbSubValue[getIngredient()] = getRecipes()["salt"] ?? null;
						break;

					case "water":
						$dbSubValue[getIngredient()] = getRecipes()["water"] ?? null;
						break;

					case "yeast":
						$dbSubValue[getIngredient()] = getRecipes()["yeast"] ?? null;
						break;

					case "photo_name":
						$dbSubValue[getIngredient()] = getPhotoName() ?? null;
						break;
				}
			}
		}
	}
	$dbAsJSON = json_encode($recipesDb);
	file_put_contents("./database/recipes/recipe-database.json", $dbAsJSON);
}

function outputUpdatedRecipeValue() {
	return sanitizeInput($_POST[$_GET["ingredient"]] ?? null);
}

function checkDbEmptyValues() {
	foreach (decodeRecipeDb() as $dbKey => $dbValue) {
		// formatInput($dbValue);
		foreach ($dbValue as $dbSubKey => $dbSubValue) {
			// formatInput($dbSubValue);
			// if (count($dbSubValue) === 0) {
			// 	echo "emptyy!!";
			// 	return "hideItem";
			// }
		}
	}
	return "";
}




