<?php
/**
 * WordPress theme to which I am adding idMyGadget device detection
 * Downloaded this template built From Scratch from the
 *   WP Visual Quick Start Guide site
 *    http://www.wpvisualquickstart.com/reference/theme-building/
 * Acronyms used in theme/package (repo) name:
 *   wp: Word Press
 *   vqsg: Visual Quick Start Guide
 *   fs: From Scratch
 *
 * @author Tom W. Hartung, using the Visual Quick Start Guide's "our-theme" as a starting point
 * @package jmws_wp_vqsg_fs_idMyGadget
 * @since 1.0

 */
get_header();
get_sidebar();
?>
<div id="content">
<!--START THE LOOP-->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="entry">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-body">
		<?php the_content(); ?>
			<div class="post-metadata">
				<span class="date"><?php the_time('F jS, Y'); ?></span>
				<span class="categories">See more in: <?php the_category(' &middot; '); ?></span>		
			</div>
			</div>
	</div>
		<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<!--END THE LOOP-->
<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts')) ?></div>
		<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>')) ?></div>
	</div>
</div> <!-- #content -->
<div id="debug">
	<p>print_r( $all_plugins):
		<?php global $all_plugins; print_r( $all_plugins ); ?></p>
	<p>$theme_object_stylesheet: <?php print $theme_object_stylesheet; ?></p>
	<p>get_theme_mod('gadget_detector_select'):
		<?php echo get_theme_mod('gadget_detector_select', 'detect_mobile_browsers') ?></p>
	<p>get_theme_mod('gadget_detector_radio'):
		<?php echo get_theme_mod('gadget_detector_radio', 'detect_mobile_browsers') ?></p>
	<p>$jmwsIdMyGadget->getGadgetDetectorString():
		<?php print $jmwsIdMyGadget->getGadgetDetectorString(); ?></p>
	<p>$jmwsIdMyGadget->getGadgetString():
		<?php print $jmwsIdMyGadget->getGadgetString(); ?></p>



	<p>: <?php print ''; ?></p>
	<p>WP_PLUGIN_DIR: <?php print WP_PLUGIN_DIR; ?></p>
	<p>$jmws_idMyGadget_for_wordpress_is_installed: <?php print $jmws_idMyGadget_for_wordpress_is_installed ; ?></p>
	<p>$jmws_idMyGadget_for_wordpress_is_active: <?php print $jmws_idMyGadget_for_wordpress_is_active ; ?></p>
	<p>$gadgetDetectorIndex: <?php print $gadgetDetectorIndex; ?></p>
	<p>$gadgetDetectorString: <?php print $gadgetDetectorString; ?></p>
	<p>$idMyGadgetClass: <?php print $idMyGadgetClass; ?></p>
	<p>home_url(): <?php print home_url(); ?></p>
	<p>bloginfo('url'): <?php print bloginfo('url'); ?></p>
</div>
<?php get_footer(); ?>