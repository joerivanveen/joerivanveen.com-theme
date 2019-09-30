<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			$count = 0;
			while ( have_posts() ) : the_post();

				// If there are more than 1 post, start a column wrapper
				if ($count === 1) {
					echo '<div class="article-wrapper">';
				}
				
				if ($count === 0) {
					// First post, display on full width
					get_template_part( 'template-parts/content', get_post_format() );
				
				} else {
					// create floating divs to display in columns
					//echo '<br />even = '.$count;\
					?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if($count%2==0) { ?>data-column="even"<?php } else { ?>data-column="odd"<?php } ?>>
					<?php 
					
						get_template_part( 'template-parts/content', get_post_format() );
					
					?>
					</div>
					<?php 
				}
				
				$count += 1;
			// End the loop.
			endwhile;

			if ($count > 1) {
				// close columns, if more than 1 article
				echo '</div>';
			}
			
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
