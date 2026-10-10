<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-6">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title text-2xl font-bold mb-4">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title text-xl font-bold mb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta mb-4">
			<?php
				tanta_scan_bootstrap_posted_on();
			?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php
			if ( is_singular() ) :
				the_content();
			else :
				the_excerpt();
			endif;
		?>
	</div>

	<?php
		if ( is_singular() ) :
			wp_link_pages( array(
				'before' => '<div class="page-links mt-6">' . esc_html__( 'Pages:', 'tanta-scan-bootstrap' ),
				'after'  => '</div>',
			) );
		endif;
	?>

	<?php if ( ! is_singular() ) : ?>
	<div class="btn-container mt-6">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary">اقرأ المزيد</a>
	</div>
	<?php endif; ?>
</article>