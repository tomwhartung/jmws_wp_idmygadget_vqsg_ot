<?php global $jmwsIdMyGadget; ?>
<div id="footer"
	<?php echo $jmwsIdMyGadget->jqmDataRole['footer'] . ' ' . $jmwsIdMyGadget->jqmDataThemeAttribute ?>>
	<?php if( has_nav_menu('phone-footer-nav') && $jmwsIdMyGadget->phoneFooterNavThisDevice ) : ?>
		<nav data-position="fixed" data-role="navbar">
			<?php wp_nav_menu( array('theme_location' => 'phone-footer-nav','container' => false) ); ?>
		</nav>
	<?php endif; ?>
	<cite>
	&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url');?>">Matt Beck & Jessica Neuman Beck</a>. All rights reserved.
	</cite>
 </div>
 <?php wp_footer(); ?>

 </div>
 </body>
 </html>