<?php 

get_header(); ?>

<ul class="unstyled">
<?php $args = array( 'post_type' => 'bil', 'posts_per_page' => 10 ); ?>
<?php $loop = new WP_Query( $args ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	
	<li class="row productListItem">
	    <div class="span12">
	    	<div class="span3">
	    		<?php if(get_field('thumbnail')){ ?>
	    			<img src="<?php the_field('thumbnail'); ?>" alt="" />
	    		<?php } ?>
	    	</div>
	    	
	    	<!--img src="<?php echo catch_that_image() ?>" alt="" class="span3 image"-->
		    
		    <div class="row span8 header" >
					<h2 class="span8"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="row span8 information">
				
				<?php $jvb_fields = array(
					'year' => 'Årsmodell',
					'km' => 'Km. Stand',
					'pris' => 'Pris'
				
				); ?>
				
				<?php foreach ($jvb_fields as $key => $value) {
						
					if(get_field($key)){ ?>
						
						<div class="span2">
							<p><em><?php echo $value; ?></em></p>
							<p><strong><?php the_field($key); ?></strong></p>
						</div>
						
					<?php }
			
				} ?>
				
			</div>
		</div>
  </li>
 

<?php endwhile; ?>
</ul>

<?php get_footer(); ?>	

