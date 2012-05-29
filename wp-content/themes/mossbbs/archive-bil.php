<?php 

get_header(); ?>

<ul class="unstyled">
<?php $args = array( 'post_type' => 'bil', 'posts_per_page' => 10 ); ?>
<?php $loop = new WP_Query( $args ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	
	<li class="row productListItem">
	    <div class="span12">
	    	<div class="span3">
	    		<?php if ( has_post_thumbnail() ) {
	    			the_post_thumbnail('thumbnail');
	    		} ?>
	    	</div>
	    	
	    	<!--img src="<?php echo catch_that_image() ?>" alt="" class="span3 image"-->
		    
		    <div class="row span8 header" >
					<h2 class="span8"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="row span8 information">
				
				<?php $fields = array('Årsmodell', 'Km.stand', 'Pris' ); ?>
			
				<?php foreach ($fields as $key){ ?>
			
					<?php if(get_post_meta($post->ID, $key, true)){ ?>
						<div class="span2">
							<p><em><?php echo $key ?></em></p>
							<p><strong><?php echo get_post_meta($post->ID, $key, true); ?></strong></p>
						</div>
					<?php } ?>
			
				<?php } ?>
				
			</div>
		</div>
  </li>

<?php endwhile; ?>
</ul>

<?php get_footer(); ?>	

