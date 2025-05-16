<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HAW_Starter
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-inner">
			<div class="site-info">
				<?php echo '© ';  bloginfo( 'name' ); echo date(' Y'); ?>
				<span class="sep"> | </span>
				<span><a href="<?php echo get_privacy_policy_url(); ?>" rel="nofollow">Privacy Policy</a></span>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
