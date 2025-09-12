<?php get_template_part('template-parts/partials/sections/banner'); ?>

<?php
$pointed_section = get_field('pointed_section');
$order_section = get_field('order_section');
$logo_section = get_field('logo_section');
?>

<!-- Card Section -->
<section class="dots__overlay-right" data-aos="fade-up" data-aos-duration="1000">
	<div class="container mx-auto p-12 lg:px-24 2xl:px-16 mb-4">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-2 py-8">
			<?php
			$cards = get_field('card_section');
			if (!empty($cards)) :
				foreach ($cards['cards'] as $card) :
					get_template_part('template-parts/partials/card/icon', null, $card['card']);
				endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- Pointed Section -->
<section class="pointed-section dots__overlay-left" data-aos="fade-right" data-aos-duration="1000">
	<h2 class="text-center my-12 font-barlow text-black text-3xl">
		<?php echo strip_tags($pointed_section['header'], ['<br>', '<span>', '<strong>']); ?>
	</h2>

	<div class="container mx-auto p-4 lg:p-12 lg:px-24 2xl:px-16 mb-4">
		<?php
		if (!empty($pointed_section['section']['blocks'])) :
			foreach ($pointed_section['section']['blocks'] as $index => $block) :
				get_template_part(
					'template-parts/partials/block/pointed',
					null,
					[
						'index' => $index + 1,
						'header' => $block['block']['header'],
						'content' => $block['block']['content'],
						'image' => $block['block']['img'],
					]
				);
			endforeach;
		endif;
		?>
	</div>
</section>

<!-- Order Section -->
<?php if (!empty($order_section)) : ?>
	<section class="order-section" data-aos="fade-up" data-aos-duration="1000">
		<h2 class="text-center my-12 text-black text-4xl"><?php echo $order_section['header']; ?></h2>

		<div class="container mx-auto p-4  md:p-12 lg:px-24 2xl:px-16 mb-12">
			<div class=" flex flex-col justify-center items-center  lg:flex-row gap-16">
				<?php
				foreach ($order_section['section']['cards'] as $index => $card) :
					get_template_part('template-parts/partials/card/order', null, $card['card']);
				endforeach;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Logo Section -->
<?php if (!empty($logo_section)) : ?>
	<section class="logo-section" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
		<div class="container mx-auto  p-4  md:p-12 lg:px-24 2xl:px-16 mb-4">
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
				<?php
				foreach ($logo_section['section']['blocks'] as $index => $block) :
					get_template_part('template-parts/partials/block/logo-text', null, $block['block']);
				endforeach;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Recommendation Carousel -->
<section class="py-3" data-aos="zoom-in" data-aos-duration="1000">
	<?php get_template_part('template-parts/partials/sections/recommendation-carousel'); ?>
</section>
