<?php
/**
 * Future functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Future
 */

if ( ! defined( 'FUTURE_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'FUTURE_VERSION', 'sonlm4' );
}

if ( ! defined( 'FUTURE_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `future_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'FUTURE_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'future_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function future_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Future, use a find and replace
		 * to change 'future' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'future', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'future' ),
				'menu-2' => __( 'Footer Menu', 'future' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'future_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function future_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'future' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'future' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'future_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function future_scripts() {
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&display=swap', array(), null );

	// Check if we're in development mode (Vite dev server running)
	$is_development = defined('WP_DEBUG') && WP_DEBUG && future_is_vite_dev_server_running();

	if ( $is_development ) {
		// Development mode - load from Vite dev server
		wp_enqueue_script(
			'vite-client',
			'http://localhost:3000/@vite/client',
			array(),
			null,
			false
		);

		wp_enqueue_script(
			'future-vite-main',
			'http://localhost:3000/src/main.js',
			array(),
			null,
			true
		);

		// Add module type for Vite scripts
		add_filter('script_loader_tag', function($tag, $handle) {
			if (in_array($handle, ['vite-client', 'future-vite-main'])) {
				return str_replace('<script ', '<script type="module" ', $tag);
			}
			return $tag;
		}, 10, 2);

	} else {
		// Production mode - load built files
		$css_file = get_template_directory() . '/dist/css/main.css';
		$js_file = get_template_directory() . '/dist/js/main.js';

		if ( file_exists( $css_file ) ) {
			wp_enqueue_style(
				'future-main',
				get_template_directory_uri() . '/dist/css/main.css',
				array(),
				filemtime( $css_file )
			);
		}

		if ( file_exists( $js_file ) ) {
			wp_enqueue_script(
				'future-main',
				get_template_directory_uri() . '/dist/js/main.js',
				array(),
				filemtime( $js_file ),
				true
			);
		}

		// Fallback to original style.css if no built CSS exists
		if ( ! file_exists( $css_file ) ) {
			wp_enqueue_style( 'future-style', get_stylesheet_uri(), array(), FUTURE_VERSION );
			wp_enqueue_style( 'future-custom', get_template_directory_uri() . '/css/custom.css', array(), FUTURE_VERSION );
		}
	}

	// Legacy JS for compatibility
	if ( file_exists( get_template_directory() . '/js/custom.js' ) ) {
		wp_enqueue_script( 'future-legacy', get_template_directory_uri() . '/js/custom.js', array(), FUTURE_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Check if Vite dev server is running
 */
function future_is_vite_dev_server_running() {
	$response = wp_remote_get('http://localhost:3000', array(
		'timeout' => 1,
		'sslverify' => false
	));
	return !is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200;
}
add_action( 'wp_enqueue_scripts', 'future_scripts' );

/**
 * Enqueue the block editor script.
 */
function future_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'future-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			FUTURE_VERSION,
			true
		);
		wp_add_inline_script( 'future-editor', "tailwindTypographyClasses = '" . esc_attr( FUTURE_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'future_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function future_tinymce_add_class( $settings ) {
	$settings['body_class'] = FUTURE_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'future_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * ACF Field Groups for Green House Tuwima
 */
require get_template_directory() . '/inc/acf-simple-working.php';

