<?php
$carousel = get_field('carousel');
?>

<?php if (!empty($carousel)) : ?>
	<section   data-aos-delay="100"  data-aos="fade-up"  class="  my-20 relative  dots__overlay-left-top">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16 relative bottom-corner-arrow  ">
			<h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black my-6 dotted__arrow-top-right "><?php echo  strip_tags(get_field('offer_header'),['<br>','<span>','<strong>']);?></h2>
		<div class="card-carousel-swiper ">
		<div class="swiper-wrapper  ">
			<?php foreach ($carousel as $item) : ?>
				<div class="swiper-slide   ">
					<div class=" card bg-white w-full bg-transparent   shadow-md  overflow-hidden rounded-lg perspective ">
						<div class=" card-inner rounded-lg  transform transition-transform duration-500">
							<!-- Front side -->
							<div class="card-front text-left ">
								<?php if (!empty($item['img'])) : ?>
									<img
										src="<?php echo esc_url($item['img']['url']); ?>"
										alt="<?php echo esc_attr($item['img'] ?? ''); ?>"
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
							<div class="card-back flex flex-col  rounded-lg  px-6 py-16 text-left text-white bg-primary justify-between">
								<div class="top">
								<?php if (!empty($item['header_back'])) : ?>
									<h3 class="text-xl font-bold text-white mb-2"><?php echo esc_html($item['header_back']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($item['content_back'])) : ?>
									<p class="text-white text-md"><?php echo wp_kses_post($item['content_back']); ?></p>
								<?php endif; ?>
								</div>
								<?php if (!empty($item['link_content']) && !empty($item['link_url'])) : ?>
									<a href="<?php echo esc_url($item['link_url']); ?>" class="text-white  hover:text-white hover:text-underline font-bold">
										<?php echo esc_html($item['link_content']); ?>
									</a>
								<?php endif; ?>
							</div>

						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

		<!-- Swiper navigation buttons -->
			<div class="card-carousel-swiper-button-next swiper-button-next"></div>
			<div class="card-carousel-swiper-button-prev swiper-button-prev"></div>

		<!-- Swiper pagination -->

		</div>

	</section>
<?php endif; ?>
