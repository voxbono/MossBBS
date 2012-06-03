<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 ?>

<div class="row">
<?php

$my_pages = array(
	'finansiering' => get_page_by_title( 'Finansiering' ),
	'kommisjon' => get_page_by_title( 'Kommisjon' ),
	'import' => get_page_by_title( 'Import' )
);

foreach($my_pages as $my_page)
{ 

	if($my_page)
	{
		?>
		<div class="span4">
			<div class="alert alert-info">
				<h4><?php echo get_the_title($my_page -> ID); ?> </h4>
				<p><?php the_field('teks_til_boks',$my_page->ID) ?></p>
				<a class="btn" href="<?php echo get_page_link($my_page -> ID); ?>">Les mer...</a>
			</div>
		</div>
		<?php 
	}
}

?>

	
</div>
		<hr>
		<div>© Moss Bil og Båtservice 2012</div>
	</div> <!-- container -->
	
	<?php
		load_js(); // load all javascript files from functions.php
	?>
<?php wp_footer(); ?>

</body>
</html>