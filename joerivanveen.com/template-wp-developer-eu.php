<?php
/* Template Name: wp-developer.eu */

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


<aside id="secondary" class="sidebar widget-area" role="complementary">
<section id="photographer-flag"><h2 class="widget-title">Fine art photographer</h2><img src="https://static.bloembraaden.io/14/medium/mont-blanc-i-681.webp" alt="Fine art photographs belong on your wall"/><p>Some of my photographs are for sale. Only works that can be classified as finished. I charge approx 15 eurocents per square centimeter, excluding shipping. Each work is a limited edition. See <a href="https://nonstockphoto.com">Nonstockphoto</a>.</p></section>
<section id="joerivanveen-eu-flag"><h2 class="widget-title">Webdeveloper</h2><p>As a developer I can help you whip Wordpress into shape for your needs with a custom WordPress plugin. To showcase I have a few free plugins in the Wordpress repository.</p><h3>WP reading progress <a href="https://wordpress.org/plugins/wp-reading-progress/">⚭</a></h3><p><span class="rating">⭐⭐⭐⭐⭐</span> (2k+ users). Check it on my <a href="https://www.joerivanveen.com/blog">blog posts</a>.</p><h3>Each domain a page <a href="https://wordpress.org/plugins/each-domain-a-page/">⚭</a></h3><p>⭐⭐⭐⭐⭐ Enables me to easily show a single page (or post) on a domain, for SEO purposes (e.g. <a href="https://wp-developer.eu">wp-developer.eu</a>, <a href="https://joerivanveen.eu">joerivanveen.eu</a>), from a single install.</p><h3>Multisite Landingpages <a href="https://wordpress.org/plugins/multisite-landingpages/">⚭</a></h3><p>The multisite version of Each domain a page. Requires a bit more to setup (obviously) but then all your subsite users can easily manage multiple landingpages themselves.</p><h3>FAQ with categories <a href="https://wordpress.org/plugins/faq-with-categories/">⚭</a></h3><p>An easy way to maintain FAQs on your website, includes structured data output for SEO. Here’s an example: <a href="https://www.joerivanveen.com/blog/photography-faq">photography faq</a>.</p></section>
<section id="done-with-wordpress"><h2>Done with WP</h2><p>Done with WordPress? I can’t blame you. <strong>Most WordPress sites look similar.</strong> More often than not they are ‘designed’ by selecting a theme that looks about right to the client and filling it in.</p>
<!--Bloembraaden icon-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 46 46" xml:space="preserve">
<style type="text/css">
.petal{opacity:0.81;fill:#4361ad;}
</style>
<path class="petal" d="M22.4,0c4.5,0,8.1,2.8,8.1,10.7s-3.6,14.3-8.1,14.3s-8.1-6.4-8.1-14.3S17.9,0,22.4,0z"/>
<path class="petal" d="M43.2,14.2c2.3,3.7,2.1,8.1-4.1,12s-13,3.9-15.4,0.2s0.7-9.9,6.9-13.8S40.9,10.4,43.2,14.2z"/>
<path class="petal" d="M39.1,40.9c-3,3-7.3,3.5-12.6-1.8s-7.2-12.1-4.2-15s9.7-1.1,15,4.2S42.1,37.9,39.1,40.9z"/>
<path class="petal" d="M10.5,45c-3.8-2-5.6-6-2-12.5s9.4-10.3,13.2-8.2s3.9,9,0.4,15.5S14.3,47,10.5,45z"/>
<path class="petal" d="M1.7,16.2C3.1,12,6.9,9.5,14.3,12s12.2,8,10.7,12.2s-8.6,5.5-16,3S0.2,20.4,1.7,16.2z"/>
</svg>
<p>If you want a website that is uniquely suited to you or your business, check out <a href="https://bloembraaden.io/">Bloembraaden</a>. A cloud platform that hosts hand-coded websites specifically built for your purpose.</p></section>

</aside>

<script defer data-domain="wp-developer.eu" src="https://plausible.io/js/script.js"></script>

<?php get_footer(); ?>
