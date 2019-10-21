<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shibumi
 */

$footer_copyright = get_theme_mod( 'shibumi_footer_copyright', '' );
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container">

		<?php
		if ( function_exists('mailchimpSF_signup_form')) {
			$footer_newsletter = get_theme_mod( 'newsletter_toggle', 1 );
			if ( $footer_newsletter ) {
				echo '<div class="footer-newsletter-wrapper">
						<div class="footer-newsletter">';
					mailchimpSF_signup_form();
				echo '</div></div>';
			}
		} ?>

		<?php
		$instagramBox = get_theme_mod( 'instagram_enable', 0 );
		if ( $instagramBox ) : ?>

			<div class="footer-instagram-wrapper instagram-feed clear">

				<?php shibumi_get_instagram_feed(); ?>

			</div>

		<?php endif; ?>

		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>

			<div class="widget-area footer-widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- #secondary -->

		<?php } ?>

		<div class="site-info">
			<span class="footer-site-branding">
				<?php if (has_custom_logo()) { ?>
					<?php the_custom_logo(); ?>
					<p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				} else { ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				} ?>
			</span>
			<span class="footer-site-copyright">
				<?php if ( '' == $footer_copyright ) { ?>

					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'shibumi' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'shibumi' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'shibumi' ), 'shibumi', '<a href="https://hyperplanestudio.com/">Hyperplane Studio</a>' );
						?>

				<?php
				}
				else {
					printf( $footer_copyright );
				} ?>
			</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
