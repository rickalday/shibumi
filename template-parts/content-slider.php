<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shibumi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url('<?php the_post_thumbnail_url('shibumi-slider') ?>'); background-size: cover;">

	<div class="entry-wrapper clear">
		


		<div class="entry-text">
			<header class="entry-header">
				<div class="entry-meta">
					<?php
					shibumi_archive_meta();
					?>
				</div><!-- .entry-meta -->
				<?php
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<a href="<?php the_permalink(); ?>" class="readmore" style=""><?php _e('Continue Reading', 'shibumi') ?></a>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
