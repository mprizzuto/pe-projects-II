<?php 

?>

<h2>detail page for <?php echo strlen(returnCurrentToDo(getId(), decodeJSONAsArray()) )  === 0 ? "empty to do" : ""?></h2>
<?php
 
if ( isLegalId(getId(),decodeJSONAsArray()) ) {

	// echo "<p>" . "id:" . getId() . "</p>";
	echo "<p>" . "<strong>" .sanitizeInput(returnCurrentToDo(getId(), decodeJSONAsArray())) . "</strong>" . "</p>";
}
else {
	echo "invalid id.";
}

?>
<!-- <?=returnCurrentId(getId(), getToDosArr())?> -->
<nav>
	<a href="?page=update&id=<?=returnCurrentId(getId(), getToDosArr())?>">update</a>
	<a href="?page=delete&id=<?=returnCurrentId(getId(), getToDosArr())?>">delete</a>
</nav>