<?php
$support = get_field('support'); // Fetch the group field
?>

<?php if (!empty($support)) : ?>
	<section data-aos-delay="100"  data-aos="fade-up"  class="support-section dots__overlay-center   my-10 font-barlow text-black py-12">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16">
			<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 items-center">
				<!-- Left Column -->
				<div>
					<?php if (!empty($support['header'])) : ?>
						<h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black mb-4"><?php echo wp_kses_post($support['header']); ?></h2>
					<?php endif; ?>

					<?php if (!empty($support['content'])) : ?>
						<div class="text-black font-barlow mt-3">
							<?php echo wp_kses_post($support['content']); ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- Right Column -->
				<div class="text-left flex relative ">
					<span class="mb-4 text-2xl font-bold lg:absolute click-arrow  xl:top-[-1.3rem] text-barlow text-black xl:left-[-10rem] dotted__arrow-bottom-right__support"><span class="text-primary">KLIKNIJ</span> </br> i sprawdź</span>

					<div>
					<?php if (!empty($support['image'])) : ?>
						<a href="<?php echo $support['image_url']['url']; ?>"  rel="noopener noreferrer">
							<img src="<?php echo $support['image']['url']; ?>" alt="Map or Graphic" class="ml-4 mt-16 xl:mt-0 lg:ml-16 w-full h-auto">
						</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
	</section>
<?php endif; ?>

