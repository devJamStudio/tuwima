<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CertExpert
 */

get_header();
?>

	<section id="primary">
		<main id="main" class="overflow-hidden mt-24 lg:mt-[169px] font-barlow ">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				$template = get_post_meta(get_the_ID(), '_wp_page_template', true);

// Use a switch statement or if-else logic to handle each template
				switch ($template) {
					case 'page-home.php':
						// Load content specific to the 'Domowa' template
						get_template_part('template-parts/pages/home');
						break;

					case 'page-start-here.php':
						// Load content specific to the 'Zacznij tutaj' template
						get_template_part('template-parts/pages/start');
						break;

					case 'page-find-funds.php':
						// Load content specific to the 'Znajdź środki' template
						get_template_part('template-parts/pages/funds');
						break;

					case 'page-energy.php':
						// Load content specific to the 'Świadectwa energetyczne' template
						get_template_part('template-parts/pages/energy');
						break;

					case 'page-contact.php':
						// Load content specific to the 'Kontakt' template
						get_template_part('template-parts/pages/contact');
						break;

					default:
						// Fallback to generic content
						get_template_part( 'template-parts/content/content', 'page' );
						break;
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
