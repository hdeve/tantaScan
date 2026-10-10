<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<!-- BEGIN: TopBar -->
	<div class="bg-white py-2 px-4 shadow-sm" data-purpose="top-bar">
	<div class="container mx-auto flex justify-between items-center max-w-7xl">
	
	<div class="flex items-center main-header">
	<!-- Logo Placeholder -->
	<?php 
    // 1. Display the Dynamic Logo if it exists
	$description = get_bloginfo( 'description', 'display' );

    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();

		// Fallback: Show the Site Title text if no logo is uploaded
        if ( is_front_page() && is_home() ) : ?>
        <div class="text-primary font-bold text-2xl text-center leading-tight">
            <h1 class="">
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
               </a>
		       
			</h1>
	        <span class="text-xl font-normal">
			   <?php // 2. Display the Dynamic Site Tagline (Description)    
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
			   <?php endif; ?>
			</span>
	    </div>    
		
        <?php else : ?>
		<div class="text-primary font-bold text-2xl text-center leading-tight">
           <p class="">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
           </p>
	       <span class="text-xl font-normal">
			   <?php // 2. Display the Dynamic Site Tagline (Description)    
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
			   <?php endif; ?>
			</span>
	
	     </div>
            
        <?php endif;
    } else {
        // Fallback: Show the Site Title text if no logo is uploaded
        if ( is_front_page() && is_home() ) : ?>
        <div class="text-primary font-bold text-2xl text-center leading-tight">
            <h1 class="">
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
               </a>
			</h1>
	        <span class="text-xl font-normal">
			   <?php // 2. Display the Dynamic Site Tagline (Description)    
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
			   <?php endif; ?>
			</span>
	    </div>    
		
        <?php else : ?>
		<div class="text-primary font-bold text-2xl text-center leading-tight">
           <p class="">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
           </p>
	       <span class="text-xl font-normal">
			   <?php // 2. Display the Dynamic Site Tagline (Description)    
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php _e($description, 'tanta-scan-bootstrap')?></p>
			   <?php endif; ?>
			</span>
	
	     </div>
            
        <?php endif;
    }

    ?>
	</div>
	<div class="flex items-center gap-2">
	<?php
		if ( has_nav_menu( 'language-menu' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'language-menu',
				'container'      => 'nav',
				'container_class'=> 'site-navigation',
				'menu_class'     => 'header-menu-list'
			) );
		}
		?>
	</div>
	</div>
	</div>
	<!-- END: TopBar -->
	<!-- BEGIN: MainNav -->
	<nav class="bg-[#2980b9] text-white shadow-md primary-navigation" data-purpose="main-navigation">
	<div class="container mx-auto px-4 max-w-7xl">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'flex flex-wrap justify-center gap-6 py-3 text-sm font-semibold',
			'container'      => false,
			'echo'           => true,
			'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
			'link_before'    => '<span>',
			'link_after'     => '</span>',
		) );
		?>
	</div>
	</nav>
	<!-- END: MainNav -->