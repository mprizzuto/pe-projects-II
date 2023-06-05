<h2>detail page for</h2>

<?php 


if (getRecipeDatabaseIds()) {
  echo sanitizeInput(matchIdToRecipe());
}
else {
	echo "invalid id!";
}
?>

<nav>
	<ul class="action-list">
		<li>
			<a href="?page=update&ingredient=<?=$_GET["ingredient"]?>&id=<?=getCurrentRecipeId()?>">update</a>
		</li>
		<li>
			<a href="?page=delete&ingredient=<?=$_GET["ingredient"]?>&id=<?=getCurrentRecipeId()?>">delete</a>
		</li>
	</ul>
</nav>