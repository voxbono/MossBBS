<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */

get_header(); ?>
		<?php echo nggShowGallery(1, 'product') ?>
		<?php $args = array( 'post_type' => 'bil', 'posts_per_page' => 1 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<p class=""row><?php the_content(); ?></p>
			    	
		    	<dl class="dl-horizontal metafields">
		    	
	    			<?php $fields = array('Årsmodell', 'Km.stand', 'Pris','Merke'); ?>
	    		
	    			<?php foreach ($fields as $key){ ?>
	    		
	    				<?php if(get_post_meta($post->ID, $key, true)){ ?>
	    	
	    					<dt><?php echo $key ?></dt>
	    					<dd><?php echo get_post_meta($post->ID, $key, true); ?></dd>
	    	
	    				<?php } ?>
	    		
	    			<?php } ?>
		    	
    			</dl>
			
		<?php endwhile; ?>
		<div style="clear: both;"></div>
		
<?php get_footer(); ?>