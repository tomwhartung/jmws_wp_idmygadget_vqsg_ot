<?php global $jmwsIdMyGadget; ?>
<div <?php echo $jmwsIdMyGadget->getFooterAttributes('id="footer"') ?>>
 <?php if( has_nav_menu('phone-footer-nav') && $jmwsIdMyGadget->phoneFooterNavThisDevice ) : ?>
	<nav data-role="navbar">
		<?php wp_nav_menu( array('theme_location' => 'phone-footer-nav','container' => false) ); ?>
	</nav>
 <?php endif; ?>
 </div>
 <?php wp_footer(); ?>

 </div>
 </body>
 </html>