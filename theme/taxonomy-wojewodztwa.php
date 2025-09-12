<?php
get_header();
?>

	<section id="primary ">
		<main id="main" class="overflow-hidden mt-24 lg:mt-[130px] font-barlow ">

		<?php get_template_part( 'template-parts/partials/sections/taxonomy-banner' );?>
		<?php  if ( have_posts() ) : ?>
		<div class="container-fluid ">
		<div class="container-fluid mx-auto flex flex-col     mb-4">
			<?php
			$i = 1;
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
			if ($i % 2 != 0  ):
			?> <div class="container mx-auto  p-12  lg:px-24 2xl:px-16  <?php if ($i % 4 === 1   ): echo 'dots__overlay-left__donation'; else: echo 'dots__overlay-right__donation'; endif;?>">

			<div class="container  flex-col lg:flex-row mx-auto flex gap-8">
			<?php endif;
				get_template_part( 'template-parts/partials/card/donation' );
			if ($i % 2 == 0 ):
				?> </div></div>
			<?php endif;
				// End the loop.
				$i++;
			endwhile;?>
			</div>

		<?php endif;
		?>
		</div>
		</main>
	</section><!-- #primary -->

<?php
get_footer();
