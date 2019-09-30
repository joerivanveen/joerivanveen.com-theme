<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-info">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-footer -->
	
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			// like by addthis
			//echo '
			//	<div class="like_by_addthis">Delen is leuk:
			//		' . get_like_by_addthis(get_the_permalink(), get_the_title()) . '
			//	</div>
			//	';

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->

<!-- show posts from the same category -->
<?php
display_related_posts();
function display_related_posts() {
 
    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );
 
    if ( $categories && !is_wp_error( $categories ) ) {
 
        foreach ( $categories as $category ) {
 
            array_push( $cat_ids, $category->term_id );
 
        }
 
    }
	$current_post_type = get_post_type( $post_id );
		 
	$args = array(
		'category__in' => $cat_ids,
		'post_type' => $current_post_type,
		'posts_per_page' => '4',
		'post__not_in' => array( $post_id )
	); 
	$query = new WP_Query( $args );
	 
	if ( $query->have_posts() ) {
	 
		?>
		<aside class="related-posts widget">
			<h3 class="widget-title">
				<?php _e( 'Read these posts too', 'tutsplus' ); ?>:
			</h3>
			<ul class="related-posts wp-most-popular">
				<?php
	 
					while ( $query->have_posts() ) {
	 
						$query->the_post();
	 
						$thumbnail	= (has_post_thumbnail()) ? wp_get_attachment_image_src(get_post_thumbnail_id(), "medium") : ["https://www.joerivanveen.com/joeri_van_veen.jpg"];
						$item = '
							<li class="' . implode(get_post_class()) . '">
							<div class="visualblocklinkforpostbyjoeri_wrapper">
								<a class="visualblocklinkforpostbyjoeri" style="background-image:url(' . $thumbnail[0] . ');"
									href="' . get_permalink() . '" title="' . rawurlencode(get_the_title()) . '">
										<span>' . get_the_title() . '</span>
								</a>
							</div>
							</li>
						';
						$item = apply_filters('wp_most_popular_list_item_single', $item, $post_id, $title, $post_class, $permalink);
						echo $item;
	 
					}
	 
				?>
			</ul>
		</aside>
		<?php
	 
	}
	 
	wp_reset_postdata();
}
?>
