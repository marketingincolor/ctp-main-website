<?php
/**
 * The default template for displaying content
 *
 * Used for showing category content.
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */

$catid = get_cat_id('News').','.get_cat_id('Featured');

get_header(); ?>

	<div id="main-content" class="small-12 large-8 columns">
		<div class="outer-cat-list">
			<ul class="inner-cat-list"><?php echo wp_list_categories( 'exclude=' . $catid . '&title_li=' ); ?></ul>
		</div>

		<?php

		if ( have_posts() ) :
			// Start the loop.
			/*if ( !is_paged() ) :
				echo 'front!';
			endif;*/

			while ( have_posts() ) : the_post();

				//if ( is_category('news') ) :
					get_template_part( 'content', 'news' );
				//else :
				//	get_template_part( 'content', 'search' );
				//endif;

				// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>
		<div class="post-nav">
			<?php global $wp_query;
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			?>
			<br /><br />
		</div>

	</div>
	<div id="rt-sidebar" class="hide-for-medium-down large-4 columns">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
