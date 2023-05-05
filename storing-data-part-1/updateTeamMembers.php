<?php
function updateTeamMember(&$teamMembers, $id, $name, $slug) {
	$teamMembers[$id] = ["name" => $name, "slug" => $slug];
}

?>