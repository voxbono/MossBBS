<?php
/*
* Special functions for my theme
*
*/

add_theme_support( 'post-thumbnails' ); 


/* Create the 'bil' post type */
add_action('init', add_post_type('bil'));


/* 
 * Dynamic function for adding a post type
 * $args is optional, as some default settings are set,
 * If you want to overwrite some settings, you need to pass in that setting
 */
function add_post_type($name, $args = array())
{
	$upper = ucwords($name);
	$name = strtolower(str_replace(' ', '_', $name));
	
	$args = array_merge(
		array(
			'public' => true,
			'has_archive' => true,
			'label' => "Alle $upper" . 'er',
			'labels' => array(
				'add_new_item' => "Legg inn ny $name",
				'add_new' => "Legg til ny"
			),
			'suports' => array('title','editor','thumbnail','custom-fields')
		),
		$args
	);
	
	register_post_type($name,$args);
}



/* The different fields to be displayed in the bil post type */
$instillinger = array(
	0 => array(
		'id' => 'jvb_year',
		'name' => 'AArsmodell'
	),
	1 => array(
		'id' => 'jvb_km',
		'name' => 'Km.Stand'
	),
	2 => array(
		'id' => 'jvb_pris',
		'name' => 'Pris'
	),
);

add_action('add_meta_boxes','create_bil_meta_boxes');

function create_bil_meta_boxes($instillinger)
{
	global $instillinger;
	
	foreach ($instillinger as $innstilling) {
		add_meta_box(
			$innstilling['id'],
			$innstilling['name'],
			'jvb_bil_info_cb',
			'bil',
			'normal',
			'high',
			$innstilling
		);
	}
}

function jvb_bil_info_cb($post,$metabox)
{
	global $post;
	
	$meta = get_post_meta($post->ID,$metabox['args']['id'],true);
	
	?>
		<input class="widefat" type="text" name="<?php echo $metabox['args']['id']; ?>" id="<?php echo $metabox['args']['id']; ?>" value="<?php echo $meta; ?>"/>
	<?php
}


add_action('save_post','jvb_save_meta_box');

function jvb_save_meta_box($instillinger)
{
	global $instillinger;
	global $post;
	
	foreach ($instillinger as $instilling) {
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
		if( isset($_POST[$instilling['id']]))
		{
			update_post_meta($post->ID,$instilling['id'],$_POST[$instilling['id']]);
		}
	}
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


/*
 * Include all js files
 */
function load_js() {
	wp_register_script( 'jquery.cycle', '' . get_bloginfo('wpurl') . '/wp-content/themes/mossbbs/scripts/libs/jquery.cycle.js');
	wp_register_script( 'defaultscript', '' . get_bloginfo('wpurl') . '/wp-content/themes/mossbbs/scripts/script.js');
	
    wp_enqueue_script( 'jquery.cycle' );
	wp_enqueue_script( 'defaultscript' );
}

?>