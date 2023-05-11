<h2><mark>read</mark></h2>

<?php
// formatInput(returnCurrentToDo(getId(), getId()));
	$doTodosExist = false;

	foreach (getToDosArr() ?? [] as $key => $value) {
		// formatInput($value);
		foreach ($value as $subKey => $subValue) {
			// formatInput($subValue);
			if (count($subValue) > 0) {
				$doTodosExist = true;
			}
		}
	}

	if ($doTodosExist) {
		templateToDoHTML();
	} 
	else {
		echo "no todos found";
	}

	

?>