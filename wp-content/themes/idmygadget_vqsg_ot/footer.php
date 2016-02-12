<?php global $jmwsIdMyGadget; ?>
<div <?php echo $jmwsIdMyGadget->getFooterAttributes() ?>>
 <?php if( has_nav_menu('phone-footer-nav') && $jmwsIdMyGadget->phoneFooterNavThisDevice ) : ?>
	<nav data-role="navbar">
		<?php wp_nav_menu( array('theme_location' => 'phone-footer-nav','container' => false) ); ?>
	</nav>
 <?php else: ?>
	<cite>
	&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url');?>">Matt Beck & Jessica Neuman Beck</a>. All rights reserved.
	</cite>
 <?php endif; ?>
 </div>
 <?php wp_footer(); ?>

 </div>
 </body>
 </html>