<?php

function formatData($input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function templateRules(array $rules) {
	$jsonDecoded = jsonToAssArray($rules);

	formatData($rules);
}

function templateHours(array $hours) {
	$jsonDecoded = jsonToAssArray($hours);
}

function jsonToAssArray($json) {
	return json_decode($json, true) ?? [];
}