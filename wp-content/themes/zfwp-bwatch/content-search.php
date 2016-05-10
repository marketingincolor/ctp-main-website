<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'columns' ); ?>>

	<?php //the_post_thumbnail('news-thumb');?>
	<?php if ( has_post_thumbnail() )
		echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'news-thumb' ) . '</a> ';
	?>
	<div class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		endif; ?>

	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if (is_search() ) :
			 the_excerpt();
		else :
			 echo custom_length_excerpt(40);
			 echo custom_excerpt_more(' ');
		endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

