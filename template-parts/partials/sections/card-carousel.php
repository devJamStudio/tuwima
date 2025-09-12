<?php
$offer_header = get_field('offer_header', get_the_ID());
$carousel_cards = get_field('carousel_cards', get_the_ID());
?>

<?php if (!empty($carousel_cards)) : ?>
	<section   data-aos-delay="100"  data-aos="fade-up"  class="  my-20 relative dots__overlay-left">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16 relative bottom-corner-arrow">
			<?php if (!empty($offer_header)): ?>
				<h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black my-6 dotted__arrow-top-right "><?php echo wp_kses_post($offer_header); ?></h2>
			<?php endif; ?>
		<div class="card-carousel-swiper">
		<div class="swiper-wrapper">
			<?php foreach ($carousel_cards as $item) : ?>
				<div class="swiper-slide ">
					<div class=" card bg-white w-full bg-transparent overflow perspective">
						<div class=" card-inner rounded-lg  shadow-lg  transform transition-transform duration-500">
							<!-- Front side -->
							<div class="card-front text-left shadow-lg ">
								<?php if (!empty($item['image'])) : ?>
									<img
										src="<?php echo esc_url($item['image']['url']); ?>"
										alt="<?php echo esc_attr($item['image']['alt'] ?? ''); ?>"
										class="w-full h-48 object-cover mb-4"
									>
								<?php endif; ?>
								<?php if (!empty($item['header_front'])) : ?>
								<div class="px-6">
									<h3 class="text-xl text-black font-bold mb-2"><?php echo esc_html($item['header_front']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($item['content_front'])) : ?>
									<p class="text-black font-barlow text-md"><?php echo wp_kses_post($item['content_front']); ?></p>
								<?php endif; ?>
								</div>
							</div>

							<!-- Back side -->
							<div class="card-back rounded-lg  shadow-lg  flex flex-col px-6 py-16 text-left text-white bg-primary justify-between">
								<div class="top">
								<?php if (!empty($item['header_back'])) : ?>
									<h3 class="text-xl font-bold text-white mb-2"><?php echo esc_html($item['header_back']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($item['content_back'])) : ?>
									<p class="text-white text-md"><?php echo wp_kses_post($item['content_back']); ?></p>
								<?php endif; ?>
								</div>
								<?php if (!empty($item['link']['text']) && !empty($item['link']['url'])) : ?>
									<a href="<?php echo esc_url($item['link']['url']); ?>" class="text-white  hover:text-white hover:text-underline font-bold">
										<?php echo esc_html($item['link']['text']); ?>
									</a>
								<?php endif; ?>
							</div>

						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="card-carousel-swiper-button-next swiper-button-next"></div>
			<div class="card-carousel-swiper-button-prev swiper-button-prev"></div>
		</div>

		<!-- Swiper navigation buttons -->


		<!-- Swiper pagination -->

		</div>

	</section>
<?php endif; ?>
