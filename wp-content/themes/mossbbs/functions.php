<?php
/*
* Special functions for my theme
*
*/

add_theme_support( 'post-thumbnails' ); 


add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'bil',
		array(
			'labels' => array(
				'name' => __( 'MossBBS' ),
				'singular_name' => __( 'MossBBS' )
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title','editor','thumbnail','custom-fields')
		)
	);
}


function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}


?>