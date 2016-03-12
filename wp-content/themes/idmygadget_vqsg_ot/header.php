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
<?php
//
// check idMyGadget install:
//   If the device detection object has NOT been created,
//     Create an object that can keep the app from whitescreening with a null pointer etc. and
//     Display an appropriate error message (markup for that is at the end of this file)
// If we do have the object,
//   Call its fcn to get the html we need for the header
//
global $jmwsIdMyGadget;
$site_title_or_name = $jmwsIdMyGadget->getSiteTitleOrName();
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="alternate" href="<?php echo esc_url( home_url('/') ); ?>" hreflang="en-us" />
	<title><?php echo $site_title_or_name; ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" <?php echo $jmwsIdMyGadget->jqmDataRole['page'] ?> data-title="<?php echo $site_title_or_name; ?>">
		<?php if( has_nav_menu('phone-header-nav') && $jmwsIdMyGadget->phoneHeaderNavThisDevice ) : ?>
			<nav data-role="navbar">
				<?php wp_nav_menu( array( 'theme_location' => 'phone-header-nav', 'container' => false) ); ?>
			</nav>
		<?php endif; ?>
		<?php
			echo JmwsIdMyGadgetVqsgOt::getHeaderHtml(); // includes hamburger menu icons as necessary
		?>
		<?php if (isset($jmwsIdMyGadget->errorMessage) ) : ?>
			<?php echo $jmwsIdMyGadget->errorMessage; ?>
		<?php else : ?>
			<?php if ( $jmwsIdMyGadget->hamburgerIconLeftOnThisDevice ) : ?>
				<div data-role="popup" id="idmg-hamburger-menu-left" data-position-to="window">
					<div data-role="header">
						<h2>LEFT HEADER</h2>
					</div>
					<div role="main" class="ui-content">
						<p>LEFT MAIN UI CONTENT (soon to be a menu I HOPE)</p>
						<?php // wp_nav_menu( array( 'theme_location' => 'hamburger-menu-left', 'container' => false) ); ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $jmwsIdMyGadget->hamburgerIconRightOnThisDevice ) : ?>
				<div data-role="popup" id="idmg-hamburger-menu-right" data-position-to="window">
					<div data-role="header">
						<h2>RIGHT HEADER</h2>
					</div>
					<div role="main" class="ui-content">
						<p>RIGHT MAIN UI CONTENT (soon to be a menu I HOPE)</p>
						<?php // wp_nav_menu( array( 'theme_location' => 'hamburger-menu-right', 'container' => false) ); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="debug">
			<div><a href="#popupPage" data-rel="popup">Open popup</a></div>
			<div><a href="#dialogPage">Open dialog</a></div>
			<?php print $jmwsIdMyGadget->getSanityCheckString(); ?>
			<div data-role="popup" id="popupPage">
				<div data-role="header">
					<h2>Popup</h2>
				</div>
				<div role="main" class="ui-content">
					<p>I am a popup, not a dialog</p>
				</div>
			</div>
			<div data-role="page" data-dialog="true" id="dialogPage">
				<div data-role="header">
					<h2>Dialog</h2>
				</div>
				<div role="main" class="ui-content">
					<p>I am a dialog, not a popup</p>
				</div>
			</div>
		</div> <!-- .debug -->
