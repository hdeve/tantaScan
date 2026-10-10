<?php
get_header();
?>

<main class="container mx-auto px-4 py-8 max-w-5xl">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		
	?>
	<article class="custom-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header custom-template-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content custom-template-content">
                    <?php
                    // Display the content added in the WordPress editor
                    the_content();
                    
                    // Optional: Pagination for multi-page posts
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

            </article>
            <?php // If comments are open or we have at least one comment, load up the comment template.
		        if ( comments_open() || get_comments_number() ) :
			        comments_template();
		        endif;

	        endwhile; // End of the loop.?>
</main>

<?php
get_footer();
?>