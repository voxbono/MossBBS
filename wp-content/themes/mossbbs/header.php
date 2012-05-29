<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<html>
<head>
	<title>
	<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	
	?>
	</title>
	<?php if( is_page_template('biler.php')  ) :?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" media="screen" type="text/css" />
	<?php else:?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php endif;?>
	
	<?php 
		wp_head();
	 ?>
</head>
		
<body>
	<div class="container">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<p id="site-description"><?php bloginfo( 'description' ); ?></p>
			</hgroup>
			<div class="navbar">
				<div class="navbar-inner">
			    	<div class="container">
			    		<ul class="nav">
							<li class="<?php if (is_home())echo "active" ?>">
					    		<a href="<?php echo get_settings('home'); ?>">Hjem</a>
					  		</li>
					  		<?php 
					  		
					  								  			
						  		$pages = get_pages();
						  		
						  		foreach ( $pages as $page ) {
						  			$node = '<li class="';
						  			$pageName = $page->post_title;
						  			
						  			if (is_page($pageName) || is_post_type_archive(strtolower($pageName))){
						  					$node .= 'active';
						  			}
						  			
						  			$node .= '"><a href="' . get_page_link( $page->ID ) . '">';
						  			$node .= $page->post_title;
						  			$node .= '</a></li>';
						  			
						  			echo $node;
						  		}
						  		
					  		?>
			    		</ul>
			    	</div>
				</div>
			</div>
				
			
	
	