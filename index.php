<?php
get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_title();
		( is_singular() ) ? the_content() : the_excerpt(); // Full content on single entries, excerpt in archives.
		wp_link_pages();
		if ( is_singular() ) {
			comments_template();
		}
	}
}
get_sidebar();
get_footer();
?>