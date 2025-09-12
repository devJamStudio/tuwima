<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CertExpert
 */


/**
 * Dynamic page  loader
 *
 */
function get_custom_templates() {
	return [
		'page-home.php'             => 'Domowa',
		'page-start-here.php'  => 'Zacznij tutaj',
		'page-find-funds.php'  => 'Znajdź środki',
		'page-energy.php'      => 'Świadectwa energetyczne',
		'page-contact.php'     => 'Kontakt',
	];
}

function register_custom_page_templates($templates) {
	return array_merge($templates, get_custom_templates());
}
add_filter('theme_page_templates', 'register_custom_page_templates');

function load_custom_page_template($template) {
	global $post;

	$custom_templates = get_custom_templates();
	$custom_template = get_post_meta($post->ID, '_wp_page_template', true);

	if (isset($custom_templates[$custom_template])) {
		return locate_template('page-dynamic.php');
	}

	return $template;
}


function future_custom_logo_setup() {
	$defaults = array(
		'height'               => '100%',
		'width'                => '100%',
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false,
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'future_custom_logo_setup' );

add_theme_support( 'custom-logo' );
add_action('customize_register', 'scroll_logo_customize_register');

function scroll_logo_customize_register($wp_customize){
	$wp_customize->add_setting('scroll_logo');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'scroll_logo', array(
		'label'    => __('Scroll Logo', 'store-front'),
		'section'  => 'title_tagline',
		'settings' => 'scroll_logo',
		'priority' => 4,
	)));
}

function scroll_logo()
{
	// Get the custom logo URL from the theme customizer setting
	$logo_url = get_theme_mod('scroll_logo');
	$site_name = get_bloginfo('name');
	// If a logo has been set, use its URL; otherwise, use a fallback image

	// Generate the HTML output for the logo
	$logo = '<a href="' . esc_url(home_url('/')) . '" class="scroll-logo-link" rel="home" aria-current="page">';
	$logo .= '<img width="100%" height="100%"" src="' . $logo_url . '" class="scroll-logo" alt="'.$site_name.'" decoding="async">';
	$logo .= '</a>';

	return $logo;
}
function alt_logo()
{
	// Get the custom logo URL from the theme customizer setting
	$logo_url = get_theme_mod('scroll_logo');
	$site_name = get_bloginfo('name');
	// If a logo has been set, use its URL; otherwise, use a fallback image

	// Generate the HTML output for the logo
	$logo = '<img width="116" height="84"" src="' . $logo_url . '" class="alt-logo object-contain" alt="'.$site_name.'"decoding="async">';

	return $logo;
}
function footer_logo()
{
	// Get the custom logo URL from the theme customizer setting
	if (have_rows('footer_content', 'option')) :
		while (have_rows('footer_content', 'option')) : the_row();

			$logo_url = get_sub_field('footer_logo');

			// If a logo has been set, use its URL; otherwise, use a fallback image

			// Generate the HTML output for the logo
			$logo = '<img width="300" height="300" src="' . $logo_url . '" class="footer-logo" alt="2H+ ARCHITEKCI" decoding="async">';

			echo  $logo;
		endwhile;
	endif;;
}

function register_contact_menu() {
	register_nav_menu('contact', __('Kontakt'));
}
add_action('after_setup_theme', 'register_contact_menu');

/**
 * Enqueue Thickbox dependencies for lightbox.
 *
 * @link https://developer.wordpress.org/reference/functions/add_thickbox/
 *
 * @return void
 */

add_filter('use_block_editor_for_post_type', 'use_classic_editor_on_post_type', 10, 2);
function use_classic_editor_on_post_type($use_block_editor, $post_type)
{
	if ($post_type === 'page' || $post_type === 'projekty'  || $post_type === 'post'   ) {
		$use_block_editor = false;
		remove_post_type_support('page', 'editor');
		remove_post_type_support('projekty', 'editor');

		//
	}

	return $use_block_editor;
}
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function future_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'future_pingback_header' );
function future_mce4_options($init) {

	$custom_colours = '
        "f39c8e", "Primary",
        "f19a8e", "Primary-alt",
        "070a09", "Black",
        "e0e0df", "Grey",
        "FF0000", "Red",
        "FF99CC", "Pink",
        "CCFFFF", "Turquoise"
    ';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '['.$custom_colours.']';

	// change the number of rows in the grid if the number of colors changes
	// 8 swatches per row
	$init['textcolor_rows'] = 1;

	return $init;
}
add_filter('tiny_mce_before_init', 'future_mce4_options');
add_filter( 'mce_buttons_2', function( $buttons ) {
	array_unshift( $buttons, 'fontselect' );
	array_unshift( $buttons, 'fontsizeselect' );
	return $buttons;
} );
add_filter( 'tiny_mce_before_init', function( $initArray ) {
	$initArray['font_formats'] = 'Lato=Lato; Montserrat=Montserrat; Barlow=Barlow;';
	return $initArray;
} );
add_action( 'admin_init', function() {
	$font_url = 'https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700|Barlow:300,400,700';
	add_editor_style( str_replace( ',', '%2C', $font_url ) );
} );
/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function future_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'future_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function future_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'future' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'future' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'future' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'future' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'future' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'future' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'future' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'future' ) . '<span>' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt   = get_post_type_object( get_queried_object()->name );
		$title = sprintf(
			/* translators: %s: Post type singular name */
			esc_html__( '%s Archives', 'future' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax   = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf(
			/* translators: %s: Taxonomy singular name */
			esc_html__( '%s Archives', 'future' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'future' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'future_get_the_archive_title' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
function future_can_show_post_thumbnail() {
	return apply_filters( 'future_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function future_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
function future_continue_reading_link( $more_string ) {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s', 'future' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		$more_string = '<a href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}

	return $more_string;
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'future_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'future_continue_reading_link' );

/**
 * Outputs a comment in the HTML5 format.
 *
 * This function overrides the default WordPress comment output in HTML5
 * format, adding the required class for Tailwind Typography. Based on the
 * `html5_comment()` function from WordPress core.
 *
 * @param WP_Comment $comment Comment to display.
 * @param array      $args    An array of arguments.
 * @param int        $depth   Depth of the current comment.
 */
function future_html5_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	$commenter          = wp_get_current_commenter();
	$show_pending_links = ! empty( $commenter['comment_author'] );

	if ( $commenter['comment_author_email'] ) {
		$moderation_note = __( 'Your comment is awaiting moderation.', 'future' );
	} else {
		$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'future' );
	}
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					if ( 0 !== $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					?>
					<?php
					$comment_author = get_comment_author_link( $comment );

					if ( '0' === $comment->comment_approved && ! $show_pending_links ) {
						$comment_author = get_comment_author( $comment );
					}

					printf(
						/* translators: %s: Comment author link. */
						wp_kses_post( __( '%s <span class="says">says:</span>', 'future' ) ),
						sprintf( '<b class="fn">%s</b>', wp_kses_post( $comment_author ) )
					);
					?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<?php
					printf(
						'<a href="%s"><time datetime="%s">%s</time></a>',
						esc_url( get_comment_link( $comment, $args ) ),
						esc_attr( get_comment_time( 'c' ) ),
						esc_html(
							sprintf(
							/* translators: 1: Comment date, 2: Comment time. */
								__( '%1$s at %2$s', 'future' ),
								get_comment_date( '', $comment ),
								get_comment_time()
							)
						)
					);

					edit_comment_link( __( 'Edit', 'future' ), ' <span class="edit-link">', '</span>' );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div <?php future_content_class( 'comment-content' ); ?>>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
			if ( '1' === $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
			}
			?>
		</article><!-- .comment-body -->
	<?php
}
function prefix_nav_description( $item_output, $item, $depth, $args )
{


			if ($item->description == 'fa-solid fa-house'):
				$item_output = str_replace($args->link_after . '</a>', '<span class="text-lg text-black '. $item->description. '"></span>' . $args->link_after . '</a>', $item_output);
			endif;


	if ( 'kontakt' === $args->menu->slug ) :
		if (!empty($item->description)) {
			if ($item->description == 'fa-solid fa-phone') {
				$item_output = str_replace($args->link_after . '</a>', '<span class="text-lg ml-5 mr-2 text-black hover:text-primary '. $item->description. '"> </span> &nbsp <span class="text-lg text-primary font-bold ml-2 " > '.$item->post_title.'</span>' . $args->link_after . '</a>', $item_output);

			}
			else {
			$item_output = str_replace($args->link_after . '</a>', '<span class="text-lg text-black hover:text-primary '. $item->description. '"></span>' . $args->link_after . '</a>', $item_output);
		};}

	endif;
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );
function register_inwestycje_cpt() {

	$labels = [
		'name'               => _x('Inwestycje', 'Post Type General Name', 'textdomain'),
		'singular_name'      => _x('Inwestycja', 'Post Type Singular Name', 'textdomain'),
		'menu_name'          => __('Inwestycje', 'textdomain'),
		'name_admin_bar'     => __('Inwestycja', 'textdomain'),
		'add_new'            => __('Dodaj Nową', 'textdomain'),
		'add_new_item'       => __('Dodaj Nową Inwestycję', 'textdomain'),
		'new_item'           => __('Nowa Inwestycja', 'textdomain'),
		'edit_item'          => __('Edytuj Inwestycję', 'textdomain'),
		'view_item'          => __('Zobacz Inwestycję', 'textdomain'),
		'all_items'          => __('Wszystkie Inwestycje', 'textdomain'),
		'search_items'       => __('Szukaj Inwestycji', 'textdomain'),
		'not_found'          => __('Brak Inwestycji', 'textdomain'),
		'not_found_in_trash' => __('Brak Inwestycji w Koszu', 'textdomain'),
	];

	$args = [
		'label'               => __('Inwestycje', 'textdomain'),
		'labels'              => $labels,
		'supports'            => ['title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'taxonomy'],
		'public'              => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-site-alt3', // Icon for the admin menu
		'has_archive'         => true,
		'rewrite'             => ['slug' => 'inwestycje'],
		'capability_type'     => 'post',
		'show_in_rest'        => true, // Enables Gutenberg editor support
		'hierarchical'        => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'query_var'           => true,
	];

	register_post_type('inwestycje', $args);
}

add_action('init', 'register_inwestycje_cpt');

function register_wojewodztwa_taxonomy() {
	$labels = [
		'name'              => _x('Województwa', 'taxonomy general name', 'textdomain'),
		'singular_name'     => _x('Województwo', 'taxonomy singular name', 'textdomain'),
		'search_items'      => __('Szukaj Województw', 'textdomain'),
		'all_items'         => __('Wszystkie Województwa', 'textdomain'),
		'parent_item'       => __('Województwo nadrzędne', 'textdomain'),
		'parent_item_colon' => __('Województwo nadrzędne:', 'textdomain'),
		'edit_item'         => __('Edytuj Województwo', 'textdomain'),
		'update_item'       => __('Zaktualizuj Województwo', 'textdomain'),
		'add_new_item'      => __('Dodaj Nowe Województwo', 'textdomain'),
		'new_item_name'     => __('Nowa Nazwa Województwa', 'textdomain'),
		'menu_name'         => __('Województwa', 'textdomain'),
	];

	$args = [
		'hierarchical'      => true, // Acts like categories
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => ['slug' => 'wojewodztwa'],
	];

	register_taxonomy('wojewodztwa', ['inwestycje'], $args);
}

add_action('init', 'register_wojewodztwa_taxonomy');


function mod_contact7_form_content( $template, $prop ) {
	if ( 'form' == $prop ) {
		// Define the path to the template file
		$form_template_path = get_template_directory() . '/template-parts/partials/form/contact.php';

		// Check if the template file exists
		if ( file_exists( $form_template_path ) ) {
			// Include the template file, ensuring it returns an array
			$template_parts = include $form_template_path;

			// Use implode to combine the array elements into a string
			if ( is_array( $template_parts ) ) {
				return implode( '', $template_parts );
			}
		}

		// Fallback if the file does not exist or does not return an array
		return implode( '', array(
			'<div class=" fll row">',
			'<div class="col">',
			'[text* your-name placeholder="Name"]',
			'[email* your-email placeholder="Email"]',
			'[text* your-subject placeholder="Subject"]',
			'</div>',
			'<div class="col">',
			'[textarea* your-message placeholder="Message"]',
			'</div>',
			'</div>',
			'<div class="row">',
			'[submit class:btn "Send Mail"]',
			'</div>'
		) );
	} else {
		return $template;
	}
}
add_filter(
	"wpcf7_default_template",
	"mod_contact7_form_content",
	10,
	2
);
function mod_contact7_form_title( $template ) {
	$template->set_title( "Formularz Kontaktowy" );
  return $template;
}
add_filter(
	"wpcf7_contact_form_default_pack",
	"mod_contact7_form_title"
);
add_filter('wpcf7_autop_or_not', '__return_false');

function update_contact_form_on_php_change() {
	// Define the PHP file path
	$form_template_path = get_template_directory() . '/template-parts/partials/form/contact.php';


	// Check if the PHP file exists
	if ( file_exists( $form_template_path ) ) {
		// Get the last modification time of the PHP file
		$file_mod_time = filemtime( $form_template_path );
		// Get the last saved modification time from the database
		$last_mod_time = get_option( 'cf7_last_mod_time', 0 );

		// Check if the file has been updated

			// Include the PHP file to get the new content
			$template_parts = include $form_template_path;

			// Ensure the file returns an array
			if ( is_array( $template_parts ) ) {
				$form_content = implode( '', $template_parts );

				// Form ID (use your actual form ID here)
				$args = array(
					'post_type'      => 'wpcf7_contact_form',  // Specify the custom post type
				                     // We want only one post
					'post_status'    => 'publish',              // Only published posts
					'title'          => 'Formularz Kontaktowy',  // Specify the title of the form
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();

						// You can now access the post details, for example:
						$form_id = get_the_ID();

						// Add other details you need

					}
				}   // Form ID from the shortcode

                // Load the form post object by ID
                $form_post = get_post( $form_id );

					// Update the form content in the database

					wp_update_post( array(
						'ID'           => $form_id,
						'post_content' => $form_content,
					) );
					update_post_meta( $form_id, '_form', $form_content );
				// Update the last modification time in the database
					update_option( 'cf7_last_mod_time', $file_mod_time );

            }
		}

}
add_action( 'init', 'update_contact_form_on_php_change' );
