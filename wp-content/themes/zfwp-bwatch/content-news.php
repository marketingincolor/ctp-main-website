<?php
/**
 * The template part for displaying results in news category
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'columns' ); ?>>

	<?php //the_post_thumbnail('news-thumb'); ?>
	<?php if ( has_post_thumbnail() )
		echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'news-thumb' ) . '</a> ';
	?>

	<div class="entry-header">
		<?php //the_title( '<h3 class="entry-title">', '</h3>' );
		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>'); ?>
	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php //the_excerpt(); ?>
		<?php echo custom_length_excerpt(40); ?>
		<?php echo custom_excerpt_more(' '); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->



