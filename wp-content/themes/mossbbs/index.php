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
		<?php echo nggShowSlideShow(2,800,500) ?>
	</div>
	<div>
		<p>Her kommer informasjon</p>
	</div>
</div>
<?php get_footer(); ?>