<?php


if (!file_get_contents("./database/recipes/recipe-database.json")) {
  echo "no data!";
} else {
  foreach (getRecipeDB() as $firstKey => $firstValue) {
    foreach ($firstValue as $secondKey => $secondValue) { 
      echo "<ul>";
      foreach ($secondValue as $thirdKey => $thirdValue) {
        echo "<li>" . sanitizeInput($thirdValue["post"]["recipe_name"]) . "</li>";
        echo "<li>" . $thirdValue["post"]["flour"] . "</li>";
        echo "<li>" . $thirdValue["post"]["salt"] . "</li>";
        echo "<li>" .  $thirdValue["post"]["water"] . "</li>";
        echo "<li>" . $thirdValue["post"]["yeast"] . "</li>";
        echo "<li>" . "<a href=?page=detail&id=$secondKey>" . "detail" . "</a>" . "</li>";
        /*
        loop over files array to get the name of 
        if $thirdValue['imageName'] matches 
        */ 

        // echo "<li>" . "<picture>" .
        // "<img src='./uploads/{$thirdValue['imageName']}'>" .
        //  "</picture>" . "</li>";
        echo "<li>" . generateRecipePhoto($thirdValue['imageName']) . "</li>";
      }
      echo "</ul>";
    }
  }
}

// formatInput(getRecipePhotos());
// databaseUploadsCheck();


?>