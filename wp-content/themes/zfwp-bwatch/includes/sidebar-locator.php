<?php
/**
 * Created by PhpStorm.
 * User: Edd
 * Date: 8/14/2015
 * Time: 11:05 AM
 */
?>
<script type="text/javascript">
	jQuery(function($){
		$( '.drop-trigger').click(function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('.wrap-drop').css({"visibility":"visible"});
		});
		$('.wrap-drop').mouseleave(function() {
			$('.wrap-drop').css({"visibility":"hidden"});
		});
	})
</script>
<div class="locator columns">
	<h3 class="widget-title">Select Your Location</h3>
	<?php wp_nav_menu( array(
		'menu' => 'locations',
		'container_class' => 'wrap-drop',
		'menu_class' => 'locator-drop'
	) ); ?>
	<a href="#" class="drop-trigger">Downtown...</a>
</div>
<hr>