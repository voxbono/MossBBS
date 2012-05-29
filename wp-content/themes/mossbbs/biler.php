<?php 
/* 
 * Template Name: Produktliste
 */

get_header(); ?>
<ul class="thumbnails row">
<?php $args = array( 'post_type' => 'bil', 'posts_per_page' => 10 ); ?>
<?php $loop = new WP_Query( $args ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	
	  <li class="span3">
	    <div class="thumbnail">
	    	<img src="http://placehold.it/260x180" alt="">
	    	<dl class="dl-horizontal">
	    	
	    			<?php $fields = array('Merke', 'Modell', 'Årsmodell', 'Pris' ); ?>
	    		
	    			<?php foreach ($fields as $key){ ?>
	    		
	    				<?php if(get_post_meta($post->ID, $key, true)){ ?>
	    	
	    					<dt><?php echo $key ?></dt>
	    					<dd><?php echo get_post_meta($post->ID, $key, true); ?></dd>
	    	
	    				<?php } ?>
	    		
	    			<?php } ?>
	    	
	    			</dl>
	    	<h5><?php the_title(); ?></h5>
	    	<p><?php the_content(); ?></p>
	
			
		</div>
	  </li>
	
<?php endwhile; ?>
</ul>

<?php get_footer(); ?>	



    