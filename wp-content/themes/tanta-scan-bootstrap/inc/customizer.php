<?php
/**
 * Customizer additions for Tanta Scan Bootstrap Theme.
 */

 add_action( 'customize_register', 'tanta_scan_bootstrap_customize_register' );

function tanta_scan_bootstrap_customize_register( $wp_customize ) {
	// Add custom CSS for live preview
	add_action( 'customize_preview_init', 'tanta_scan_bootstrap_customize_preview' );
}


function tanta_scan_bootstrap_customize_preview() {
	wp_enqueue_style( 'tanta-scan-bootstrap-customizer-preview', get_template_directory_uri() . '/css/customizer-preview.css', array(), _S_VERSION );
}

