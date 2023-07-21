<?php

function formatData($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function templateRoles() {
	$json = getRoles();
	$jsonToArr = json_decode($json, true);
	formatData($jsonToArr);
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
