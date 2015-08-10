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

/* Add Custom Thumbnail support */
add_theme_support( 'post-thumbnails' );

function idmygadget_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	// add_theme_support( 'gadget-detector' );

	//
	// Winging it based on docos.
	//
	$wp_customize->add_section( 'gadget_detector' , array(
		'title'      => __( 'Gadget Detector', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'description' => __( 'Test Section Description' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'gadget_detector' , array(
		'default'     => 'detect_mobile_browsers',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'gadget_detector', array(
		'label'    => __( 'Copied Label', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'section'  => 'gadget_detector',
		'type'     => 'select',
		'choices'  => array('detect_mobile_browsers','mobile_detect','tera_wurfl'),
		'priority' => 5,
	) );

	//
	// Copied from twentyfourteen theme but heavily modified
	//
	$wp_customize->add_section( 'copied_section', array(
		'title'          => __( 'Copied Section Name', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'description'    => __( 'Copied Section Description' ),
		'priority'       => 130,
		'theme_supports' => 'featured-content',
	) );
	$wp_customize->add_setting( 'copied_section', array(
		'default'           => 'none',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'copied_section', array(
		'label'    => __( 'Copied Label', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'section'  => 'copied_section',
		'type'     => 'select',
		'choices'  => array('a','b','c'),
		'priority' => 1,
	) );

}

add_action( 'customize_register', 'idmygadget_customize_register' );


?>
