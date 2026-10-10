<?php
/**
 * Tanta Scan Arabic Bootstrap Theme Functions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * It is important to set up these functions before the init hook so that none of these
 * features are lost.
 *
 * @since Tanta Scan Bootstrap 1.0
 */
function tanta_scan_bootstrap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'tanta-scan-bootstrap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the template file, and WordPress will
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/* theme dynamic Logo
	*/
	add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

	/* theme dynamic description
	*/
	add_theme_support( 'custom-desc', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'tanta-scan-bootstrap' ),
		'footer'  => esc_html__( 'Footer Menu', 'tanta-scan-bootstrap' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tanta_scan_bootstrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresher' );
}
add_action( 'after_setup_theme', 'tanta_scan_bootstrap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tanta_scan_bootstrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tanta_scan_bootstrap_content_width', 640 );
}
add_action( 'after_setup_theme', 'tanta_scan_bootstrap_content_width', 0 );

/**
 * Register widget area.
 *
 * @since Tanta Scan Bootstrap 1.0
 */
function tanta_scan_bootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tanta-scan-bootstrap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tanta-scan-bootstrap' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h5">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tanta_scan_bootstrap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tanta_scan_bootstrap_scripts() {
	wp_enqueue_style( 'tanta-scan-bootstrap-style', get_stylesheet_uri() );

	// Bootstrap 5 CSS
	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css', array(), '5.3.0' );

	// Custom styles
	wp_enqueue_style( 'tanta-scan-bootstrap-custom', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );

	// Font Awesome for icons (optional)
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Google Fonts - Cairo
	wp_enqueue_style( 'cairo-font', 'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap', array() );

	wp_enqueue_script( 'tanta-scan-bootstrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Bootstrap 5 JS with Popper
	wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true );

	// Custom JavaScript
	wp_enqueue_script( 'tanta-scan-bootstrap-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'tanta_scan_bootstrap_scripts' );


function register_my_custom_menu() {
    register_nav_menus(
        array(
            'language-menu' => __( 'Language Menu', 'tanta_scan_bootstrap' )
        )
    );
}
add_action( 'init', 'register_my_custom_menu' );

function custom_register_my_cpt_doctors() {
    $labels = array(
        'name'               => 'الأطباء',
        'singular_name'      => 'طبيب',
        'add_new'            => 'إضافة طبيب جديد',
        'add_new_item'       => 'إضافة طبيب جديد',
        'edit_item'          => 'تعديل طبيب',
        'menu_name'          => 'الأطباء'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'thumbnail' ), // Core inputs
        'show_in_rest'       => true, // Enables Gutenberg editor
    );

    register_post_type( 'doctor', $args );

}
add_action( 'init', 'custom_register_my_cpt_doctors' );

// 1. Add the Meta Box container to the editor screen
function custom_add_doctor_meta_box() {
    add_meta_box(
        'doctor_details_box',       // Unique ID
        'تفاصيل الطبيب',           // Box Title
        'custom_render_doctor_fields', // Callback function to output HTML
        'doctor',                   // Post type where it shows
        'normal',                 // Context (where on screen)
        'default'                 // Priority
    );
}
add_action( 'add_meta_boxes', 'custom_add_doctor_meta_box' );

// 2. Render the specific input HTML
function custom_render_doctor_fields( $post ) {
    // Retrieve existing data if it exists
    $name_value = get_post_meta( $post->ID, '_doctor_name', true );
    $phone_value = get_post_meta($post->ID, '_doctor_phone', true);
    $address_value = get_post_meta($post->ID, '_doctor_address',true);
    $job_value = get_post_meta($post->ID, '_doctor_job',true);
    
    // Security Nonce
    wp_nonce_field( 'save_doctor_meta', 'doctor_meta_nonce' );
    

    // Output the custom text input
    echo'<div class="wp-admin-bootstrap">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<label for="doctor_name" style="display:inline-block; width:40px;padding: 0px 25px 0px 25px;">الاسم: </label>';
    echo '<input type="text" id="doctor_name" name="doctor_name" value="' . esc_attr( $name_value ) . '" style="width:100%; max-width:400px;" />';
    // Output the custom text input
    echo '<label for="doctor_phone" style="display:inline-block;width:40px;padding: 0px 25px 0px 25px;">الهاتف: </label>';
    echo '<input type="number" id="doctor_phone" name="doctor_phone" value="' . esc_attr( $phone_value ) . '" style="width:100%; max-width:400px;" />';
    echo '</div></br>';
    // Output the custom text input
    echo '<div class="row">';
    echo '<label for="doctor_address" style="display:inline-block;width:40px;padding: 0px 25px 0px 25px;">العنوان: </label>';
    echo '<input type="text" id="doctor_address" name="doctor_address" value="' . esc_attr( $address_value ) . '" style="width:100%; max-width:400px;" />';
    // Output the custom text input
    echo '<label for="doctor_job" style="display:inline-block;width:40px;padding: 0px 25px 0px 25px;">الوظيفة: </label>';
    echo '<select id="doctor_job" name="doctor_job" value="' . esc_attr( $job_value ) . '" style="width:100%; max-width:400px;">
         <option value="0">Select</option>
         <option value="1">Doctor</option>
         <option value="2">Lab Technical</option>
         <option value="0">Assistant Doctor</option>
         </select>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
}

// 3. Save the input data when the post is published or updated
function custom_save_doctor_meta( $post_id ) {
    // Check security nonce
    if ( ! isset( $_POST['doctor_meta_nonce'] ) || ! wp_verify_nonce( $_POST['doctor_meta_nonce'], 'save_doctor_meta' ) ) {
        return;
    }
    // Check user permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    // Save or update the specific text field
    if ( isset( $_POST['doctor_name'] ) ) {
        update_post_meta( $post_id, '_doctor_name', sanitize_text_field( $_POST['doctor_name'] ) );
    }
    if ( isset( $_POST['doctor_address'] ) ) {
        update_post_meta( $post_id, '_doctor_address', sanitize_text_field( $_POST['doctor_address'] ) );
    }
    if ( isset( $_POST['doctor_phone'] ) ) {
        update_post_meta( $post_id, '_doctor_phone', sanitize_text_field( $_POST['doctor_phone'] ) );
    }
    if ( isset( $_POST['doctor_job'] ) ) {
        update_post_meta( $post_id, '_doctor_job', sanitize_text_field( $_POST['doctor_job'] ) );
    }
}
add_action( 'save_post', 'custom_save_doctor_meta' );





function custom_register_my_cpt_branches()
{
    $labels_branch = array(
        'name'               => 'الفروع',
        'singular_name'      => 'الفرع',
        'add_new'            => 'إضافة فرع جديد',
        'add_new_item'       => 'إضافة فرع جديد',
        'edit_item'          => 'تعديل فرع',
        'menu_name'          => 'الفروع'
    );

    $args_branch = array(
        'labels'             => $labels_branch,
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'thumbnail' ), // Core inputs
        'show_in_rest'       => true, // Enables Gutenberg editor
    );

    register_post_type( 'branch', $args_branch );
}
add_action( 'init', 'custom_register_my_cpt_branches' );

// 1. Add the Meta Box container to the editor screen
function custom_add_branch_meta_box() {
    add_meta_box(
        'branch_details_box',       // Unique ID
        'تفاصيل الفرع',           // Box Title
        'custom_render_branch_fields', // Callback function to output HTML
        'branch',                   // Post type where it shows
        'normal',                 // Context (where on screen)
        'default'                 // Priority
    );
}
add_action( 'add_meta_boxes', 'custom_add_branch_meta_box' );

// 2. Render the specific input HTML
function custom_render_branch_fields( $post ) {
    // Retrieve existing data if it exists
    $name_value = get_post_meta( $post->ID, '_branch_name', true );
    $address_value = get_post_meta($post->ID, '_branch_address',true);
    $phone_value = get_post_meta($post->ID,'_branch_phone',true);
    $mobile_value = get_post_meta($post->ID,'_branch_mobile',true);
    
    // Security Nonce
    wp_nonce_field( 'save_branch_meta', 'branch_meta_nonce' );
    
    // Output the custom text input
    echo'<div class="wp-admin-bootstrap">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<label for="branch_name" style="display: inline-block;width:40px;padding: 0px 25px 0px 25px;">الاسم: </label>';
    echo '<input type="text" id="branch_name" name="branch_name" value="' . esc_attr( $name_value ) . '" style="width:100%; max-width:400px;" />';
    // Output the custom text input
    echo '<label for="branch_address" style="display: inline-block;width:40px;padding: 0px 25px 0px 25px;">العنوان: </label>';
    echo '<input type="text" id="branch_address" name="branch_address" value="' . esc_attr( $address_value ) . '" style="width:100%; max-width:400px;" />';
    echo '</div></br>';
    // Output the custom text input
    echo '<div class="row">';
    echo '<label for="branch_phone" style="display: inline-block;width:40px;padding: 0px 25px 0px 25px;">الهاتف: </label>';
    echo '<input type="number" id="branch_phone" name="branch_phone" value="' . esc_attr( $phone_value ) . '" style="width:100%; max-width:400px;" />';
    // Output the custom text input
    echo '<label for="branch_mobile" style="display: inline-block;width:40px;padding: 0px 25px 0px 25px;">الموبيل: </label>';
    echo '<input type="number" id="branch_mobile" name="branch_mobile" value="' . esc_attr( $mobile_value ) . '" style="width:100%; max-width:400px;" />';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

// 3. Save the input data when the post is published or updated
function custom_save_branch_meta( $post_id ) {
    // Check security nonce
    if ( ! isset( $_POST['branch_meta_nonce'] ) || ! wp_verify_nonce( $_POST['branch_meta_nonce'], 'save_branch_meta' ) ) {
        return;
    }
    // Check user permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    // Save or update the specific text field
    if ( isset( $_POST['branch_name'] ) ) {
        update_post_meta( $post_id, '_branch_name', sanitize_text_field( $_POST['branch_name'] ) );
    }
    if ( isset( $_POST['branch_address'] ) ) {
        update_post_meta( $post_id, '_branch_address', sanitize_text_field( $_POST['branch_address'] ) );
    }
    if ( isset( $_POST['branch_name'] ) ) {
        update_post_meta( $post_id, '_branch_phone', sanitize_text_field( $_POST['branch_phone'] ) );
    }
    if ( isset( $_POST['branch_mobile'] ) ) {
        update_post_meta( $post_id, '_branch_mobile', sanitize_text_field( $_POST['branch_mobile'] ) );
    }
}
add_action( 'save_post', 'custom_save_branch_meta' );



function my_custom_admin_bootstrap_assets( $hook ) {
    // Optional: Only load Bootstrap on your specific plugin/admin page to prevent loading it everywhere
    // if ( $hook != 'toplevel_page_my-custom-plugin' ) { return; }

    // Enqueue the scoped Bootstrap CSS compiled in Step 1
    wp_enqueue_style( 
        'scoped-bootstrap-admin-css', 
        plugins_url( '/css/admin-bootstrap.min.css', __FILE__ ), 
        array(), 
        '5.3.0', 
        'all' 
    );

    // Enqueue Bootstrap's bundled JavaScript (requires jQuery as a dependency if using older versions or scripts)
    wp_enqueue_script( 
        'bootstrap-admin-js', 
        plugins_url( '/js/bootstrap.bundle.min.js', __FILE__ ), 
        array( 'jquery' ), 
        '5.3.0', 
        true 
    );
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_bootstrap_assets' );



function add_custom_lang_query_var( $vars ) {
    $vars[] = 'lang'; // This allows WordPress to recognize ?lang=ar
    return $vars;
}
add_filter( 'query_vars', 'add_custom_lang_query_var' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}