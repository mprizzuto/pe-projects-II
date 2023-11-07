<?php 

function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function getPage() {
  return $_GET["page"] ?? null;
}

function getEmployeeDBAsArray() {
  $employeesDb =  file_get_contents("../private/database/employees.json");

  return json_decode($employeesDb, true) ?? [];
}

function showEmployees() {
  echo "<ul>";
  foreach (getEmployeeDBAsArray() as $key => $value) {
    echo "<li>" . ($value["name"] ?? null) . "</li>";
  }
  echo "</ul>";
}

function countEmployees() {
  return count(getEmployeeDBAsArray());
}

function removeEmployeeFromDB($employee) {
  /*
  loop over array
  */
  $isDeleted = null;
  $dbFilePath = "../private/database/employees.json";
  $dbAsArr = getEmployeeDBAsArray();

  foreach ($dbAsArr as $key => &$value) {
    if (strtolower($value["name"] ?? "") === strtolower($employee)) {
      unset($value["name"]);
      $isDeleted += true;
    }
    if (count($value) == 0) {
      unset($dbAsArr[$key]);
    }
    else {
      $isDeleted += false;
    }
  }
  $dbString = json_encode($dbAsArr);
  file_put_contents($dbFilePath, $dbString);
  return $isDeleted;
}

function isArrayEmpty(array $element) {
  if ( count($element) === 0 ) {
    unset($element);
  }
}





