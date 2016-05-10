<?php
/**
 * Custom display for Mobile Navigation.
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>
<script type="text/javascript">
	jQuery(function($){
		$( '.mobile-nav-trigger').click(function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('.mobile-nav-content').css({"visibility":"visible"});
		});
		$('.mobile-nav-content').mouseleave(function() {
			$('.mobile-nav-content').css({"visibility":"hidden"});
		});
	})
</script>

<div class="mobile-nav row show-for-medium-down">
	<div class="mobile-logo small-6 columns">
		<img src="<?php echo get_template_directory_uri(); ?>/img/tbw-grfx-header-logo.png">
	</div>
	<div class="mobile-nav-container small-6 columns">

		<div class="mobile-nav-menu">
			<a class="mobile-nav-trigger" href="">MENU</a>
		</div>

	</div>
</div>


<div class="mobile-nav-content row show-for-medium-down" style="visibility:hidden;">
	<?php
	wp_nav_menu( array(
		'menu'            => 'footer',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'ul-class mobile-menu',
		'menu_id'         => 'mobile-nav',
		'fallback_cb'     => 'wp_page_menu',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 1
	) );
	?>
	<?php do_action( 'cta_phone', 'footer' ); ?>
	<?php do_action( 'social_icons', 'footer' ); ?>
	<br />
</div>