<?php
/**
 * HAW_Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HAW_Starter
 */

if ( ! defined( 'haw_starter_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'haw_starter_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function haw_starter_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on HAW_Starter, use a find and replace
		* to change 'haw-starter' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'haw-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'haw-starter' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'haw_starter_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'haw_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function haw_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'haw_starter_content_width', 704 );
}
add_action( 'after_setup_theme', 'haw_starter_content_width', 0 );

/**
 * Uncomment to activate custom post types in custom-post-types.php
 */
// require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function haw_starter_widgets_init() {
	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar', 'haw-starter' ),
	// 		'id'            => 'sidebar-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'haw-starter' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h2 class="widget-title">',
	// 		'after_title'   => '</h2>',
	// 	)
	// );
	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Footer Widgets', 'haw-starter' ),
	// 		'id'            => 'footer-widgets',
	// 		'description'   => esc_html__( 'Add widgets here.', 'haw-starter' ),
	// 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</div>',
	// 	)
	// );
}
add_action( 'widgets_init', 'haw_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function haw_starter_scripts() {

	// STYLES
	wp_enqueue_style( 'haw-starter-style', get_stylesheet_uri(), array(), haw_starter_VERSION );
	wp_style_add_data( 'haw-starter-style', 'rtl', 'replace' );


	// SCRIPTS
	wp_enqueue_script( 'haw-starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), haw_starter_VERSION, true );

	// Enable Glide.js (also uncomment glide under plugins in /sass/style.scss | https://glidejs.com/)
	// wp_enqueue_script( 'glide-js', get_template_directory_uri() . '/js/glide.js', array(), haw_starter_VERSION, true );

	// Enable Rellax.js (lightweight parallax - uncomment to add to project | https://dixonandmoe.com/rellax/)
	// wp_enqueue_script( 'rellax-js', get_template_directory_uri() . '/js/rellax.js', array(), haw_starter_VERSION, true );

	// Enable custom scripts (uncomment to add custom scripts file)
	// wp_enqueue_script( 'haw-starter-custom-scripts', get_template_directory_uri() . '/js/custom.js', array(), haw_starter_VERSION, true );


	// FONTS
	// Enable Adobe Fonts
	// wp_register_style('adobeFonts', 'add-your-url-here', array(), null);
	// wp_enqueue_style('adobeFonts');

	// Enable Google Fonts
	//wp_enqueue_style( 'google-fonts', 'add-your-url-here', false ); 


	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'haw_starter_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 * (includes custom body classes)
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

/**
 * Disable emojis (You can comment this out if your chaching plugin is already disabling emojis)
 */
require get_template_directory() . '/inc/disable-emojis.php';

/**
 * Customised WP admin login
 */
require get_template_directory() . '/custom-admin/custom-login.php';

/**
 * Uncomment to add custom shortcode file
 */
// require get_template_directory() . '/inc/shortcodes.php';

/**
 * Add Google Analytics
 * Add your id in place of YOUR_ID - should be something like G-**********
 */
//add_action('wp_head', 'add_google_analytics');
// function add_google_analytics() {
// 	<!-- Google tag (gtag.js) -->
//  	<script async src="https://www.googletagmanager.com/gtag/js?id=YOUR_ID"></script>
//  	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'YOUR_ID'); </script>
// }