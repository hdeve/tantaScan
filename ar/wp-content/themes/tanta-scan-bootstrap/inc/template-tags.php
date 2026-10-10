<?php
if ( ! function_exists( 'tanta_scan_bootstrap_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tanta_scan_bootstrap_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html__( 'Posted on %s', 'tanta-scan-bootstrap' ),
		'<span class="posted-on">' . $time_string . '</span>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html__( 'by %s', 'tanta-scan-bootstrap' ),
		'<span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'tanta_scan_bootstrap_the_posts_navigation' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 */
function tanta_scan_bootstrap_the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'tanta-scan-bootstrap' ); ?></h2>
		<div class="nav-links flex justify-between">
			<div class="nav-previous">
				<?php
				next_posts_link( '%link', '<span class="meta-nav">&larr;</span> ' . esc_html__( 'Older posts', 'tanta-scan-bootstrap' ) );
				?>
			</div>
			<div class="nav-next">
				<?php
				previous_posts_link( '%link', esc_html__( 'Newer posts', 'tanta-scan-bootstrap' ) . ' <span class="meta-nav">&rarr;</span>' );
				?>
			</div>
		</div>
	</nav>
	<?php
}
endif;