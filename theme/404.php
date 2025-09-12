<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package 2H_ARCHITEKCI
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<section class="container-fluid  contentPage  text-black  min-h-[calc(100vh-240px)] flex justify-center items-center min-h-[50vh] flex-col">

				<h1 class=" font-bold  text-black  text-[5rem]">404</h1>
				<div class="lg:py-4  text-[3rem]  text-black    flex justify-center items-center flex-col  [&amp;_h2]:text-sectionHeading [&amp;_h2]:mb-8 [&amp;_h3]:text-itemHeading [&amp;_h3]:mb-8 [&amp;_h4]:text-bodyText [&amp;_h4]:mb-8">
					<h2>Strony nie znaleziono.</h2>
					<a class="" href="/">
						<button class="barlow-bold self-center mb-12 btn--primary w-full rounded-md text-[1rem]">STRONA GŁÓWNA<span class="barlow-thin chevron"></span></button>
					</a>
				</div>
			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
