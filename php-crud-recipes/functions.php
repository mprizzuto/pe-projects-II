<?php
function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function getPage() {
	return $_GET["page"] ?? null;
}

function uploadImages() {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["recipe-photo"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
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

function decodeRecipeDb() {
	return json_decode(getRecipeDb(), true);
}

function getRecipes() {
	unset($_POST["submit"]);
	return $_POST ?? null;
}

function addRecipeToDb() {
  $todoDb = decodeRecipeDb() ?? [];
  $recipe = getRecipes();
  $recipe['photo_name'] = getPhotoName();
  $todoDb[] = [getUniqueId() => $recipe];

  $todoDbJSON = json_encode($todoDb);

  file_put_contents("./database/recipes/recipe-database.json", $todoDbJSON);
}


function getUniqueId() {
	return uniqid();
}

function generateRecipeList() {
	echo "<ul>";
	foreach (decodeRecipeDb() as $recipeKey => $recipeValue) {
		foreach ($recipeValue as $recipeSubKey => $recipeSubValue) {
			
			foreach ($recipeSubValue as $recipeSubSubKey => $recipeSubSubValue) {
				// formatInput($recipeSubSubKey);
				// echo "<li>" . $recipeSubSubKey . " " . $recipeSubSubValue . "</li>";
				
				// if (isset($recipeSubSubKey[0])) {
				// 	continue;
				// }
				// formatInput($recipeSubSubKey);
				if ($recipeSubSubKey === "photo_name") {
					continue;
				}
				echo "<li>" . "<strong>" .$recipeSubSubKey . "</strong>" . ": " . sanitizeInput($recipeSubSubValue) . "<a href=?page=detail&id=>" . "detail" . "</a>" . "<a href=?page=update&id=>" . " update" . "</a>" . "</li>";
				 	// formatInput($recipeSubSubValue);
				 	// foreach ($recipeSubSubKey as $tripleSubKey => $tripleSubValue) {
				 	// 	formatInput($tripleSubKey);
				 	// }
				 	// formatInput($recipeSubSubKey);
			}
		
		}
	}
	echo "</ul>";
}

function getRecipeDatabaseIds() {
	/* get database
	if decodeRecipeDb()
		loop over database
		return array of IDs as strings
	*/ 

}


function getPhotoName() {
	// $files = $_FILES["recipe-photo"]["name"];
	return $_FILES["recipe-photo"]["name"];
}

function sanitizeInput($input) {
	$removeHTML = htmlspecialchars($input);
	$removeSlashes = stripslashes($removeHTML);
	return $removeSlashes;

}



