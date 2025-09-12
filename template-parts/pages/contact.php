<?php
$contact_section = get_field('contact_section', 'option');
?>
<section class="contact-block_dotted__arrow-bottom-right" data-aos="fade-up" data-aos-duration="1000">
	<div class="container flex-col lg:flex-row mx-auto p-12 lg:px-24 2xl:px-16 flex dots__overlay-center mb-4 contact__container font-barlow">
		<div class="contact__info w-full lg:w-6/12 text-2xl" data-aos="fade-right" data-aos-duration="1000">
			<div class="text-center md:text-left grid">
				<?php if (!empty($contact_section)) : ?>

					<!-- Phone Icon and Button -->
					<div class="flex items-center flex-col justify-center mb-4 p-16 gap-8" data-aos="zoom-in" data-aos-delay="200">
						<!-- FontAwesome Phone Icon, larger size, centered -->
						<i class="fas fa-phone-alt mr-2 text-5xl text-black"></i>
						<?php if (!empty($contact_section['phone'])) : ?>
							<a href="tel:<?php echo esc_attr($contact_section['phone']); ?>" class="btn--primary text-black py-3 rounded-lg">
								<?php echo esc_html($contact_section['phone']); ?>
							</a>
						<?php endif; ?>
					</div>

					<!-- Envelope Icon and Button -->
					<div class="flex items-center flex-col justify-center p-8 gap-4" data-aos="zoom-in" data-aos-delay="400">
						<!-- FontAwesome Envelope Icon, larger size, centered -->
						<i class="fas fa-paper-plane mr-2 text-5xl text-black"></i>
						<span class="font-500">Wyślij e-mail</span>
						<?php if (!empty($contact_section['e-mail'])) : ?>
							<a href="mailto:<?php echo esc_attr($contact_section['e-mail']); ?>" class="btn--dark text-black rounded-lg">
								<?php echo esc_html($contact_section['e-mail']); ?>
							</a>
						<?php endif; ?>
					</div>

				<?php endif; ?>
			</div>
		</div>
		<div class="contact__form w-full lg:w-6/12 z-50" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
			<?php echo do_shortcode( '[contact-form-7 id="bb6703f" title="Formularz Kontaktowy"]' ); ?>
		</div>
	</div>
</section>
