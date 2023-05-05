<?php 
function removeTeamMember(&$teamMembers, $id) {
	unset($teamMembers[$id]);
}

removeTeamMember($teamMembers, "a345");
?>