<?php
/* Template Name: wordpresscoder.nl */

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
 */
echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
echo '<section id="wordpresscoder-nl-flag"><h2 class="widget-title">wordpresscoder.nl</h2><p class="soft-attention">😱 Een landelijke winkel updatete laatst hun WordPress blog waarna het offline ging. Inloggen ging ook niet meer. <em>Er stond alleen een foutmelding</em>. De hosting partij deed natuurlijk niets, want WordPress is niet hun verantwoorde&shy;lijkheid (gelijk hebben ze: schoenmaker blijf bij je leest).<br/>Via via kwamen ze bij mij terecht. In de logs zag ik direct dat een plugin code gebruikte die niet meer compatible was met de laatste versie van WordPress. Ik kon de plugin eenvoudig bijwerken met een zoek-en-vervang opdracht in mijn eigen programmeer&shy;omgeving. Nadat ik de geüpdatete versie had geplaatst, werkte de site weer als vanouds. Totale tijd op factuur: 2 uur.</p></section>';

echo '<section id="reviews">';
echo do_shortcode('[user-reviews quantity=0]');
echo '</section>';
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
echo '<h2>Klaar met WP</h2><p>Klaar met WordPress? Ik geef je geen ongelijk. Check <a href="https://bloembraaden.io/">Bloembraaden</a>, een gloednieuwe manier om websites te bouwen voor frontend ontwikkelaars en designers.</p></section>';
echo '</aside>';
?>

<?php get_footer(); ?>
