<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
get_header(); ?>
<h1>Aktuelle Biler</h1>
<div class="row productPreview">
		
		
		<?php $args = array( 'post_type' => 'bil', 'posts_per_page' => 10 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		
		<ul class="front-image-list">
			
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<?php if( get_field('show_forside') == 1){ ?>
				<li class="front-image row" >
					<img class="span8" src="<?php the_field('thumbnail'); ?>" />
					<div class="span3">
						<h4>
							<?php the_title() ?>
						</h4>
						<br />
						<br />
						<?php $jvb_fields = array(
							'year' => 'Årsmodell',
							'km' => 'Km. Stand',
							'pris' => 'Pris'
						
						); ?>
						
						<?php foreach ($jvb_fields as $key => $value) {
								
							if(get_field($key)){ ?>
								
								<p>	
									<em><?php echo $value; ?></em>
									<br />
									<strong><?php the_field($key); ?></strong>
								</p>
								
							<?php }
					
						} ?>
					</div>
				</li>
		
		<?php 
			}
			endwhile; ?>
		</ul>
</div>
<?php get_footer(); ?>