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
?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<?php
			/* For development only, remove when code is stable:
			 * Displaying these values can help us make sure we haven't inadvertently
			 * broken something while we are actively working on this.
			 */
			print $jmwsIdMyGadget->getGadgetDetectorStringChar() . '/' . $jmwsIdMyGadget->getGadgetStringChar();
		?>
		<div id="header">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h4><?php bloginfo('description'); ?></h4>
		</div>
		<?php
			if (isset($jmwsIdMyGadget->errorMessage) )
			{
				echo $jmwsIdMyGadget->errorMessage;
			}
		?>
