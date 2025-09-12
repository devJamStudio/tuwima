<?php
// Ensure we're in the loop or have a valid $post


// Example usage
$button = get_field('button', get_the_ID());

?>
<div class="card shadow-md w-full lg:w-1/2 p-6 lg:p-12 bg-white  rounded-lg">
	<div class="top-row flex flex-col md:flex-row gap-8 mb-8">
		<?php echo alt_logo(); ?>
		<?php the_title('<h3 class="donation__title text-md md:text-lg xl:text-xl font-barlow font-bold text-black">', '</h3>'); ?>
	</div>
		<?php the_content(); ?>
		<?php if (!empty($button)): ?>
		<div class="flex flex-col justify-center  lg:justify-end lg:items-end flex-col mt-8 mb-16">
			<a href="<?php echo esc_url($button['url']); ?>" class="donation__button--link">
				<button class="btn btn--primary text-white  donation__button justify-self-center lg:justify-self-end">
					<?php echo $button['content']; ?>
				</button>
			</a>
		</div>
		<?php endif; ?>
	</div>

