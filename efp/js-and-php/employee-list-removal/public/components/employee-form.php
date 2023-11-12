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

  if ( $errorString !== "") {
    $userMessage = "<p> <strong>errors found </strong>" . ($errorString ?? null) . "</p>";
  }

}
?>

<section class="efp-employee-delete">
  <inner-column>
    <h2>delete an employee</h2>

    <p>enter the name of an employee to remove</p>

    <form id="efp-employee-form" method="POST">
      <?php //$errorMessage = null; ?>
      <div class="fields">
        <label for="employee-name">employee name</label>

        <input id="employee-name" type="text" name="employee-name" required><?=$errorMessage ?? null?><span id="error-message"></span>
      </div>

      <button type="submit">check employee</button>
    </form>
  </inner-column>
</section>

<p><?=$userMessage ?? null?></p>

<?php  
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ( removeEmployeeFromDB($employeeName) ) {
    echo "name deleted";
  }
  if ( !removeEmployeeFromDB($employeeName) && 
    strlen($errorString) === 0 ) {
    echo "<p id='validation-error'>Name not found. check for spelling and extra whitespace</p>";
  }
}
?>




