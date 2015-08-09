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
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<div id="header">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h4><?php bloginfo('description'); ?></h4>
		</div>