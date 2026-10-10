<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-6">
		<?php the_title( '<h1 class="entry-title text-2xl font-bold mb-4">', '</h1>' ); ?>
	</header>

	<div class="entry-content prose prose-sm max-w-none">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tanta-scan-bootstrap' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<?php
		if ( get_edit_post_link() ) :
			?>
			<footer class="entry-footer mt-6">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post. Only visible to screen readers */
							esc_html__( 'Edit %s', 'tanta-scan-bootstrap' ),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer>
			<?php
		endif;
	?>
</article>