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
    echo "<li>" . $value["name"] . "</li>";
  }
  echo "</ul>";
}

function countEmployees() {
  return count(getEmployeeDBAsArray());
}

function removeEmployeeFromDB() {
  formatInput(getEmployeeDBAsArray());
}