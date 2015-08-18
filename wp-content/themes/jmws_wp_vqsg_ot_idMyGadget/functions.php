<?php
/**
 * Functions and other WP code that helps make this theme what it is and do what it does.
 * Adding code to support device detction
 *
 * @author Tom W. Hartung, using the Visual Quick Start Guide's "our-theme" as a starting point
 * @package jmws_wp_vqsg_fs_idMyGadget
 * @since 1.0
 */
add_action( 'widgets_init', 'my_sidebar' );

function my_sidebar() {

/* Register the 'primary' sidebar */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'This is the primary sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}

/**
 * This is the proper way to enqueue scripts and stylesheets
 */
function enqueue_idmygadget_css()
{
	$css_file = get_template_directory_uri() . "/idMyGadget/idMyGadget.css";
	wp_enqueue_style( 'idMyGadget-css', $css_file );
}

add_action( 'wp_enqueue_scripts', 'enqueue_idmygadget_css' );
