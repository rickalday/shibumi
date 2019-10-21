<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Shibumi
 */

if ( ! function_exists( 'shibumi_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function shibumi_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'shibumi' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'shibumi_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function shibumi_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'shibumi' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'shibumi_single_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function shibumi_single_posted_by() {
		$byline = '<span class="byline-text">' . sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'BY %s', 'post author', 'shibumi' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		) . '</span>';

		$avatar = '<span class="byline-img">' . get_avatar( get_the_author_meta( 'ID' ), $size = '30') . '</span>';

		echo '<span class="byline"> ' . $avatar . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'shibumi_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function shibumi_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() || 'jetpack-portfolio' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( 'jetpack-portfolio' == get_post_type() ) {
				$categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '', esc_html__( ', ', 'shibumi' ), '' );
			} else {
				$categories_list = get_the_category_list( esc_html__( ', ', 'shibumi' ) );
			}

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'shibumi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			if ( 'jetpack-portfolio' == get_post_type() ) {
				$tags_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag', '', esc_html__( ', ', 'shibumi' ), '');
			} else {
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'shibumi' ) );
			}

			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'shibumi' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'shibumi' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'shibumi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'shibumi_archive_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function shibumi_archive_meta() {

		if ( 'post' == get_post_type() || 'jetpack-portfolio' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( 'jetpack-portfolio' == get_post_type() ) {
				$categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '', esc_html__( ', ', 'shibumi' ), '' );
			} else {
				$categories_list = get_the_category_list( esc_html__( ', ', 'shibumi' ) );
			}

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'shibumi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'shibumi' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'shibumi_single_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function shibumi_single_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() || 'jetpack-portfolio' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			if ( 'jetpack-portfolio' == get_post_type() ) {
				$tags_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag', '', esc_html__( ', ', 'shibumi' ), '');
			} else {
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'shibumi' ) );
			}
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'shibumi' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'shibumi_reading_time' ) ) :
	/**
	 * Prints HTML with estimated reading time for the current post.
	 */
	function shibumi_reading_time() {

		$display_reading_time = get_theme_mod( 'single_reading_time', 1 );

		if ($display_reading_time) {
			global $post;
			$content = get_post_field( 'post_content', $post->ID );
			$word_count = str_word_count( strip_tags( $content ) );
			$readingtime = ceil($word_count / 200);

			$timer = ' ' . esc_html__('min' , 'shibumi');
			$totalreadingtime = '<div class="reading-time"><span class="reading-time-desc">' . esc_html__('Reading Time: ' , 'shibumi') . '</span>' . $readingtime . $timer . '</div>';

			echo $totalreadingtime;
		}
	}
endif;

if ( ! function_exists( 'shibumi_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function shibumi_post_thumbnail() {
		if ( post_password_required() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Custom post navigation
 *
 * @since shibumi 1.0
 */
function shibumi_post_navigation() {

	$prev_post_navigation = '<span class="post-nav-text">' . esc_html__( 'Previous Article', 'shibumi' ) . '</span>';
	$next_post_navigation = '<span class="post-nav-text">' . esc_html__( 'Next Article', 'shibumi' ) . '</span>';
	$post_title           = '%title';
	$post_title_start     = '<div class="post-nav-title">';
	$post_title_end       = '</div>';

	the_post_navigation( array(
		'prev_text'                  =>  $prev_post_navigation . $post_title_start . $post_title . $post_title_end,
		'next_text'                  =>  $next_post_navigation . $post_title_start . $post_title . $post_title_end,
		'screen_reader_text' => esc_html__( 'Continue Reading',  'shibumi' ),
	) );
}

/**
* A title for the search.php template that displays the total number of search results and search terms
*
* @return  String [Search results count]
*/
function shibumi_search_results_count() {
	$archive_results = get_theme_mod( 'archive_results_number', 1 );

	if ($archive_results) {
		global $wp_query;

		$result_count = '<span class="results-count-wrapper"><span class="results-text">' . esc_html__( 'Results',  'shibumi' ) . '</span>';
		$result_count .= '<span class="results-count">' . $wp_query->found_posts;
		$result_count .= '</span></span>';

		echo $result_count;
	}
}

/**
 * Display the archive title based on the queried object.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function shibumi_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Category', 'shibumi' ) . '</span>' . single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Tag', 'shibumi' ) . '</span>' . single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Author', 'shibumi' ) . '</span>' . '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_year() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Year', 'shibumi' ) . '</span>' .  get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'shibumi' ) );
	} elseif ( is_month() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Month', 'shibumi' ) . '</span>' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'shibumi' ) );
	} elseif ( is_day() ) {
		$title = '<span class="archive-type-wrapper">' . esc_html__( 'Date', 'shibumi' ) . '</span>' . get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'shibumi' ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'shibumi' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'shibumi' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = '<span class="archive-type-wrapper">' . $tax->labels->singular_name . '</span>' . single_term_title( '', false );
	} else {
		$title = esc_html__( 'Archives', 'shibumi' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}

/**
 * Displays post featured image
 *
 * @since  shibumi 1.0
 */
function shibumi_featured_image() {

	if ( has_post_thumbnail() ) :

		if ( is_single() || 'jetpack-portfolio' == get_post_type() ) { ?>

			<div class="<?php if ( 'jetpack-portfolio' == get_post_type() ) { ?>portolio-content<?php } else { ?>featured-content<?php }?> featured-image <?php echo esc_attr( shibumi_get_featured_image_class() ); ?>">
				<?php

				$url = wp_get_attachment_url( get_post_thumbnail_id( ) );
				$filetype = wp_check_filetype($url);
				if ($filetype['ext'] == 'gif') {
					$thumb_size = '';
				} else {
					$thumb_size = 'shibumi-single-post';
				}

				the_post_thumbnail( $thumb_size ); ?>
			</div>

		<?php } else { ?>
			<div class="entry-img">
				<div class="featured-content featured-image <?php echo esc_attr( shibumi_get_featured_image_class() ); ?>">

					<?php

						$lazy_load_class = 'skip-lazy';

						$url = wp_get_attachment_url( get_post_thumbnail_id( ) );
						$filetype = wp_check_filetype($url);
						if ($filetype['ext'] == 'gif') {
							$thumb_size = '';
						} else {
							if (is_sticky()) {
								$thumb_size = 'shibumi-archive-sticky';
							} else {
								$thumb_size = 'shibumi-archive';
							}
						}
					?>

					<?php if ( 'image' == get_post_format() ) {

						$thumb_id        = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'full', true );
						$thumb_url       = $thumb_url_array[0];

					?>
						<a href="<?php echo esc_url( $thumb_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" class="thickbox">
							<?php the_post_thumbnail($thumb_size, array( 'class' => $lazy_load_class ) ); ?>
						</a>

					<?php } else { ?>

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumb_size, array( 'class' => $lazy_load_class ) ); ?></a>

					<?php } ?>

				</div>
			</div>

		<?php }

	else :

		return;

	endif;
}

/**
 * Displays post featured image for hero positioned: slider or last post
 *
 * @since  shibumi 1.0
 */
if ( ! function_exists( 'shibumi_slider_featured_image' ) ) :
function shibumi_slider_featured_image() {

	if ( has_post_thumbnail() ) : ?>

		<div class="entry-img">
			<div class="featured-content featured-image <?php echo esc_attr( shibumi_get_featured_image_class() ); ?>">

			<?php the_post_thumbnail( 'full', array( 'class' => 'skip-lazy' )); ?>

			</div>
		</div>

		<?php

	else : ?>

		<div class="entry-img"></div>

	<?php
	endif;

}
endif;

/**
 * Displays post featured image
 *
 * @since  shibumi 1.0
 */
if ( ! function_exists( 'shibumi_featured_media' ) ) :
function shibumi_featured_media() {

	if ( 'gallery' == get_post_format() ) :

		if ( get_post_gallery() && ! post_password_required() ) { ?>

			<div class="featured-content entry-gallery slick-wrapper">
				<?php echo get_post_gallery(); ?>
			</div><!-- .entry-gallery -->

			<div class="scrollbar">
				<div class="handle"></div>
			</div>

		<?php } else {

			shibumi_featured_image();

		}

	else :

		shibumi_featured_image();

	endif;

}
endif;

/**
 * Filter content for gallery post format
 *
 * @since  shibumi 1.0
 */
if ( ! function_exists( 'shibumi_filter_post_content' ) ) :
function shibumi_filter_post_content( $content ) {

    if ( 'gallery' == get_post_format() && 'post' == get_post_type() ) {
        $regex   = '/\[gallery.*]/';
        $content = preg_replace( $regex, '', $content, 1 );
    }

    return $content;
}
endif;
add_filter( 'the_content', 'shibumi_filter_post_content' );

/**
 * Insert sharedaddy
 *
 * @since shibumi 1.0
 */
function shibumi_insert_sharedaddy() {

	// Disabled for this post?

	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'sharedaddy' ) ) {

		$share_content = sharing_display( '', false );

		if ( function_exists( 'sharing_display' ) && !empty($share_content) ) {
			echo '<div class="sharedaddy-holder"><i class="icon-share"></i>';
			echo $share_content;
			echo '</div>';
		}
	};
}


/**
 * Insert class to archive wrapper
 *
 * @since shibumi 1.0
 */
function shibumi_archive_class() {

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$class = 'archive-has-sidebar';
	}

	return $class;
}

/**
 * Insert site branding
 *
 * @since shibumi 1.0
 */
function shibumi_site_branding() {
	?>
	<div class="site-branding">
		<?php
		if ( is_front_page() && is_home() ) :
			?>

			<?php if (has_custom_logo()) { ?>
				<?php the_custom_logo(); ?>
				<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			} else { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			}
		else :
			?>

			<?php if (has_custom_logo()) { ?>
				<?php the_custom_logo(); ?>
				<p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			} else { ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			}
		endif; ?>
	</div><!-- .site-branding -->

	<?php
}

/**
 * shibumi custom paging function
 *
 * Creates and displays custom page numbering pagination in bottom of archives
 *
 * @since shibumi 1.0
 */

function shibumi_numbers_pagination() {

	global $wp_query, $wp_rewrite;

	if ( $wp_query->max_num_pages > 1 ) :

		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		$pagination = array(
			'base'      => @add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $wp_query->max_num_pages,
			'current'   => $current,
			'end_size'  => 1,
			'type'      => 'list',
			'prev_next' => true,
			'prev_text' => esc_html__( 'Prev', 'shibumi' ),
			'next_text' => esc_html__( 'Next', 'shibumi' )
		);

		if ( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

		if ( ! empty( $wp_query->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		}

		// Display pagination
		printf( '<nav class="navigation posts-navigation"><h4 class="screen-reader-text">%1$s</h4>%2$s</nav>',
			esc_html__( 'Page navigation', 'shibumi' ),
			paginate_links( $pagination )
		);

	endif;

}


/**
 * Get Instagram Images Feed
 *
 * @since shibumi 1.0
 */
function shibumi_get_instagram_feed() {

	$username = get_theme_mod( 'instagram_username' );
	$limit    = 6;
	$link     = $username;

	if ( $username != '' && class_exists( 'null_instagram_widget' ) ) {

		$instance = array(
		    'title'    => '',
		    'username' => $username,
		    'number'   => $limit,
		    'size'     => 'large',
		    'target'   => '_blank',
		    'link'     => '',
		);

		the_widget('null_instagram_widget', $instance);

	}
	else if ( !class_exists( 'null_instagram_widget' ) ) {
		return esc_html_e( 'Please install "WP Instagram Widget" plugin.', 'shibumi' );
	}

	else {
		return esc_html_e( 'Please enter Instagram username to display feed.', 'shibumi' );
	}

	if ( $username != '' ) {

		?>

		<p class="instagram-username clear">
			<a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="_blank">
				<?php echo esc_html( $link ); ?>
				<span><?php esc_html_e( '@ Instagram', 'shibumi' ); ?></span>
			</a>
		</p>

		<?php

	}
}

function shibumi_front_sections() {

	if(class_exists( 'Kirki' )){
		// Theme_mod settings to check.
		$toggle = Kirki::get_option( 'shibumi', 'front_toggle' );

		if ($toggle) { ?>

		<?php
			$sections = Kirki::get_option( 'shibumi', 'front_action' );
			$has_sidebar = is_active_sidebar( 'sidebar-1' );
			$displayed_sidebar = false;

		?>

		<div class="front-page-wrapper clear">
		<?php foreach( $sections as $section ) { ?>

			<?php
			if ($section['action_type'] == 'slider') {

				$args = array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => $section['action_number'],
					'cat' => $section['action_category'],
				);

				$slider_query = new WP_Query($args);


				if ( $slider_query->have_posts() ) { ?>

				<div class="front-slider-wrapper <?php echo 'front-slider-wrapper-' . $section['action_slider_style']; if ($section['action_slider_style'] == 'side' ) {echo ' container';} ?> clear">
					<?php
					$title = $section['action_title'];
					if ($title != '') { ?>

						<h2 class="section-title <?php if ($section['action_slider_style'] == 'float' ) {echo 'container';} ?>"><?php echo $title; ?></h2>

					<?php } ?>
				<div class="front-slider front-slider-<?php echo $section['action_slider_style']; ?>">
					<?php

					$slider_count = $slider_query->post_count;

					while( $slider_query->have_posts() ) : $slider_query->the_post();
						get_template_part( 'template-parts/content', 'slider' );

					endwhile;
					wp_reset_postdata(); ?>

					<div class="front-slider-dots">
						<span class="dots-wrapper">
						</span>
						<span class="count-wrapper">
							<span class="count-divider"><?php echo esc_attr__( '/', 'shibumi' ) ?></span>
							<span class="count-number"><?php echo $slider_count; ?></span>
						</span>
					</div>

					<div class="front-slider-arrows"></div>

				</div>
				</div>
				<?php
				}

			} elseif ($section['action_type'] == 'archive') {

				$args = array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => $section['action_number'],
					'ignore_sticky_posts' => 0,
					'cat' => $section['action_category'],
				);

				$archive_query = new WP_Query($args);


				if ( $archive_query->have_posts() ) { ?>

				<div class="front-archive-wrapper <?php if ( $has_sidebar && !$displayed_sidebar ) { echo 'archive-has-sidebar'; }; ?> container clear">
					<?php
					$title = $section['action_title'];
					if ($title != '') { ?>

						<h2 class="section-title"><?php echo $title; ?></h2>

					<?php } ?>
				<div class="front-archive front-archive-<?php echo $section['action_archive_style']; ?>">
					<?php

					while( $archive_query->have_posts() ) : $archive_query->the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					wp_reset_postdata(); ?>

				</div>
				<?php
					if ( $has_sidebar && !$displayed_sidebar ) { get_sidebar(); };
						$displayed_sidebar = true;
				?>
				</div>
				<?php
				}

			} elseif ($section['action_type'] == 'cta') { ?>

				<div class="front-cta clear <?php
					if ($section['action_cta_image'] == '') {
						echo ' no-featured-image';
					} ?> ">


						<?php
						if ($section['action_cta_image'] != '') { ?>
							<div class="featured-image front-cta-image">
								<img src="<?php echo wp_get_attachment_url($section['action_cta_image']); ?>" alt="<?php echo $section['action_title']; ?>">
							</div>
						<?php } ?>

						<div class="front-cta-text container">
							<?php
							$title = $section['action_title'];
							if ($title != '') { ?>
								<?php
								if ($section['action_cta_link'] != '') { ?>
									<a href="<?php echo $section['action_cta_link']; ?>">
								<?php } ?>
									<h2 class="section-title"><?php echo $title; ?></h2>
								<?php
								if ($section['action_cta_link'] != '') { ?>
									</a>
								<?php } ?>
							<?php }

							if ($section['action_cta_text'] != '') { ?>
								<p><?php echo $section['action_cta_text']; ?></p>
							<?php }

							if ($section['action_cta_button'] != '' && $section['action_cta_link'] != '') { ?>
								<a href="<?php echo $section['action_cta_link']; ?>" class="button">
									<?php echo $section['action_cta_button']; ?>
								</a>
							<?php } ?>
						</div>
				</div>
			<?php
			} elseif ($section['action_type'] == 'portfolio-slider') {

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => $section['action_number'],
				);

				$slider_query = new WP_Query($args);


				if ( $slider_query->have_posts() ) { ?>

				<div class="front-slider-wrapper <?php echo 'front-slider-wrapper-' . $section['action_slider_style']; if ($section['action_slider_style'] == 'side' ) {echo ' container';} ?> clear">
					<?php
					$title = $section['action_title'];
					if ($title != '') { ?>

						<h2 class="section-title <?php if ($section['action_slider_style'] == 'float' ) {echo 'container';} ?>"><?php echo $title; ?></h2>

					<?php } ?>
				<div class="front-slider front-slider-<?php echo $section['action_slider_style']; ?>">
					<?php

					$slider_count = $slider_query->post_count;

					while( $slider_query->have_posts() ) : $slider_query->the_post();
						get_template_part( 'template-parts/content', 'slider' );

					endwhile;
					wp_reset_postdata(); ?>

					<div class="front-slider-dots">
						<span class="dots-wrapper">
						</span>
						<span class="count-wrapper">
							<span class="count-divider"><?php echo esc_attr__( '/', 'shibumi' ) ?></span>
							<span class="count-number"><?php echo $slider_count; ?></span>
						</span>
					</div>

					<div class="front-slider-arrows"></div>

				</div>
				</div>
				<?php
				}

			} elseif ($section['action_type'] == 'portfolio-archive') {

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => $section['action_number'],
					'ignore_sticky_posts' => 0,
				);

				$archive_query = new WP_Query($args);


				if ( $archive_query->have_posts() ) { ?>

				<div class="front-archive-wrapper container clear">
					<?php
					$title = $section['action_title'];
					if ($title != '') { ?>

						<h2 class="section-title"><?php echo $title; ?></h2>

					<?php } ?>
				<div class="front-archive front-archive-<?php echo $section['action_archive_style']; ?>">
					<?php

					while( $archive_query->have_posts() ) : $archive_query->the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					wp_reset_postdata(); ?>

				</div>
				</div>
				<?php
				}

			}

		} ?>
		</div>

		<?php
		}
	}
}


/* Convert hexdec color string to rgb(a) string */

function shibumi_hex2rgba( $color, $opacity = false ) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if ( empty( $color ) ) {
        return $default;
    }

    //Sanitize $color if "#" is provided
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );

    //Check if opacity is set(rgba or rgb)
    if ( $opacity ) {
        if ( abs( $opacity ) > 1 ) {
            $opacity = 1.0;
        }
        $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode( ",",$rgb ) . ')';
    }

    // Return rgb(a) color string
    return $output;
}
