<?php
/**
 * Functions and other WP code that helps make this theme what it is and do what it does.
 * Adding code to support device detction
 *
 * @author Tom W. Hartung, using the Visual Quick Start Guide's "our-theme" as a starting point
 * @package jmws_wp_vqsg_fs_idMyGadget
 * @since 1.0
 */
/**
 * Register the sidebars
 * The 'primary' sidebar is part of the original version of "Our Theme"
 * The 'sidebar-phone' 'sidebar-tablet' and 'sidebar-desktop' sidebars rely on idMyGadget
 */

function idmygadget_vqsg_ot_widgets_init()
{
	register_sidebar(
		array(
			'name' => __( 'Primary Sidebar', 'idmygadget_vqsg_ot' ),
			'id' => 'primary',
			'description' => __( 'The primary sidebar is visible on all devices.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Sidebar: Phones Only', 'idmygadget_vqsg_ot' ),
			'id' => 'sidebar-phones',
			'description' => __( 'Sidebar visible on phones only.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Sidebar: Tablets Only', 'idmygadget_vqsg_ot' ),
			'id' => 'sidebar-tablets',
			'description' => __( 'Sidebar visible on tablets only.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Sidebar: Desktops Only', 'idmygadget_vqsg_ot' ),
			'id' => 'sidebar-desktops',
			'description' => __( 'Sidebar visible on desktops only.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'idmygadget_vqsg_ot_widgets_init' );

//
// ---------------------------------------------------
// Begin changes added for integration with IdMyGadget
// ---------------------------------------------------
//
/**
 * Initialize the environment as needed for this theme
 * Specifically, if a valid idMyGadget object is not present:
 *   Diagnose the problem,
 *   Create a "no detection" object to keep us from whitescreening, and
 *   Set an appropriate error message in the object
 */
require_once 'idMyGadget/JmwsIdMyGadgetVqsgOt.php';
require_once 'idMyGadget/JmwsIdMyGadgetCheckPlugin.php';
function idmygadget_vqsg_ot_wp()
{
	$jmwsIdMyGadgetCheckPlugin = new JmwsIdMyGadgetCheckPlugin();
	$jmwsIdMyGadgetCheckPlugin->checkPlugin();
}
add_action( 'wp', 'idmygadget_vqsg_ot_wp' );

/**
 * Add in the scripts and stylesheets we need for integration with IdMyGadget
 */
function idmygadget_vqsg_ot_enqueue_styles()
{
	$css_file = get_template_directory_uri() . "/idMyGadget/idMyGadget.css";
	wp_register_style( 'idMyGadget-css', $css_file );
	wp_enqueue_style( 'idMyGadget-css' );
}
add_action( 'wp_enqueue_scripts', 'idmygadget_vqsg_ot_enqueue_styles' );
