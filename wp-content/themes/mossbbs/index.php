<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
get_header(); ?>
<div class="row">
	<div class="span9">
		<?php echo nggShowGallery(2, 'front') ?>
	</div>
</div>
<?php get_footer(); ?>