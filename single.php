<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shibumi
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
			if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				echo '<div class="related-holder container">';
			    echo do_shortcode( '[jetpack-related-posts]' );
			    echo '</div>';
			}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
