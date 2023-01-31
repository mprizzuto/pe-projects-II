<?php function generateNavLinks(array $array) { ?>
	<?= "<ul class='page-list'>" ?>

	<?php foreach ($array as $linkText => $queryString): ?>
		<?="<a href='$queryString'>$linkText</a>" ?>

	<?php endforeach; ?>
	<?= "</ul>" ?>
<?php } ?>


<?php 
	function formatInput(array $arr) {
		echo "<pre>";
			var_dump($arr);
		echo "</pre>";
	}

	function is_set($var) {
		return isset($var) ? "true" : "false";  
		//a human-readable isset(), instead of returning 1 for true/ nothing for false.. ,
	}
?>