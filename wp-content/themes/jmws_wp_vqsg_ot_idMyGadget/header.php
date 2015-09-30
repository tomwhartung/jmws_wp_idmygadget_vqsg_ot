<?php
/**
 * WP template for the site header
 * Updating this as necessary to support Device Detection
 *
 * @author Tom W. Hartung, using the Visual Quick Start Guide's "our-theme" as a starting point
 * @package jmws_wp_vqsg_fs_idMyGadget
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<title> 
		<?php bloginfo('name'); ?> <?php wp_title(); ?> 
	</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<?php
//
// If the device detection object has NOT been created,
//   create an object that can keep the app from whitescreening with a null pointer etc. and
//   display an appropriate error message
//
global $jmwsIdMyGadget;
check_idMyGadget_install();

$site_name = get_bloginfo('name' );
// $site_name = 'WTF';
$header_html = '<div id="header">';
if ( $jmwsIdMyGadget->isInstalled() )
{
	if ( $jmwsIdMyGadget->isPhone() )
	{
		if ( get_option('idmg_show_site_name_phone') )
		{
			$header_html .= '<' . get_option('idmg_site_name_element_phone') . ' class="site-name-phone">';
			$header_html .= $site_name;
			$header_html .= '</' . get_option('idmg_site_name_element_phone') . '>';
		}
	}
	else if ( $jmwsIdMyGadget->isTablet() )
	{
		if ( get_option('idmg_show_site_name_tablet') )
		{
			$header_html .= '<' . get_option('idmg_site_name_element_tablet') . ' class="site-name-tablet">';
			$header_html .= $site_name;
			$header_html .= '</' . get_option('idmg_site_name_element_tablet') . '>';
		}
	}
	else
	{
		if ( get_option('idmg_show_site_name_desktop') )
		{
			$header_html .= '<' . get_option('idmg_site_name_element_desktop') . ' class="site-name-desktop">';
			$header_html .= $site_name;
			$header_html .= '</' . get_option('idmg_site_name_element_desktop') . '>';
		}
	}
}
else
{
	$header_html .= '<h1>' .
		'<a href="' . esc_url( home_url('/') ) . '" ' .
			'title="' . esc_attr( get_bloginfo('name','display') ) . '" ' .
			'rel="home">' . $site_name . '</a></h1>';
	$header_html .= '<h4>' . get_bloginfo('description') . '</h4>';
}
$header_html .= '</div> <!-- #header -->';
?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<?php
			// For development only! remove when code is stable:
			// Displaying these values can help us make sure we haven't inadvertently
			// broken something while we are actively working on this.
			//
			print $jmwsIdMyGadget->getGadgetDetectorStringChar() . '/' . $jmwsIdMyGadget->getGadgetStringChar();
		?>
		<?php echo $header_html ?>
		<?php
			if (isset($jmwsIdMyGadget->errorMessage) )
			{
				echo $jmwsIdMyGadget->errorMessage;
			}
		?>
