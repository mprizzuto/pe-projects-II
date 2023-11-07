<?php 

$errors = [];

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {

  ["employee-name" => $employeeName] = $_POST;

  if ( strlen(trim($employeeName)) === 0 ) {
   $errors["empty str"] = "you only entered whitespace. enter a valid name";
   $errorMessage = " required!";
  }

  if (preg_match("/[^a-zA-Z\s]/", $employeeName) === 1) {
    $errors["invalid chars"] = "letters only!";
  }

  $errorString = implode(",", $errors);

  
  // formatInput($errors);
  // formatInput($errorString);

  if ( $errorString !== "" ) {
     $userMessage = "<p> <strong>errors found </strong>" . ($errorString ?? null) . "</p>";
    // formatInput($errorString);
  }
}
?>

<form method="POST">
  <?php //$errorMessage = null; ?>
	<div class="fields">
		<label for="employee-name">employee name</label>

		<input id="employee-name" type="text" name="employee-name" required><?=$errorMessage ?? null?>
	</div>

  <button type="submit">check employee</button>
</form>

<p><?=$userMessage ?? null?></p>

