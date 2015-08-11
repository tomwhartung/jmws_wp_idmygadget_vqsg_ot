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

/*
 * Array of Gadget Detectors
 */
$gadget_detectors_array = array(
	'detect_mobile_browsers',
	'mobile_detect',
	'tera_wurfl'
);
/**
 * Add a new section to the Theme Customization Menu (sidebar in admin) to allow
 * selection of the gadget detector.
 *
 * @param type $wp_customize
 */
function idmygadget_customize_register( $wp_customize ) {
	global $gadget_detectors_array;

	//All our sections, settings, and controls will be added here
	// add_theme_support( 'gadget-detector' );

	//
	// Use a drop-down select element to allow selection of a detector.
	//
	$wp_customize->add_section( 'gadget_detector_select' , array(
		'title'      => __( 'Gadget Detector Select', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'description' => __( 'Test using a select element to pick the detector' ),
		'priority'   => 5,
	) );

	$wp_customize->add_setting( 'gadget_detector_select' , array(
		'default'     => 'detect_mobile_browsers',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'gadget_detector_select', array(
		'label'    => __( 'Gadget Detector Select', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'section'  => 'gadget_detector_select',
		'type'     => 'select',
	//	'choices'  => $gadget_detectors_array,
		'choices'  => array('detect_mobile_browsers','mobile_detect','tera_wurfl'),
		'priority' => 5,
	) );

	//
	// Try radio buttons, see how they look
	//
	$wp_customize->add_section( 'gadget_detector_radio' , array(
		'title'      => __( 'Gadget Detector Radio', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'description' => __( 'Test using radio buttons to pick the detector' ),
		'priority'   => 40,
	) );

	$wp_customize->add_setting( 'gadget_detector_radio' , array(
		'default'     => 'detect_mobile_browsers',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'gadget_detector_radio', array(
		'label'    => __( 'Gadget Detector Radio', 'jmws_wp_vqsg_fs_idMyGadget' ),
		'section'  => 'gadget_detector_radio',
		'type'     => 'radio',
		'choices'  => $gadget_detectors_array,
		'priority' => 10,
	) );
	//
	// Junk code I have copied and tweaked, trying to learn how this works.
	// Don't think it does anything, but still may help; consider deleting it
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
