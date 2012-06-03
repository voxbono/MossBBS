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
	
	<div class="row">
		<div class="span3">
		
			<?php $jvb_fields = array(
				'year' => 'Årsmodell',
				'km' => 'Km. Stand',
				'pris' => 'Pris'
			
			); ?>
			
			<ul class="unstyled">
			<?php foreach ($jvb_fields as $key => $value) {
							
				if(get_field($key)){ ?>
					<li style="position:relative">
						<span><strong><?php echo $value; ?>: </strong></span>
						<span style="position: absolute;right:10px;"><?php the_field($key); ?></span>
					</li>
					
				<?php }
		
			} ?>
				
			</ul>
		</div>
		
		<div class="span3">
			
			<?php 
				$utstyr = get_field('utstyr');
				
				if($utstyr)
				{
					echo '<p><strong>Utstyr:</strong></p>';
					echo '<ul class="unstyled">';
		 
					foreach($utstyr as $value)
					{
						echo '<li>' . $value . '</li>';
					}
				 
					echo '</ul>';
				}
			the_field('egendefinert_utstyr'); ?>
		</div>
	</div>	
	
	
<?php endwhile; endif; ?>
<div style="clear: both;" />
		
<?php get_footer(); ?>