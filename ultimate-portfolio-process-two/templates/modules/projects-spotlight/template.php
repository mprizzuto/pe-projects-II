<?php 

$heading = $heading ?? "my favorite projects";
$projects = [
	[
		"title" => "project title apple",
		"teaser" => "example teaser",
		"linkText" => "visit me",
		"url" => "#",
	],
	[
		"title" => "project title bananna",
		"teaser" => "example teaser",
		"linkText" => "visit me",
		"url" => "#",
	],
	[
		"title" => "project title carrot",
		"teaser" => "example teaser",
		"linkText" => "visit me",
		"url" => "#",
	]

];

 ?>

<projects-spotlight>
	<h2 class="attention-voice"><?=$heading?></h2>

	<ul class="project-list">
		<?php foreach($projects as $project) { ?>

		<li class="project">
			<?php include "templates/components/project-card/template.php"; ?>
		</li>
		<?php } ?>
	</ul>
</projects-spotlight>