<h2>detail page for</h2>

<?php 
echo matchIdToRecipe();
?>

<nav>
	<ul class="action-list">
		<li>
			<a href="?page=update&id=<?=getCurrentRecipeId()?>">update</a>
		</li>
		<li>
			<a href="?page=delete&id=<?=getCurrentRecipeId()?>">delete</a>
		</li>
	</ul>
</nav>