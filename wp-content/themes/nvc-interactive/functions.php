<?php
/**
 * NVC INTERACTIVE functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NVC_INTERACTIVE
 */

if ( ! function_exists( 'nvc_interactive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nvc_interactive_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NVC INTERACTIVE, use a find and replace
		 * to change 'nvc-interactive' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nvc-interactive', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'nvc-interactive' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nvc_interactive_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'nvc_interactive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nvc_interactive_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nvc_interactive_content_width', 640 );
}
add_action( 'after_setup_theme', 'nvc_interactive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nvc_interactive_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nvc-interactive' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nvc-interactive' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nvc_interactive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nvc_interactive_scripts() {
	wp_enqueue_style( 'nvc-interactive-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nvc-interactive-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//popper js for bootstrap 4
	wp_register_script( 'wp-popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', false, '', true );

	//JS Script

	wp_enqueue_script('main-js-script', get_template_directory_uri() . '/dist/script.min.js', array('jquery', 'wp-popper'), time(), true );

	wp_enqueue_script( 'wp-popper');

	wp_enqueue_script( 'nvc-interactive-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//Google fonts
	//* Load Lato and Merriweather Google fonts
	//add_action( 'wp_enqueue_scripts', 'bg_load_google_fonts' );
	//function bg_load_google_fonts() {
	//	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,700|Merriweather:300,700|Josefin+Sans', array(), CHILD_THEME_VERSION );
//	}

//function wpb_add_google_fonts() {

//wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Josefin+Sans:300italic,400italic,700italic,400,700,300', false );
//}

//add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

//function wp_enqueue_google_fonts() {
	//wp_enqueue_style( 'Roboto', 'https://fonts.googleapis.com/css?family=Roboto' );
//}
//add_action( 'wp_enqueue_scripts', 'myprefix_enqueue_google_fonts' );




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nvc_interactive_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/customizer.php';

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



function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> <button type="button" class="btn btn-info">...</button></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
