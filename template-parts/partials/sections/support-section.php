<?php
$support_header = get_field('support_header', get_the_ID());
$support_content = get_field('support_content', get_the_ID());
$support_image = get_field('support_image', get_the_ID());
$support_image_url = get_field('support_image_url', get_the_ID());
?>

<?php if (!empty($support_header) || !empty($support_content) || !empty($support_image)) : ?>
	<section data-aos-delay="100"  data-aos="fade-up"  class="support-section dots__overlay-center  my-10 font-barlow text-black py-12">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
				<!-- Left Column -->
				<div>
					<?php if (!empty($support_header)) : ?>
						<h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black mb-4"><?php echo wp_kses_post($support_header); ?></h2>
					<?php endif; ?>

					<?php if (!empty($support_content)) : ?>
						<div class="text-black font-barlow mt-3">
							<?php echo wp_kses_post($support_content); ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- Right Column -->
				<div class="text-center md:text-left flex relative ">
					<span class="mb-4 text-2xl font-bold absolute click-arrow  top-[-1.3rem] text-barlow text-black left-[-6rem] dotted__arrow-bottom-right__support"><span class="text-primary">KLIKNIJ</span> </br> i sprawdź</span>

					<div>
					<?php if (!empty($support_image)) : ?>
						<a href="<?php echo esc_url($support_image_url); ?>" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url($support_image['url']); ?>" alt="<?php echo esc_attr($support_image['alt'] ?? 'Support Image'); ?>" class="ml-16 w-full h-auto">
						</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
	</section>
<?php endif; ?>

