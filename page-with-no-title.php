<?php
/**
 * Template Name: Page with no title
 * 
 * Templage that doesn't contain the page title as a H1 so
 * you can add your own H1 in a different locatiion.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HAW_Starter
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page-no-title' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
//get_sidebar(); //uncomment for sidebar
get_footer();
