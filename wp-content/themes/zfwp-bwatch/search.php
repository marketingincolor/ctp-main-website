<?php
/**
 * The template for search results pages, with right sidebar
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */

get_header(); ?>

	<div id="main-content" class="small-12 large-8 columns">

		<section class="scroll-container" role="main">
			<div class="row collapse medium-uncollapse">
				<div class="small-12 columns">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();
						// Include the page content template.
						get_template_part( 'content', 'search' );

						// End the loop.
					endwhile;
					?>

				</div>
			</div>
		</section>

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