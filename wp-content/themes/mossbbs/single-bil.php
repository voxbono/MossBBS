<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */

get_header(); ?>
		
<h1><?php echo $post->post_title; ?></h1>
<p class="row"><?php echo apply_filters('the_content', $post->post_content); ?></p>
	
<dl class="dl-horizontal metafields">

	<?php $fields = array('Årsmodell', 'Km.stand', 'Pris','Merke'); ?>

	<?php foreach ($fields as $key){ ?>

		<?php if(get_post_meta($post->ID, $key, true)){ ?>

			<dt><?php echo $key ?></dt>
			<dd><?php echo get_post_meta($post->ID, $key, true); ?></dd>

		<?php } ?>

	<?php } ?>

</dl>
<div style="clear: both;" />
		
<?php get_footer(); ?>