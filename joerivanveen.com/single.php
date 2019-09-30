<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;

		//for use in the loop, list post titles related to post's tags on current post
		$tags = wp_get_post_tags($post->ID);

		if ($tags) {

		$tag_in = array();
			//Get all tags
			foreach($tags as $tags)
			{
				$tag_in[] = $tags->term_id;
			}
		
			$args=array(
				'tag__in' => $tag_in,
				'post__not_in' => array($post->ID),
				'showposts' => 3,
				'ignore_sticky_posts' => 1,
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$my_query = new WP_Query($args);
			$i_post = 1;

			if( $my_query->have_posts() ) {
				echo '<div class="widget post_related">';
				echo '<h2 class="widget-title"><span class="content_title">Gerelateerd:</span></h2>';
				while ($my_query->have_posts()) : $my_query->the_post();

					$image_thumb = '';
								
					if(has_post_thumbnail(get_the_ID(), 'medium'))
					{
						$image_id = get_post_thumbnail_id(get_the_ID());
						$image_thumb = wp_get_attachment_image_src($image_id, 'medium', true);
					}
					$thumbnail	= (has_post_thumbnail()) ? wp_get_attachment_image_src(get_post_thumbnail_id(), "medium") : ["https://www.kookwinkel.nl/img/swedishchef.jpg"];
					echo '
						<div class="visualblocklinkforpostbyjoeri_wrapper ' . implode(get_post_class()) . '">
							<a class="visualblocklinkforpostbyjoeri" style="background-image:url(' . $thumbnail[0] . ');"
								href="' . get_permalink() . '" title="' . rawurlencode(get_the_title()) . '">
									<span>' . get_the_title() . '</span>
							</a>
						</div>';
					$i_post++;
				endwhile;

				wp_reset_query();
				echo '</div>'; // .post_related
			}
		}
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
