<?php
/**
 * Hero Section Template
 * Group Name: group_6751e3aaeaf80
 */

// Retrieve the group field
$hero_group = get_field('hero', get_the_ID());
if (!$hero_group) {
	echo '<p>Hero group not found. Ensure ACF is set up correctly and the field group is assigned to this post.</p>';
	return;
}

// Access individual subfields within the group
$header = $hero_group['header'] ?? 'Default Header';
$content = $hero_group['content'] ?? 'Default Content';
$button = $hero_group['button'] ?? null;
$backgrounds = $hero_group['background'] ?? [];
?>

<section  data-aos-delay="600"  data-aos="fade-up"  class="  mt-12   text-white h-[80vh]  md:h-[calc(100vh_-_130px)] flex items-end ">
	<!-- Swiper Container -->
	<div class="swiper hero-swiper z-[-100] relative min-h-full h-full w-full my-auto  flex justify-end md:mt-0">
		<!-- Swiper Wrapper -->

		<div class="swiper-wrapper h-full flex items-center right-0 ">
			<div class="hero-swiper-pagination z-[500] relative swiper-pagination"></div>

			<?php if (!empty($backgrounds)): ?>
				<?php foreach ($backgrounds as $bg): ?>
					<?php if (!empty($bg['img'])):
						?>

						<div
							class="swiper-slide   h-full  z-[-90]"
							role="img"
							aria-label="Hero Background Slide"
						>
							<div class="hidden md:flex h-full w-full bg-cover   bg-no-repeat bg-right-bottom  " style="background-image: url('<?php echo esc_url($bg['img']['link']); ?>');"
							>
							</div>
							<div class="md:hidden flex h-full w-full bg-cover " style="background-image: url('<?php echo esc_url($bg['mobile_img']['link']); ?>');"
							>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<!-- Fallback Slide -->
				<div
					class="swiper-slide bg-cover md:bg-contain lg:bg-cover bg-right h-full relative z-[1]"
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
	<div class="absolute inset-0    flex flex-col justify-start  md:justify-center items-start text-left text-black  px-4 font-barlow" >
		<div class="container mx-auto flex flex-col relative flex flex-col">
			<div class="lg:relative lg:left-0 z-[99]  w-10 h-full"><div class="hero-swiper-pagination  "></div></div>

			<div class="hero-content__wrapper relative  z-[5] top-[-3rem] md:top-0 h-full w-full md:px-4 px-12 lg:px-24 2xl:px-16 " >

			<sub class="text-lg font-bold">Cert<span class="text-primary">Ekspert</span></sub>
		<h1 class="text-xl lg:text-6xl font-bold mb-6 leading-1 "><?php echo $header; ?></h1>
		<p class="text-md md:text-xl mb-8"><?php echo strip_tags($content,['<br>','<span>','<strong>']); ?></p>
		<?php if (!empty($button['content']) && !empty($button['url'])): ?>
			<a
				href="<?php echo esc_url($button['url']); ?>"
				class="inline-block font-semibold text-white lg:mt-20 relative z-1 rounded"
				role="button"
				aria-label="<?php echo esc_html($button['content']); ?>"
			>
				<button class="btn btn--primary relative ">
				<?php echo esc_html($button['content']); ?>
				</button>
			</a>
		<?php endif; ?>
		</div>
		</div>
	</div>
</section>


<!-- Include Swiper.js styles and script -->
