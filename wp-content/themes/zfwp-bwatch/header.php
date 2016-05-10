<?php
/**
 * The header template
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php bloginfo('name'); ?> </title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.min.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="full-width">
		<div class="small-12">
			<header class="entry-header">
				<?php
				$args = array(
					'numberposts' => 1,
					'order'=> 'DESC',
					'post_mime_type' => 'image',
					'post_parent' => $post->ID,
					'post_type' => 'attachment'
				);
				$get_children_array = get_children($args,ARRAY_A);  //returns Array ( [$image_ID]...
				$keyed_array = array_values($get_children_array);
				$child_image = $keyed_array[0];
				if ( isset($child_image['guid']) ) {
					$header_image = $child_image['guid'];
				} else {
					$header_image = get_template_directory_uri().'/img/tbw-grfx-header-default.png';
				};
				?>
				<div class="header-image blue" style="background: url(<?php echo $header_image; ?>) no-repeat scroll top center / cover;">
					<div class="full-width nav-holder" style="position:absolute; bottom:0;">
						<div class="row hide-for-medium-down">
							<div class="menu-div medium-12">
								<?php
								wp_nav_menu( array(
									'theme_location'  => 'primary',
									'menu'            => 'main-menu',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'ul-class main-menu',
									'menu_id'         => 'main-nav',
									'fallback_cb'     => 'wp_page_menu',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 1
								) );
								?>
							</div>
						</div>
					</div>


					<div class="hdr-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/img/tbw-grfx-header-swoop.png" alt="Downtown Tampa Skyline">
					</div>

					<?php include get_template_directory() . '/includes/mobile-nav.php'; ?>

					<div class="row show-for-large-up">
						<div class="hdr-logo large-6 columns">
							<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/tbw-grfx-header-logo.png"></a>
						</div>
						<div class="hdr-cta large-6 columns">
							<?php include get_template_directory() . '/includes/cta-panel.php'; ?>
						</div>
					</div>


					<div class="full-width nav-holder" style="display:none; position:absolute; bottom:0;">
						<div class="row">
							<div class="small-12">
								<nav class="top-bar" data-topbar>
									<ul class="title-area">
										<li class="name"><!-- Leave this empty --></li>
										<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
									</ul>
									<section class="top-bar-section">
										<?php
										wp_nav_menu( array(
											'theme_location'  => 'primary',
											'menu'            => 'main-menu',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'main-menu',
											'menu_id'         => 'mid',
											'fallback_cb'     => 'wp_page_menu',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 3,
											'walker'          => new foundation_walker_nav_menu
										) );
										?>
									</section>
								</nav>
							</div>
						</div>
					</div>



				</div>
			</header>
		</div>
	</div>

    <div class="row large-collapse" style="display:none;">
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name"><!-- Leave this empty --></li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'menu'            => 'main-menu',
					'container'       => false,
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'main-menu',
					'menu_id'         => 'mid',
					'fallback_cb'     => 'wp_page_menu',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 3,
					'walker'          => new foundation_walker_nav_menu
				) );
				?>
			</section>
		</nav>
    </div>
    <div class="row default large-collapse">