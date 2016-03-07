<?php
global $jmwsIdMyGadget;
$jmwsIdMyGadget->setIncludeSidebarVariables();
?>
<?php if ( $jmwsIdMyGadget->includeSidebar ) : ?>
	<div class="sidebar">
		<?php if ( is_active_sidebar('primary') ) : ?>
			<div id="sidebar-primary">
				<?php dynamic_sidebar( 'primary' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $jmwsIdMyGadget->includeSidebarPhones ) : ?>
			<div id="sidebar-phones">
				<?php dynamic_sidebar( 'sidebar-phones' ); ?>
			</div>
		<?php elseif ( $jmwsIdMyGadget->includeSidebarTablets ) : ?>
			<div id="sidebar-tablets">
				<?php dynamic_sidebar( 'sidebar-tablets' ); ?>
			</div>
		<?php elseif ( $jmwsIdMyGadget->includeSidebarDesktops ) : ?>
			<div id="sidebar-desktops">
				<?php dynamic_sidebar( 'sidebar-desktops' ); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
