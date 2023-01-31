<?php 

	// function generateNavLinks(array $array) {
	// 	foreach ($array as $linkText => $queryString) {
	// 		echo <<<HEREDOC
	// 		it ran
	// 		<ul class="page-list">
	// 			<li>
	// 				<a href="$queryString">$linkText</a>
	// 			</li>

	// 			<li>
	// 				<a href="$queryString">$linkText</a>
	// 			</li>

	// 			<li>
	// 				<a href="$queryString">$linkText</a>
	// 			</li>
	// 		</ul>
	// 		HEREDOC;
	// 	}
	// }
?>

<?php function generateNavLinks(array $array) { ?>
	<?= "<ul class='page-list'>" ?>

	<?php foreach ($array as $linkText => $queryString): ?>
		<?="<a href='$queryString'>$linkText</a>" ?>

	<?php endforeach; ?>
	<?= "</ul>" ?>
<?php } ?>