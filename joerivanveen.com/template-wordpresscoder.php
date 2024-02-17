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
echo '<section id="wordpresscoder-nl-flag"><h2 class="widget-title">WordPress developer</h2><p class="soft-attention">😱 Een landelijke winkel updatete laatst hun WordPress blog waarna het offline ging. Inloggen ging ook niet meer. <em>Er stond alleen een foutmelding</em>. De hosting partij deed natuurlijk niets, want WordPress is niet hun verantwoorde&shy;lijkheid (gelijk hebben ze: schoenmaker blijf bij je leest).<br/>In de logs zag ik direct dat een plugin code gebruikte die niet meer compatible was met de laatste versie van WordPress. Ik kon de plugin eenvoudig bijwerken met een zoek-en-vervang opdracht in mijn eigen programmeer&shy;omgeving. Nadat ik de geüpdatete versie had geplaatst, werkte de site weer als vanouds. Totale tijd op factuur: 2 uur.</p></section>';

echo '<section id="reviews">';
echo do_shortcode('[user-reviews quantity=0]');
echo '</section>';
echo '<section id="done-with-wordpress">';
echo '<h2>Klaar met WP</h2><p>Klaar met WordPress? Ik geef je geen ongelijk. Kijk eens naar <a href="https://bloembraaden.io/">Bloembraaden</a>, een cloud platform dat handgemaakte websites host, die specifiek ontwikkeld zijn voor jouw zaak.</p></section>';
echo '</aside>';
?>

<?php get_footer(); ?>
