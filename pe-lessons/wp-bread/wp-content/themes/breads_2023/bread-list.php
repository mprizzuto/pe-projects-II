<?php

$the_filter = new WP_Query( [
	"post_type" => "bread"
] );

// The Loop.
if ( $the_filter->have_posts() ) {
	echo '<ul>';
	while ( $the_filter->have_posts() ) {
		$the_filter->the_post();
		echo '<li>';
			include "bread-card.php";
		echo '</li>';
	}
	echo '</ul>';
} else {
	esc_html_e( 'Sorry, no posts matched your criteria.' );
}
// Restore original Post Data.
wp_reset_postdata();
