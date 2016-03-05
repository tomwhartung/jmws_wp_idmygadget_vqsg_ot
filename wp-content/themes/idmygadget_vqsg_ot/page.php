<?php get_header();?>
<?php if ( is_active_sidebar('primary') ) : ?>
	<?php get_sidebar('primary'); ?>
<?php endif; ?>
<?php global $jmwsIdMyGadget; ?>
<div id="content" <?php echo $jmwsIdMyGadget->jqmDataRole['content'] ?>>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="entry">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-body">
		<?php the_content(); ?>
			
			</div>
	</div>	
		<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>
<?php get_footer(); ?>
