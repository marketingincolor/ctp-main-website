<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
get_header(); ?>

	<div class="small-12 large-8 columns">
		<div class="row">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			//get_template_part( 'content', get_post_format() );
			get_template_part( 'content', 'post' );

			// End the loop.
		endwhile;
		?>

		<?php
		$this_category = get_the_category( $post_id );
		if ($this_category) :
			?>
			<div class="small-12 columns" style="text-align:left; margin-bottom:3em;">&laquo; <a href="<?php echo site_url().'/'.$this_category[0]->slug;?>">Back to <?php echo $this_category[0]->cat_name;?></a></div>
		<?php else : ?>
			<div class="small-12 columns" style="text-align:left; margin-bottom:3em;">&nbsp;</div>
		<?php endif; ?>
		</div>
		<div class="row" style="margin-bottom:2em;">
			<div class="prev-post-button small-6 columns" style="text-align:left; font-size:0.75em;"><?php previous_post_link('%link', 'Previous Post', TRUE ); ?></div>
			<div class="next-post-button small-6 columns" style="text-align:right; font-size:0.75em;"><?php next_post_link('%link', 'Next Post', TRUE ); ?></div>
		</div>
		<br />
	</div>

	<div id="rt-sidebar" class="hide-for-medium-down large-4 columns">
		<?php get_sidebar(); ?>
	</div>
	<?php get_footer(); ?>
