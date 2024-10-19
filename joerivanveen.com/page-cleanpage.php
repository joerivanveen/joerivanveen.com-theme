<?php
/**
 * Template Name: Clean Page
 * This template will only display the content you entered in the page editor
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$css_class = implode( ' ', array_map( 'sanitize_title', explode( ',', $_GET['css_class'] ?? '' ) ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body class="cleanpage <?php echo $css_class ?>">
<?php
while ( have_posts() ) {
	the_post();
	the_content();
}

wp_footer();
?>
</body>
</html>
