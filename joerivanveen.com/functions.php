<?php
function my_scripts() {
	wp_register_script( 'joehoe-js', get_stylesheet_directory_uri() . '/js/joehoe.js', array('jquery'), '20160222', false );
	wp_enqueue_script( 'joehoe-js' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

/**
 * Overrides the original function to display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own twentysixteen_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<?php
	$thumb_url = get_the_post_thumbnail_url();
	if ($thumb_url) {
		?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" style="background-image:url(<?= $thumb_url ?>);">&nbsp;</a>
		<?php
	}
	?>

	<?php endif; // End is_singular()
}


/**
 * Add This buttons
 */
function get_like_by_addthis_icon($link, $text, $which) {
	return '<a href="https://api.addthis.com/oexchange/0.8/forward/' .
		strToLower(is_array($which)?$which[0]:$which) . '/offer?url=' . 
		$link . '&pubid=IDENTIFICATIONSTRING&ct=1&title=' . 
		$text . '&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/' .
		strToLower(is_array($which)?$which[0]:$which) . '.png" border="0" alt="' . 
		(is_array($which)?$which[1]:$which) . '"/></a>';
}
function get_like_by_addthis($permalink, $title) {
	$link = rawurlencode($permalink);
	$text = rawurlencode('Lees dit: ' + $title);
	$str = get_like_by_addthis_icon($link, $text, 'Facebook') . ' ' .
		get_like_by_addthis_icon($link, $text, 'Twitter') . ' ' .
		get_like_by_addthis_icon($link, $text, 'Linkedin') . ' ' .
		get_like_by_addthis_icon($link, $text, ['google_plusone_share', 'Google+']) . ' ' .
		get_like_by_addthis_icon($link, $text, 'Pinterest');
	// give it back
	return $str;
}

/**
 * single post content
 */

?>