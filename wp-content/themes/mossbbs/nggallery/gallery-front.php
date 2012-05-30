<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="ngg-galleryoverview span12" id="<?php echo $gallery->anchor ?>">
	
	<ul class="row front-image-list">
	
	<?php foreach ( $images as $image ) : ?>
	
	
		<li id="ngg-custom-image-<?php echo $image->pid ?>" class="front-image" >
			<img class="span9" src="<?php echo $image->imageURL ?>" />
			<div class="span3">
				<h4>
					<?php echo $image->alttext ?>
				</h4>
				<p>
					<?php echo $image->description ?>
				</p>
			</div>
		</li>
	

 	<?php endforeach; ?>
 	
 	</ul>
</div>

<?php endif; ?>