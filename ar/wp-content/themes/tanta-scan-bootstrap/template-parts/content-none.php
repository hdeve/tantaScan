<section class="no-results not-found mb-12">
	<header class="page-header text-center">
		<h1 class="page-title text-2xl font-bold mb-4"><?php esc_html_e( 'Nothing Found', 'tanta-scan-bootstrap' ); ?></h1>
	</header>

	<div class="page-content">
		<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				?>
				<p class="mb-4"><?php esc_html_e( 'Ready to publish your first post? Get started here:', 'tanta-scan-bootstrap' ); ?></p>
				<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Write your first post', 'tanta-scan-bootstrap' ); ?></a>

				<?php

			elseif ( is_search() ) :

				?>
				<p class="mb-4"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tanta-scan-bootstrap' ); ?></p>
				<?php
				get_search_form();

			else :

				?>
				<p class="mb-4"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tanta-scan-bootstrap' ); ?></p>
				<?php
				get_search_form();

			endif;
		?>
	</div>
</section>