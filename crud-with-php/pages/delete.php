<?php 
if (returnCurrentId(getId(), decodeJSONAsArray()) === false) {
	echo returnCurrentToDo(getId(), decodeJSONAsArray());
}
if (isLegalId(getId(), decodeJSONAsArray()) === false) {
	echo returnCurrentToDo(getId(), decodeJSONAsArray()) . "item already deleted";
}
else {
	echo returnCurrentToDo(getId(), decodeJSONAsArray()) . " deleted";
	deleteToDoFromDb(getId(), decodeJSONAsArray());	
}

?>