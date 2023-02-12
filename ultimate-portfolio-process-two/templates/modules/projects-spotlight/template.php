<?php 
$projects = [1,2,3];

 ?>

<projects-spotlight>
	<h2 class="attention-voice">My latest projects</h2>

	<ul class="project-list">
		<?php foreach($projects as $project) { ?>

		<li class="project">
			<?php include "templates/components/project-card/template.php"; ?>
		</li>
		<?php } ?>
	</ul>
</projects-spotlight>