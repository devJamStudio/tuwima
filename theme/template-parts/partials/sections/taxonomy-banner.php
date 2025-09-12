
<?php
$term = get_queried_object();
$banner = get_field('banner',$term );
// Fetch the banner group field
?>

<?php if (!empty($banner)) : ?>
	<!-- Hero Section -->
	<section data-aos-delay=6100"  data-aos="fade-up"  class="relative bg-contain  bg-right-bottom  bg-no-repeat  h-[50vh] md:h-[calc(100vh_-_171px)]  flex items-center" style="background-image: url('<?php echo esc_url($banner['background_img']['url']); ?>');">
		<div class="container mx-auto text-left text-black p-12  lg:px-24 2xl:px-16   mb-20">
			<?php if (!empty($banner['sub_header'])) : ?>
				<sub class="text-lg font-bold  mb-2"><?php echo strip_tags($banner['sub_header'],['<br>','<strong>','<span>']);; ?></sub>
			<?php endif; ?>

			<?php if (!empty($banner['header'])) : ?>
				<h1 class="text-5xl md:text-6xl font-bold leading-1 mb-6 dotted__arrow-bottom-right__taxonomy"><?php echo strip_tags($banner['header'],['<br>','<strong>','<span>']); ?><br><?php echo wp_kses_post($term->name); ?></h1>


			<?php endif; ?>
			<?php $button = $banner['button']; ?>
			<?php if (!empty($button['content'])) : ?>
				<a href="<?php echo esc_url($button['url']); ?>" class="banner--link">
					<button class="btn btn--primary text-white  banner__button justify-self-end">
						<?php echo $button['content']; ?>
					</button>
				</a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
