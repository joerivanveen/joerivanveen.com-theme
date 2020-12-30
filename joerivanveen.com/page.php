<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php
/**
 * overrule the standard sidebar that is only suited for blog posts and roll your own
 * for joerivanveen.eu. wordpresscoder.nl and the pages (like faq and bio) on the blog
 */
echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
echo '<section id="photographer-flag"><h2 class="widget-title">Photographer for hire</h2><p><a href="https://www.joerivanveen.com/blog/photographing-a-watch/"><img src="https://www.joerivanveen.com/blog/wp-content/uploads/2020/03/20170401_FOAC-254-Horloge-CROP-2.jpg" alt="product photo"/></a></p><p>If you need a <a href="https://www.joerivanveen.com/blog/about/">product photographer</a> or a <a href="https://www.joerivanveen.com/blog/about/">food photographer</a> you may want to consider me. My work area is the Netherlands, I’m centrally based in Naarden. I also <a href="https://www.joerivanveen.com/blog/category/shoot/">shoot</a> <a href="https://www.joerivanveen.com/blog/portrait-photography/">portraits</a> in my home studio and on location. But not fast, I take the time to do it well.</p><p><em>In my work I alternate between photography, writing and coding.</em></p></section>';
echo '<section id="joerivanveen-eu-flag"><h2 class="widget-title">Developer for hire</h2><p>As a developer I can help you whip Wordpress into shape for your needs. To showcase I have a few <a href="https://profiles.wordpress.org/ruigehond/">free plugins in the Wordpress repository</a>, which run on this website as well.</p><h3>WP reading progress <a href="https://wordpress.org/plugins/wp-reading-progress/">⚭</a></h3><p><span class="rating">⭐⭐⭐⭐⭐</span> (1k+ users). Check it on my <a href="https://www.joerivanveen.com/blog">blog posts</a>.</p><h3>Each domain a page <a href="https://wordpress.org/plugins/each-domain-a-page/">⚭</a></h3><p>⭐⭐⭐⭐⭐ Enables me to easily show a single page (or post) on a domain, for SEO purposes (e.g. <a href="https://wordpresscoder.nl">wordpresscoder.nl</a>, <a href="https://joerivanveen.eu">joerivanveen.eu</a>), from a single install.</p><h3>FAQ with categories <a href="https://wordpress.org/plugins/faq-with-categories/">⚭</a></h3><p>An easy way to maintain FAQs on your website, includes structured data output for SEO. Here’s an example: <a href="https://www.joerivanveen.com/blog/photography-faq">photography faq</a>.</p></section>';
echo '<section id="done-with-wordpress">';
// bloembraaden icon
echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"';
echo ' viewBox="0 0 46 46" xml:space="preserve">';
echo '<style type="text/css">';
echo '.petal{opacity:0.81;fill:#4361ad;}';
echo '</style>';
echo '<path class="petal" d="M22.4,0c4.5,0,8.1,2.8,8.1,10.7s-3.6,14.3-8.1,14.3s-8.1-6.4-8.1-14.3S17.9,0,22.4,0z"/>';
echo '<path class="petal" d="M43.2,14.2c2.3,3.7,2.1,8.1-4.1,12s-13,3.9-15.4,0.2s0.7-9.9,6.9-13.8S40.9,10.4,43.2,14.2z"/>';
echo '<path class="petal" d="M39.1,40.9c-3,3-7.3,3.5-12.6-1.8s-7.2-12.1-4.2-15s9.7-1.1,15,4.2S42.1,37.9,39.1,40.9z"/>';
echo '<path class="petal" d="M10.5,45c-3.8-2-5.6-6-2-12.5s9.4-10.3,13.2-8.2s3.9,9,0.4,15.5S14.3,47,10.5,45z"/>';
echo '<path class="petal" d="M1.7,16.2C3.1,12,6.9,9.5,14.3,12s12.2,8,10.7,12.2s-8.6,5.5-16,3S0.2,20.4,1.7,16.2z"/>';
echo '</svg>';
// please continue
echo '<h2>Done with WP</h2><p>Done with WordPress? I can’t blame you. Check out <a href="https://bloembraaden.io/">Bloembraaden</a>, a brand new way to create websites designers and frontend developers should rave about.</p></section>';

echo '</aside>';
?>

<?php get_footer(); ?>
