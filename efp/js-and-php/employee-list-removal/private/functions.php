<?php 

function formatInput($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function getPage() {
  return $_GET["page"] ?? null;
}

function getEmployeeDB() {
  return "./database/employees.json";
}

function removeEmployeeFromDB() {
  formatInput(getEmployeeDB());
}