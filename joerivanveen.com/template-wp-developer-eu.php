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
    <section id="joerivanveen-eu-flag">
        <h2 class="widget-title">Webdeveloper</h2><p>As a developer I can help you whip WordPress into shape for your needs with a custom WordPress plugin. To showcase I have a few free plugins in the WordPress repository.</p>
        <h3>WP reading progress <a href="https://wordpress.org/plugins/wp-reading-progress/">⚭</a></h3><p><span class="rating">⭐⭐⭐⭐⭐</span> (3k+ users). Check it on my <a href="https://www.joerivanveen.com/blog">blog posts</a>.</p>
        <h3>Each domain a page <a href="https://wordpress.org/plugins/each-domain-a-page/">⚭</a></h3><p><span class="rating">⭐⭐⭐⭐⭐</span> Enables me to easily show a single page (or post) on a domain, for SEO purposes (e.g. <a href="https://wp-developer.eu">wp-developer.eu</a>, <a href="https://joerivanveen.eu">joerivanveen.eu</a>), from a single installation.</p>
        <h3>FAQ with categories <a href="https://wordpress.org/plugins/faq-with-categories/">⚭</a></h3><p>An easy way to maintain FAQs on your website, includes structured data output for SEO. Here’s an example: <a href="https://www.joerivanveen.com/blog/photography-faq">photography faq</a>.</p>
        <h3>Compare table <a href="https://wordpress.org/plugins/compare-table/">⚭</a></h3><p><span class="rating">⭐⭐⭐</span> Have your visitors compare items, services or anything really, by providing criteria from an easy admin interface.</p>
    </section>
    <section id="done-with-wordpress">
        <h2>Done with WP</h2>
        <p>Done with WordPress? I can’t blame you. <strong>Most WordPress sites look similar.</strong> More often than not they are ‘designed’ by selecting a theme that looks about right and filling it in.</p>
        <p>If you want a website that is uniquely suited to you or your business, check out <a href="https://bloembraaden.io/">Bloembraaden</a>. A cloud platform that hosts hand-coded websites specifically built for your purpose.</p>
    </section>

</aside>

<script defer data-domain="wp-developer.eu" src="https://plausible.io/js/script.js"></script>

<?php get_footer(); ?>
