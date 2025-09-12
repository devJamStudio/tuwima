<?php

$banner = get_field('section'); // Fetch the banner group field
?>

<?php if (!empty($banner)) : ?>
	<!-- Hero Section -->
	<section class="relative bg-contain bg-no-repeat bg-right-bottom min-h-[80vh] md:min-h-[80vh] flex items-center dots__overlay-right" data-aos="fade-up" data-aos-duration="1000">
		<div class="container mx-auto flex-col xl:flex-row text-black p-12 lg:px-24 2xl:px-16 relative flex gap-4 dots__overlay-center" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
			<div class="w-full xl:w-7/12 2xl:w-8/12" data-aos="fade-up" data-aos-duration="1000">
				<?php if (!empty($banner['sub_header'])) : ?>
					<sub class="text-lg font-bold mb-2"><?php echo wp_kses_post($banner['sub_header']); ?></sub>
				<?php endif; ?>
				<?php if (!empty($banner['header'])) : ?>
					<h1 class="text-3xl md:text-6xl font-bold mb-6"><?php echo wp_kses_post($banner['header']); ?></h1>
				<?php endif; ?>
				<?php if (!empty($banner['content'])) : ?>
					<p class="text-md md:text-lg font-bold mb-6"><?php echo wp_kses_post($banner['content']); ?></p>
				<?php endif; ?>
			</div>
			<div class="w-full" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
				<?php get_template_part('template-parts/partials/block/map'); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
