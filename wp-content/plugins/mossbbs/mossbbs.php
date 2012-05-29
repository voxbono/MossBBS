<?php
/*
Plugin Name: MossBBS
Plugin URI: http://mossbilogbat.com
Description: Alt som har med oppsett av MossBBS.
Version: 1.0
Author: Jan-Vidar Bakke
Author URI: http://janvidar.com
License: GPL2
*/

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
?>