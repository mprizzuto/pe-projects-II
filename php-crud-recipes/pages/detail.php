<h2>detail page for</h2>

<?php 
if (checkDatabaseForId()) {
	echo sanitizeInput(checkDatabaseForId());
}
if (checkDatabaseForId() === false) {
	//getRecipeId() === null|| 
	echo "invalid id";
}
// echo checkDatabaseForId();
?>

<nav>
	<ul class="action-list">
		<li>
			<a href="?page=update&id=<?=getRecipeId()?>">update</a>
		</li>
		<li>
			<a href="?page=delete&id=<?=getRecipeId()?>">delete</a>
		</li>
	</ul>
</nav>