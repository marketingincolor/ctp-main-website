<?php
/**
 * The footer template
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>

</div>

<?php include get_template_directory() . '/includes/mobile-form.php'; ?>

<div class="bottom full-width dkgray-bg">
	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="site-info small-12 columns">
			<div class="row hide-for-medium-down" data-equalizer>
				<div class="large-3 columns foot-border-right" data-equalizer-watch>
					<h3>Legal Links</h3>
					<?php
					wp_nav_menu( array(
						'menu'            => 'legal',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'ul-class footer-menu',
						'menu_id'         => 'footer-nav',
						'fallback_cb'     => 'wp_page_menu',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 1
					) );
					?>
				</div>
				<div class="large-3 columns foot-border-right" data-equalizer-watch>
					<h3>Menu</h3>
					<?php
					wp_nav_menu( array(
						'theme_location'  => 'secondary',
						'menu'            => 'footer',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'ul-class footer-menu',
						'menu_id'         => 'footer-nav',
						'fallback_cb'     => 'wp_page_menu',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 1
					) );
					?>
				</div>
				<div class="large-4 columns foot-border-right" data-equalizer-watch>
					<h3>Business Watch Tampa<br />Contact Info</h3>
					<?php do_action( 'co_address' ); ?><br />
					<?php do_action( 'co_phone' ); ?><br />
					<a href="mailto:<?php do_action( 'co_email' ); ?>"><?php do_action( 'co_email' ); ?></a>
				</div>
				<div class="large-2 columns" data-equalizer-watch>
					<?php do_action( 'social_icons', 'footer' ); ?>
				</div>
			</div>
			<div class="row">
				<div class="callout small-12 columns">
					SITE SPONSORED AND DEVELOPED BY <a href="<?php echo esc_url( __( 'http://marketingincolor.com', 'zfwpbase' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/tbw-grfx-ftr-miclogo.png" alt="Marketing In Color"></a>
				</div>
			</div>

		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div>


<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.accordion.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.dropdown.js"></script>
<script>
	$(document).foundation();
</script>

</body>
</html>