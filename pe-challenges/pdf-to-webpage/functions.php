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
	echo "<ul class='pod-roles-list'>";
	foreach ($jsonToArr ?? [] as $role => $desc) {
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

function getQuestions() {
	return file_get_contents("./data/questions.json");
}

function templateHours() {
	$json = getHours();
	$jsonToArr = json_decode($json, true);
	echo "<ul class='hours-list'>";

	foreach ($jsonToArr ?? [] as $topArr) {
		echo "<li>" . "<hours-card>";
		foreach ($topArr as $key => $value) {
			$title = "<h2> $key </h2>";

			echo $title;

			foreach ($value ?? [] as $thirdArrKey => $thirdArrValue) {
				// formatData($thirdArrValue);
				foreach ($thirdArrValue as $fourthArrKey => $fourthArrValue) {
					echo "<div class='tribe-details'>" . 
					 "<h2>" . $fourthArrKey . "</h2>" . 
					 "<p>" . $fourthArrValue . "</p>".
					"</div>";
				}
			}
		}
		echo "</hours-card>" . "</li>";
	}
	echo "</ul>";
}

function templateQuestions() {
	$json = getQuestions();
	$jsonToArr = json_decode($json, true);
	echo "<h2>" . ($jsonToArr['desc'] ?? null . "</h2>");
	echo "<ol class='question-list'>";
	// echo "<li>";
	foreach ($jsonToArr ?? [] as $firstKey => $firstValue) {
		// echo "<p>" . ($firstValue["desc"] ?? "") . "</p>";
		
		foreach ($firstValue as $secondKey => $secondValue) {
			
			if (gettype($secondValue) !== "string") {
				foreach ($secondValue as $thirdKey => $thirdValue) {
					foreach ($thirdValue as $fourthKey => $fourthValue) {
						echo "<li>" . $fourthValue . "</li>";
					}
				}
			}

		}
		// echo "</li>";
	}
	
echo "</ol>";
	
}


