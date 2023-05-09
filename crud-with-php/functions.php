<?php 
function formatInput($var) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

function sanitizeInput($input) {
	$result = stripcslashes($input);
	$result = htmlspecialchars($input);
	return trim($result);
}

function getPage() {
	return $_GET["page"] ?? null;
}

function getId() {
	return $_GET["id"] ?? null;
}

function isLegalPage() {
	$pages = [null, "create", "read", "update", "delete", "detail", ""];
	return in_array(getPage(), $pages);
}

function generatePage() {
	switch (getPage()) {
		case "create":
			include "./pages/create.php";
			break;

		case "read":
			include "./pages/read.php";
			break;
		
		case "update":
			include "./pages/update.php";
			break;

		case "delete":
			include "./pages/delete.php";
			break;

		case "detail":
			include "./pages/detail.php";
			break;
		
		default:
			include "./pages/read.php";
	}
}

function getToDo() {
	return $_POST["to-do"] ?? null;
}

function getToDosArr() {
	$todos = getToDoDB();
	$todosEncoded = json_encode($todos);

	$todosArr = json_decode($todos, true);
	return $todosArr;
}

function getToDoDB() {
	return file_get_contents("todo-database.json");
}

function decodeJSONAsArray() {
	return json_decode(getToDoDB(), true);
}

function isLegalId($id, $data) {
  foreach ($data as $item) {
    foreach ($item["id"] as $key => $value) {
      if ($key === $id) {
          return true;
      }
    }
  }
  return false;
}

function returnCurrentId($id, $data) {
  foreach ($data ?? [] as $item) {
    foreach ($item["id"] as $key => $value) {
      if ($key === $id) {
        return $id;
      }
    }
  }
  return false;
}

function returnCurrentToDo($id, $data) {
  foreach ($data ?? [] as $item) {
    foreach ($item["id"] as $key => $value) {
      if ($key === $id) {
      	return $value;
        // return $key;
      }
    }
  }
  echo "no todo found";
  return false;
}

function updateToDoDb($id) {
    $data = decodeJSONAsArray();
    foreach ($data ?? [] as $key => $value) {
	    foreach ($value as $subKey => $subValue) {
	      foreach ($subValue as $subSubKey => $subSubValue) {
	        if ($id === $subSubKey) {
	            $data[$key][$subKey][$subSubKey] = sanitizeInput($_POST["to-do"] ?? null);
	        }
	      }
	    }
    }
    file_put_contents('todo-database.json', json_encode($data));
    return $data;
}


function deleteToDoFromDb($id, $data) {
	foreach ($data as $item) {
    foreach ($item["id"] as $key => $value) {
      if ($key === $id) {
        unset($key);
      }
    }
  }
  	return false;
}

// formatInput(decodeJSONAsArray());


function writeToDoDB() {
	$todoDBDecoded = decodeJSONAsArray();
	$todoDBDecoded[] = [
		"id" => [getUniqId() => sanitizeInput($_POST["to-do"] ?? null)],
	];
	$todoJSON = json_encode($todoDBDecoded);
	file_put_contents("todo-database.json", $todoJSON);
	// $_POST["to-do"] = "";
}


function templateToDoHTML() {
	echo "<ul class='id-list'>";
	foreach (decodeJSONAsArray() ?? [] as $key ) {
		// echo "<li>" . $value . "</li>";
		// formatInput($value["id"]);
		// formatInput(decodeJSONAsArray());
		// echo "<li>" . $key["id"] . "<a href=?page=detail&id=" . $key["id"] . ">". "detail" . "</a>" . "</li>";
		foreach ($key as $subKey => $subValue) {
			foreach ($subValue as $subSubKey => $subSubValue) {
				 echo "<li>" . "uniqueId:" .  $subSubKey . "</li>" 
				 . "<li>" . 
				 			"<ul>" 
				 				. "<li>" . "todo: " . $subSubValue . "</li>"
				 				. "<li>" . "<a href=?page=detail&id=$subSubKey" . ">" . "detail" . "</a>" . "</li>" 
				 			. "</ul>" . "</li>";
			}
		}
	}
	echo "</ul>";
}



function getUniqId() {
	return uniqid();
}

?>


