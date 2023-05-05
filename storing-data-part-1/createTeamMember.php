<?php 
function createTeamMember(&$teamMembers, $id, $name, $slug) {
	$teamMembers[$id] = ["name" => $name, "slug"=> $slug];
}

createTeamMember($teamMembers, "d734", "jimbo", "jimbo543");
createTeamMember($teamMembers, "e533", "brian", "brian46");
createTeamMember($teamMembers, "c432", "ivy", "ivyMeow");
?>