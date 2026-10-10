<?php
get_header();
?>

<main class="container mx-auto px-4 py-16 max-w-5xl">
	<section class="error-404 not-found text-center mb-12">
		<header class="page-header">
			<h1 class="page-title text-3xl font-bold mb-6"><?php esc_html_e( 'Page Not Found', 'tanta-scan-bootstrap' ); ?></h1>
		</header>

		<div class="page-content">
			<p class="mb-6"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'tanta-scan-bootstrap' ); ?></p>

			<?php get_search_form(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
?>