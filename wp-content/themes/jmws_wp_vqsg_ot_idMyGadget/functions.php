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

//
// ---------------------------------------------------
// Begin changes added for integration with IdMyGadget
// ---------------------------------------------------
//
/**
 * Add in the scripts and stylesheets we need for integration with IdMyGadget
 */
function enqueue_idmygadget_css()
{
	$css_file = get_template_directory_uri() . "/idMyGadget/idMyGadget.css";
	wp_enqueue_style( 'idMyGadget-css', $css_file );
}

add_action( 'wp_enqueue_scripts', 'enqueue_idmygadget_css' );

/**
 * Checks for a valid idMyGadget object; if one is not present:
 *   Diagnose the problem,
 *   Create a "no detection" object to keep us from whitescreening, and
 *   Set an appropriate error message in the object
 */
function check_idMyGadget_install()
{
	global $jmwsIdMyGadget;
	global $all_plugins;
	global $jmws_idMyGadget_for_wordpress_is_installed;
	global $jmws_idMyGadget_for_wordpress_is_active;
	$jmws_idMyGadget_for_wordpress_is_installed= TRUE;
	$jmws_idMyGadget_for_wordpress_is_active = TRUE;

	if ( isset($jmwsIdMyGadget) )
	{
		if ( $jmwsIdMyGadget->isInstalled() )
		{
			unset( $jmwsIdMyGadget->errorMessage );
		}
		else
		{
			$linkToReadmeOnGithub =
				'<a href="' . $jmwsIdMyGadget->getLinkToReadme() . '" class="idmygadget-error" target="_blank">' .
					'the appropriate README.md file on github.</a>';
			$jmwsIdMyGadget->errorMessage = IDMYGADGET_DETECTOR_NOT_INSTALLED_OPENING .
				$linkToReadmeOnGithub . IDMYGADGET_DETECTOR_NOT_INSTALLED_CLOSING;
		}
	}
	else
	{
		require_once 'idMyGadget/JmwsIdMyGadgetMissingPlugin.php';
		$jmwsIdMyGadget = new JmwsIdMyGadgetMissingPlugin();
		$rooted_plugin_file_name =  WP_PLUGIN_DIR . '/' . JmwsIdMyGadgetMissingPlugin::IDMYGADGET_PLUGIN_FILE;
		$jmwsIdMyGadget->errorMessage = IDMYGADGET_UNKNOWN_ERROR;
		if ( file_exists($rooted_plugin_file_name) )  // it's installed but probably not active
		{
			if ( ! function_exists( 'get_plugins' ) )
			{
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			$all_plugins = get_plugins();
			if ( ! is_plugin_active(JmwsIdMyGadgetMissingPlugin::IDMYGADGET_PLUGIN_FILE) )
			{
				$jmws_idMyGadget_for_wordpress_is_active = FALSE;
				$jmwsIdMyGadget->errorMessage = IDMYGADGET_NOT_ACTIVE;
			}
		}
		else
		{
			$jmws_idMyGadget_for_wordpress_is_active = FALSE;
			$jmws_idMyGadget_for_wordpress_is_installed = FALSE;
			$jmwsIdMyGadget->errorMessage = IDMYGADGET_NOT_INSTALLED;
		}
	}
}

/**
 * The idMyGadget module is not available so we use this,
 * which is the original code downloaded in Sept. 2015
 */
function getLogoTitleDescriptionHtml()
{
	$logoTitleDescription = '<h1>' .
			'<a href="' . esc_url( home_url('/') ) . '" ' .
			'title="' . esc_attr( get_bloginfo('name','display') ) . '" ' .
			'rel="home">' . $site_name . '</a></h1>';
	$logoTitleDescription .= '<h4>' . get_bloginfo('description') . '</h4>';
	return $logoTitleDescription;
}
