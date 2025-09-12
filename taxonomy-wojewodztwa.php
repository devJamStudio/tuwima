<?php
get_header();
?>

	<section id="primary ">
<?php get_template_part( 'template-parts/partials/sections/taxonomy-banner' );?>
		<?php  if ( have_posts() ) : ?>
		<div class="container-fluid dots__overlay-left">
		<div class="container mx-auto p-12  lg:px-24 2xl:px-16    mb-4">
			<div class="grid grid-cols-1 lg:grid-cols-2 dots__overlay-right-bottom__donations relative">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/partials/card/donation' );

				// End the loop.
			endwhile;?>
			</div>
		</div>
		<?php endif;
		?>
		</div>
	</section><!-- #primary -->

<?php
get_footer();
