<?php
/**
 * Template Name: Tanta Custom Page
 * Description: A clean, full-width custom page template.
 */

// Include the standard theme header
get_header(); 
?>

<div id="primary" class="content-area custom-template-container">
    <main id="main" class="site-main" role="main">
       <div class="bg-white p-4 border rounded-4 m-4 shadow-sm border border-t-0 border-gray-200 relative flex items-center">
        <?php
        // Start the standard WordPress Loop to fetch content
        while ( have_posts() ) :
            the_post();
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

            <?php
            // Optional: If you want to allow comments on this template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
        </div>
    </main>
</div>

<?php
// Include the standard theme footer
get_footer(); 