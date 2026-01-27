<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iPortfolio
 */

$copyright_text = get_field('copyright_text', 'option');
?>

<footer id="colophon footer" class="site-footer footer position-relative light-background">
	<div class="container">
		<div class="copyright text-center ">
			<p><?php echo $copyright_text; ?></p>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>