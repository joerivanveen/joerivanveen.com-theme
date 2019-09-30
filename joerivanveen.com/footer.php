<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; Joeri van Veen
		</div><!-- .site-info -->
		<div>
			<a id="toTop"><i class="genericon genericon-collapse"></i></a>
		</div>
	</footer><!-- .site-footer -->

</div><!-- .site -->
<?php wp_footer(); ?>

<script>
/**
 * Google analytics
**/
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-13280339-1', 'auto');
ga('send', 'pageview');
</script>

</body>
</html>
