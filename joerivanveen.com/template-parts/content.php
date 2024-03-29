<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentysixteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<span class="entry-date"><?php echo get_the_date(); ?></span>
	</header><!-- .entry-header -->

    <div class="entry-content woefdram">
		<?php
		
			//if ( is_front_page() || is_category() || is_author() || is_search() ) {
			if ( is_front_page() || is_archive() ) {
				// Add read-more link
				the_excerpt();
				
			} else {
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Read more<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			}
			
			// like by addthis
		//	echo '<div class="like_by_addthis">Delen is leuk:
		//		' . get_like_by_addthis(get_the_permalink(), get_the_title()) . '
		//	</div>';
		?>
	</div><!-- .entry-content -->

    <footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
