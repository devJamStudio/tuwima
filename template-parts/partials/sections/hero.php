<?php
/**
 * Hero Section Template
 * Updated to use new ACF field structure
 */

// Retrieve the hero fields
$hero_header = get_field('hero_header', get_the_ID()) ?? 'Default Header';
$hero_content = get_field('hero_content', get_the_ID()) ?? 'Default Content';
$hero_button = get_field('hero_button', get_the_ID()) ?? null;
$hero_backgrounds = get_field('hero_backgrounds', get_the_ID()) ?? [];
?>

<section  data-aos-delay="600"  data-aos="fade-up"  class="relative dots__overlay-left   text-white h-[50vh] md:h-[calc(100vh_-_171px)] flex items-end ">
	<!-- Swiper Container -->
	<div class="swiper hero-swiper z-[-100] relative h-full w-full my-auto  flex justify-end">
		<!-- Swiper Wrapper -->

		<div class="swiper-wrapper h-full flex items-center right-0 ">
			<div class="hero-swiper-pagination z-[500] relative swiper-pagination"></div>

			<?php if (!empty($hero_backgrounds)): ?>
				<?php foreach ($hero_backgrounds as $bg): ?>
					<?php if (!empty($bg['image'])):
						?>

						<div
							class="swiper-slide bg-contain bg-no-repeat    relative  bg-right object-contain h-full  z-[-90]"
							style="background-image: url('<?php echo esc_url($bg['image']['url']); ?>');"
							role="img"
							aria-label="Hero Background Slide"
						>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<!-- Fallback Slide -->
				<div
					class="swiper-slide bg-cover bg-right h-full relative z-[1]"
					style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-hero.jpg'); ?>');"
					role="img"
					aria-label="Default Background"
				>
				</div>
			<?php endif; ?>
		</div>

		<!-- Swiper Navigation -->

	</div>

	<!-- Content Overlay -->
	<div class="absolute inset-0  top-10 flex flex-col justify-center items-start text-left text-black  px-4 font-barlow" >
		<div class="container mx-auto flex flex-col relative flex flex-col">
			<div class="relative left-0 z-[99]  w-10 h-full"><div class="hero-swiper-pagination  "></div></div>

			<div class="hero-content__wrapper relative  z-[5]   w-full md:px-4 px-12 lg:px-24 2xl:px-16 " >

			<sub class="text-lg font-bold">Cert<span class="text-primary">Ekspert</span></sub>
		<h1 class="text-5xl md:text-6xl font-bold mb-6 leading-1 "><?php echo esc_html($hero_header); ?></h1>
		<p class="text-xl md:text-xl mb-8"><?php echo esc_html($hero_content); ?></p>
		<?php if (!empty($hero_button['text']) && !empty($hero_button['url'])): ?>
			<a
				href="<?php echo esc_url($hero_button['url']); ?>"
				class="inline-block font-semibold text-white mt-20 relative z-1 rounded"
				role="button"
				aria-label="<?php echo esc_html($hero_button['text']); ?>"
			>
				<button class="btn btn--primary relative ">
				<?php echo esc_html($hero_button['text']); ?>
				</button>
			</a>
		<?php endif; ?>
		</div>
		</div>
	</div>
</section>


<!-- Include Swiper.js styles and script -->
