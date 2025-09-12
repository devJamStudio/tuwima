<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CertExpert
 */

?>
<?php
// Fetch fields from the ACF options page
$footer_logo = get_field('footer_logo', 'option'); // Footer logo
$footer_content = get_field('footer_content', 'option'); // Footer content
$footer_contact = get_field('footer_contact', 'option'); // Footer contact info
$footer_social = get_field('footer_social', 'option'); // Footer social links
?>
<footer id="colophon "   class="container p-12  lg:px-24 2xl:px-16 mx-auto  mt-4">
	<div class="footer-container cont">


		<footer  data-aos-delay="100"  data-aos="fade-up" class="rounded-lg shadow-lg p-20 text-black font-barlow overflow-hidden bg-white z-[22] relative">
			<div class="container mx-auto grid grid-cols-1 gap-8 xl:gap-20 lg:grid-cols-3  items-start  border-b border-gray-300 pb-4 mb-12">
				<!-- Logo Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($footer_logo)) : ?>
						<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="Footer Logo" class="mx-auto md:mx-0 mb-4 w-full h-auto">
					<?php endif; ?>
				</div>

				<!-- Contact Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($footer_contact)) : ?>
						<?php if (!empty($footer_contact['phone'])) : ?>
							<p class="mb-2">
								<a href="tel:<?php echo esc_attr($footer_contact['phone']); ?>" class="text-primary hover:underline">
									<?php echo esc_html($footer_contact['phone']); ?>
								</a>
							</p>
						<?php endif; ?>

						<?php if (!empty($footer_contact['email'])) : ?>
							<p class="mb-2">
								<a href="mailto:<?php echo esc_attr($footer_contact['email']); ?>" class="text-primary hover:underline">
									<?php echo esc_html($footer_contact['email']); ?>
								</a>
							</p>
						<?php endif; ?>

						<?php if (!empty($footer_contact['address'])) : ?>
							<p class="mb-4"><?php echo wp_kses_post($footer_contact['address']); ?></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if (!empty($footer_social)) : ?>
						<div class="contact__bar mt-4 flex justify-center md:justify-start gap-3 xl:gap-4">
							<span>Media:</span>
							<div class="flex gap-3">
								<?php foreach ($footer_social as $social) : ?>
									<?php if (!empty($social['url']) && !empty($social['icon'])) : ?>
										<a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer" class="text-primary hover:text-primary-dark">
											<i class="<?php echo esc_attr($social['icon']); ?>"></i>
										</a>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<!-- Content Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($footer_content)) : ?>
						<div class="prose prose-sm max-w-none">
							<?php echo wp_kses_post($footer_content); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</footer>

	</div>


</footer><!-- #colophon -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
