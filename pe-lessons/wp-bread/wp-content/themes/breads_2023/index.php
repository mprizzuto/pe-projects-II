<?php 
echo "<a href='/'>Home</a>";
if ( is_page("bread-list") ) {

	include "bread-list.php";
}

if (is_singular("bread")) {
	the_field("Name");

	include "./partials/bread-detail.php";
}
?>