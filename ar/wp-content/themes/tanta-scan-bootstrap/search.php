<?php
get_header();
?>

<main class="container mx-auto px-4 py-8 max-w-5xl">
	<?php if ( have_posts() ) : ?>

		<header class="page-header mb-8">
			<h1 class="page-title text-2xl font-bold mb-4">
				<?php
					printf(
						/* translators: %s: search query. */
						esc_html__( 'Search Results for: %s', 'tanta-scan-bootstrap' ),
						'<span class="text-accent">' . esc_html( get_search_query() ) . '</span>'
					);
				?>
			</h1>
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