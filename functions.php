<?php
/**
 * Shibumi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shibumi
 */

if ( ! function_exists( 'shibumi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shibumi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Shibumi, use a find and replace
		 * to change 'shibumi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shibumi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// custom header - disable header image
		add_theme_support( 'custom-header', array(
			'wp-head-callback' => 'shibumi_header_style',
		) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Image sizes
		add_image_size( 'shibumi-archive-sticky', 1100, 99999, false );
		add_image_size( 'shibumi-archive', 550, 99999, false );
		add_image_size( 'shibumi-search', 160, 99999, false );
		add_image_size( 'shibumi-single-post', 740, 99999, false );
		add_image_size( 'shibumi-slider', 1600, 99999, false );
		add_image_size( 'shibumi-single-format', 99999, 650, false );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shibumi' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'gallery',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shibumi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		//add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-color-palette',
			array(
				'name' => __( 'Background Gold', 'shibumi' ),
				'slug' => 'background-gold',
				'color' => '#eee7e1',
			),
			array(
				'name' => __( 'Accent Gold', 'shibumi' ),
				'slug' => 'accent-gold',
				'color' => '#c69f73',
			),
			array(
				'name' => __( 'Accent Green', 'shibumi' ),
				'slug' => 'accent-green',
				'color' => '#273c3c',
			),
			array(
				'name' => __( 'Black', 'shibumi' ),
				'slug' => 'black',
				'color' => '#000',
			),
			array(
				'name' => __( 'Grey', 'shibumi' ),
				'slug' => 'grey',
				'color' => '#404040',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'shibumi_setup' );

// add css for hideing header text
function shibumi_header_style() {
	/*
	 * If header text is set to display, let's bail.
	 */
	if ( display_header_text() ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	</style>
	<?php
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shibumi_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shibumi_content_width', 740 );
}
add_action( 'after_setup_theme', 'shibumi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shibumi_widgets_init() {

	// Define sidebars
	$sidebars = array(
		'sidebar-1' => esc_html__( 'Sidebar', 'shibumi' ),
		'sidebar-2' => esc_html__( 'Footer Widgets', 'shibumi' ),
	);

	// Loop through each sidebar and register
	foreach ( $sidebars as $sidebar_id => $sidebar_name ) {
		register_sidebar( array(
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => sprintf ( esc_html__( 'Widget area for %s', 'shibumi' ), $sidebar_name ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'shibumi_widgets_init' );


/**
 * Registers an editor stylesheet for the theme.
 */
function shibumi_add_editor_styles() {

	add_editor_style( 'editor.css' );
}
add_action( 'admin_init', 'shibumi_add_editor_styles' );

/**
* Enqueue editor styles for Gutenberg
*/

function shibumi_editor_styles() {
	wp_enqueue_style( 'shibumi-editor-style', get_template_directory_uri() . '/editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'shibumi_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function shibumi_scripts() {

	// Google Fonts
	wp_enqueue_style( 'shibumi-font-enqueue', shibumi_font_url(), array(), null );

	// Main theme style
	wp_enqueue_style( 'shibumi-style', get_stylesheet_uri() );


	shibumi_custom_logo_size();

	// Change Colors Style
	$change_colors_style = wp_strip_all_tags( shibumi_change_colors() );
	wp_add_inline_style( 'shibumi-style', $change_colors_style );

	// Theme scripts
	wp_enqueue_script( 'shibumi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shibumi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'shibumi-slick-slider', get_template_directory_uri() . '/js/slick/slick.js', array(), false, true );

	// Main JS file
	wp_enqueue_script( 'shibumi-call-scripts', get_template_directory_uri() . '/js/common.js', array( 'jquery', 'masonry' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'shibumi_scripts' );

/**
 * Enqueue admin scripts
 */
function shibumi_add_admin_scripts() {
	// Admin styles
	wp_enqueue_style( 'shibumi-admin-css', get_template_directory_uri() . '/inc/admin/admin.css' );

	// Admin scripts
	wp_enqueue_media();
	wp_enqueue_script( 'my-upload' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'shibumi-admin-js', get_template_directory_uri() . '/inc/admin/admin.js' );

	wp_enqueue_style( 'shibumi-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

}
add_action( 'admin_enqueue_scripts', 'shibumi_add_admin_scripts' );

/**
 * Adds theme default Google Fonts
 */
function shibumi_font_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by SK Modernist, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$barlow    = esc_html_x( 'on', 'Roboto font: on or off', 'shibumi' );

	if ( 'off' === $barlow ) {

		return;

	} else {

		$font_families = array();

		$font_families[] = 'Roboto:300,400,400i,500,700';

		$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return $google_fonts_url;

	}
}

// add resize logo code to header
function shibumi_custom_logo_size() {

	if(class_exists( 'Kirki' )){
		$logo_size_percent = Kirki::get_option( 'shibumi', 'size_logo' );
	} else {
		$logo_size_percent = 100;
	}

	$add_data = '
	.custom-logo-link img {
		max-width: ' . $logo_size_percent . '%;
	}';

	wp_add_inline_style( 'shibumi-style', $add_data );
}

/**
 * Customize colors.
 */
require get_template_directory() . '/inc/change-colors.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load plugin activation script file.
 */
require get_template_directory() . '/inc/plugin-activation.php';
