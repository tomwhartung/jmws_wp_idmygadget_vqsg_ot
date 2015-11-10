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
	<title>vqsg_ot:
		<?php bloginfo('name'); ?> <?php wp_title(); ?> 
	</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<?php
//
// check_idMyGadget_install:
//   If the device detection object has NOT been created,
//     Create an object that can keep the app from whitescreening with a null pointer etc. and
//     Display an appropriate error message (markup for that is at the end of this file)
// If we do have the object,
//   Call its fcn to get the html we need for the header
//
global $jmwsIdMyGadget;
check_idMyGadget_install();
$logoTitleDescription = '';
$site_name = get_bloginfo('name' );
if ( $jmwsIdMyGadget->isInstalled() )
{
	$logoTitleDescription = $jmwsIdMyGadget->getLogoTitleDescriptionHtml();
}
else
{
	// The idMyGadget module is not available so we use this,
	// which is the original code downloaded in Sept. 2015
	//
	$logoTitleDescription = '<h1>' .
		'<a href="' . esc_url( home_url('/') ) . '" ' .
			'title="' . esc_attr( get_bloginfo('name','display') ) . '" ' .
			'rel="home">' . $site_name . '</a></h1>';
	$logoTitleDescription .= '<h4>' . get_bloginfo('description') . '</h4>';
}
$header_html = '';
$header_html .= '<header id="header" ' . $jmwsIdMyGadget->jqmDataRole['header'] . ' ';
$header_html .= $jmwsIdMyGadget->jqmDataThemeAttribute . '>';
$header_html .= $logoTitleDescription;
$header_html .= '</header> <!-- #header -->';
?>
</head>
<body <?php body_class(); ?>>
	<div id="page" <?php echo $jmwsIdMyGadget->jqmDataRole['page'] ?> data-title="vqsg_ot:">
		<?php if( has_nav_menu('phone-header-nav') && $jmwsIdMyGadget->phoneHeaderNavThisDevice ) : ?>
			<nav data-role="navbar">
				<?php wp_nav_menu( array( 'theme_location' => 'phone-header-nav', 'container' => false) ); ?>
			</nav>
		<?php endif; ?>
		<?php echo $header_html ?>
		<?php
			if (isset($jmwsIdMyGadget->errorMessage) )
			{
				echo $jmwsIdMyGadget->errorMessage;
			}
		?>
		<div class="debug">
			<?php // print $jmwsIdMyGadget->getSanityCheckString(); ?>
		</div> <!-- .debug -->
