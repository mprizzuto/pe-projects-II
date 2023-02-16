<section>
	<things-grid>
			<?=$sections["heading"]?>

		<ul>
			<?php foreach ($sections["items"] as $item) { ?>
				<li>
					<h3><?=$item["title"]?></h3>
					<p><?=$item["copy"]?></p>
				</li>
			<?php } ?>
		</ul>
	</things-grid>
</section>