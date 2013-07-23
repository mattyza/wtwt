<?php
add_action( 'the_post', 'wtwt_the_meta', 10 );

add_action( 'loop_start', 'wtwt_main_wrapper_start', 8 );
add_action( 'get_footer', 'wtwt_main_wrapper_end', 10 );

add_action( 'loop_start', 'wtwt_content_wrapper_start', 10 );
add_action( 'loop_end', 'wtwt_content_wrapper_end', 10 );

add_filter( 'the_title', 'wtwt_maybe_link_titles', 8, 2 );
add_filter( 'the_title', 'wtwt_wrap_titles', 10, 2 );

function wtwt_the_meta () {
	if ( is_singular() && 'post' == get_post_type() ) echo '<div class="meta">' . sprintf( __( 'Posted by %1$s on %2$s', 'wtwt' ), get_the_author(), get_the_date( get_option( 'date_format' ) ) ) . '</div><!--/.meta-->' . "\n";
} // End wtwt_the_meta()

function wtwt_maybe_link_titles ( $title, $id ) {
	if ( ! is_singular() && in_the_loop() )
		$title = '<a href="' . esc_url( get_permalink( $id ) ) . '" title="' . esc_attr( $title ) . '">' . $title . '</a>';

	return $title;
} // End wtwt_maybe_link_titles()

function wtwt_wrap_titles ( $title, $id ) {
	if ( ! in_the_loop() ) return $title;

	if ( is_singular() )
		$tag = 'h1';
	else
		$tag = 'h3';

	return '<' . $tag . '>' . $title . '</' . $tag . '>';
} // End wtwt_wrap_titles()

function wtwt_main_wrapper_start () {
	if ( is_main_query() ) echo '<div id="main">' . "\n";
} // End wtwt_main_wrapper_start()

function wtwt_main_wrapper_end () {
	if ( is_main_query() ) echo '</div><!--/#main-->' . "\n";
} // End wtwt_main_wrapper_end()

function wtwt_content_wrapper_start () {
	if ( is_main_query() ) echo '<div id="content">' . "\n";
} // End wtwt_content_wrapper_start()

function wtwt_content_wrapper_end () {
	if ( is_main_query() ) echo '</div><!--/#content-->' . "\n";
} // End wtwt_content_wrapper_end()
?>