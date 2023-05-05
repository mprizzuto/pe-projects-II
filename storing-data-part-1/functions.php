<?php 
	@include "createTeamMember.php";
	@include "readTeamMember.php";
	@include "updateTeamMembers.php";
	@include "removeTeamMember.php";
?>

<?php
function formatVar($var) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}
?>