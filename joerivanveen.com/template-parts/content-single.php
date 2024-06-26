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

    <div class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
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

		if ( ( $count = get_comments_number() ) ) {
			echo '<div class="comments_nudge"><a href="#comments">', esc_html( sprintf( __( '%d Comments. Join the discussion.', 'joeri-van-veen' ), $count ) ), '</a></div>';
		} elseif ( comments_open() ) {
			echo '<div class="comments_nudge"><a href="#comments">', esc_html__( 'Leave your thoughts below.', 'joeri-van-veen' ), '</a></div>';
		}

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

	$post_id    = get_the_ID();
	$cat_ids    = array();
	$categories = get_the_category( $post_id );

	if ( $categories && ! is_wp_error( $categories ) ) {

		foreach ( $categories as $category ) {

			array_push( $cat_ids, $category->term_id );

		}

	}
	$current_post_type = get_post_type( $post_id );

	$args  = array(
		'category__in'   => $cat_ids,
		'post_type'      => $current_post_type,
		'posts_per_page' => '4',
		'post__not_in'   => array( $post_id )
	);
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {

		?>
        <aside class="related-posts widget">
            <h3 class="widget-title">
				<?php _e( 'Read these posts too', 'ruigehond' ); ?>:
            </h3>
            <ul class="related-posts wp-most-popular">
				<?php

				while ( $query->have_posts() ) {

					$query->the_post();

					echo '<li class="', implode( ' ', get_post_class() ), '"><a href="', get_permalink(), '" tabindex="-1">';
					if ( has_post_thumbnail() ) {
						echo '<div class="popular-image" style="background-image:url(', wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0], ');"></div>';
					}
					echo '<h3>', get_the_title(), '</h3></a>';
					echo '<p>', get_the_excerpt(), '<a href="', get_permalink(), '" class="cta">Read more</a></p>';
					echo '</li>';

				}
				?>
            </ul>
        </aside>
		<?php

	}

	wp_reset_postdata();
}

?>
