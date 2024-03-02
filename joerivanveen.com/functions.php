<?phpconst VERSION = '1.2.9';function joerivanveen_scripts() {	wp_register_script( 'joerivanveen-js', get_stylesheet_directory_uri() . '/js/script.js', array(), VERSION, false );	wp_enqueue_script( 'joerivanveen-js' );    // child style	wp_register_style( 'twentysixteen', get_stylesheet_directory_uri() . '/../twentysixteen/style.css', array(), VERSION  );	wp_enqueue_style( 'twentysixteen' );	wp_register_style( 'joerivanveen', get_stylesheet_directory_uri() . '/style.css', array(), VERSION  );	wp_enqueue_style( 'joerivanveen' );}add_action( 'wp_enqueue_scripts', 'joerivanveen_scripts', 11 );add_post_type_support( 'page', 'excerpt' );/** * Overrides the original function to display an optional post thumbnail. * * Wraps the post thumbnail in an anchor element on index views, or a div * element when on single views. * * Create your own twentysixteen_post_thumbnail() function to override in a child theme. * * @since Twenty Sixteen 1.0 */function twentysixteen_post_thumbnail() {	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {		return;	}	if ( is_singular() ) :	?>	<div class="post-thumbnail">		<?php the_post_thumbnail(); ?>	</div><!-- .post-thumbnail -->	<?php else : ?>	<?php	$thumb_url = get_the_post_thumbnail_url();	if ($thumb_url) {		?>		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" style="background-image:url(<?= $thumb_url ?>);">&nbsp;</a>		<?php	}	?>	<?php endif; // End is_singular()}function exclude_post_filter( $where = '' ) {// Make sure this only applies to loops / feeds on the frontendif (!is_single() && !is_admin()) {// exclude password protected$where .= " AND post_password = ''";}return $where;}add_filter( 'posts_where', 'exclude_post_filter' );