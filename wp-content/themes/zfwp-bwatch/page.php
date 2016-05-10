<?php
/**
 * The template for displaying pages, with right sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */

$catid = get_cat_id('News').','.get_cat_id('Featured');

get_header(); ?>

<div id="main-content" class="small-12 large-8 columns">
<?php if ( is_page('news') ) :?>
	<div class="outer-cat-list">
		<ul class="inner-cat-list"><?php echo wp_list_categories( 'exclude=' . $catid . '&title_li=' ); ?></ul>
	</div>
<?php endif; ?>
	<section class="scroll-container" role="main">
		<div class="row collapse medium-uncollapse">
			<div class="small-12 columns">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					// Include the page content template.
					if ( !is_paged() ) :
					get_template_part( 'content', 'page' );
					endif;

					if ( is_page('map') ) :
						include get_template_directory() . '/includes/location-map.php';
					endif;

					// End the loop.
				endwhile;
				?>


				<?php if ( is_page('news') ) :?>

					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$inner_query = new WP_Query();
					$inner_query->query('category_name=bw-news&posts_per_page=3' . '&paged='.$paged.'');
					?>

					<div class="news-list">
						<?php

						while ($inner_query->have_posts()) : $inner_query->the_post();
							$inner_query->current_post = $inner_query->current_post+0;
							?>

							<?php $add_class = ( 0 == $inner_query->current_post || 0 == $inner_query->current_post % 2 ) ? 'first' : '';
							?>
							<div class="listing-item <?php echo $add_class; ?>">
								<?php if ( has_post_thumbnail() )
									echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'news-thumb' ) . '</a> ';
								?>
								<a class="title" href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a><br />
								<span class="excerpt"><?php the_excerpt(); ?><?php echo custom_excerpt_more('more'); ?></span>
							</div>
						<?php endwhile; ?>
					</div>
					<br clear="both" />

					<div class="post-nav">
						<?php
						$big = 999999999; // need an unlikely integer
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $inner_query->max_num_pages
						) );
						?>
					</div>

					<?php wp_reset_query(); ?>

				<?php else : ?>

				<?php endif; ?>

			</div>
		</div>
	</section>
</div>

<div id="rt-sidebar" class="hide-for-medium-down large-4 columns">
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>