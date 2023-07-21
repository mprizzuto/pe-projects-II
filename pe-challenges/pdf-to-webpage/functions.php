<?php

function formatData($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function templateRoles() {
	$json = getRoles();
	$jsonToArr = json_decode($json, true);
	// formatData($jsonToArr);
	echo "<ul>";
	foreach ($jsonToArr as $role => $desc) {
		foreach ($desc as $roleValue => $descValue) {
			$heading = "<h2>$roleValue</h2>";
			$para = "<p>$descValue</p>";
			echo "<li> <role-block>" . $heading . $para . "</role-block> </li>";
		}
		

		
	}
	echo "</ul>";
}

function getRoles() {
	return file_get_contents("./data/roles.json");
}

function getHours() {
	return file_get_contents("./data/hours.json");
}

function templateHours() {
	$json = getHours();
	$jsonToArr = json_decode($json, true);
	formatData($jsonToArr);
}
