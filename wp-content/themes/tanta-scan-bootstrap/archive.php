<?php
get_header();
?>

<main class="container mx-auto px-4 py-8 max-w-5xl">
	<?php if ( have_posts() ) : ?>
		<header class="page-header mb-8">
			<h1 class="page-title text-2xl font-bold mb-4">
				<?php
					if ( is_category() ) :
						single_cat_title();
					elseif ( is_tag() )	single_tag_title();
					elseif ( is_author() ) :
						printf( esc_html__( 'All posts by %s', 'tanta-single_author() );
					elseif ( is_day() ) :
						printf( esc_html__( 'Day: %s', 'tanta-scan-bootstrap' ), get_the_date() );
					elseif ( is_month() ) :
						printf( esc_html__( 'Month: %s', 'tanta-scan-bootstrap' ), get_the_date( 'F Y' ) );
					elseif ( is_year() ) :
						printf( esc_html__( 'Year: %s', 'tanta-scan-bootstrap' ), get_the_date( 'Y' ) );
					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						esc_html_e( 'Asides', 'tanta-scan-bootstrap' );
					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						esc_html_e( 'Galleries', 'tanta-scan-bootstrap' );
					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						esc_html_e( 'Images', 'tanta-scan-bootstrap' );
					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						esc_html_e( 'Videos', 'tanta-scan-bootstrap' );
					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						esc_html_e( 'Quotes', 'tanta-scan-bootstrap' );
					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						esc_html_e( 'Links', 'tanta-scan-bootstrap' );
					else :
						esc_html_e( 'Archives', 'tanta-scan-bootstrap' );
					endif;
				?>
			</h1>

			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description mb-4">%s</div>', $term_description );
				endif;
			?>
		</header>

		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content' );

			endwhile;

			// Previous/next page navigation.
			tanta_scan_bootstrap_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
	?>
</main>

<?php
get_footer();
?>