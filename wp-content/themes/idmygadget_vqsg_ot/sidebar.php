<?php
global $jmwsIdMyGadget;
$include_sidebar_phones = FALSE;
$include_sidebar_tablets = FALSE;
$include_sidebar_desktops = FALSE;
if ( $jmwsIdMyGadget->isPhone() )
{
	if ( is_active_sidebar('sidebar-phones') )
	{
		$include_sidebar_phones = TRUE;
	}
}
else if ( $jmwsIdMyGadget->isTablet() )
{
	if ( is_active_sidebar('sidebar-tablets') )
	{
		$include_sidebar_tablets = TRUE;
	}
}
else
{
	if ( is_active_sidebar('sidebar-desktops') )
	{
		$include_sidebar_desktops = TRUE;
	}
}
?>

<div class="sidebar">
	<?php if ( is_active_sidebar('primary') ) : ?>
		<div id="sidebar-primary" class="sidebar">
			<?php dynamic_sidebar( 'primary' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( $include_sidebar_phones ) : ?>
		<div id="sidebar-phones" class="sidebar">
			<?php dynamic_sidebar( 'sidebar-phones' ); ?>
		</div>
	<?php elseif ( $include_sidebar_tablets ) : ?>
		<div id="sidebar-tablets" class="sidebar">
			<?php dynamic_sidebar( 'sidebar-tablets' ); ?>
		</div>
	<?php elseif ( $include_sidebar_desktops ) : ?>
		<div id="sidebar-desktops" class="sidebar">
			<?php dynamic_sidebar( 'sidebar-desktops' ); ?>
		</div>
	<?php endif; ?>
</div>
