<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */

get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<h1><?php the_title();  ?></h1>
<p class="row"><?php the_content(); ?>	</p>
	
<dl class="dl-horizontal metafields">

	<?php $fields = array('Årsmodell', 'Km.stand', 'Pris','Merke'); ?>

	<?php foreach ($fields as $key){ ?>

		<?php if(get_post_meta($post->ID, $key, true)){ ?>

			<dt><?php echo $key ?></dt>
			<dd><?php echo get_post_meta($post->ID, $key, true); ?></dd>

		<?php } ?>

	<?php } ?>

</dl>
<?php endwhile; endif; ?>
<div style="clear: both;" />
		
<?php get_footer(); ?>