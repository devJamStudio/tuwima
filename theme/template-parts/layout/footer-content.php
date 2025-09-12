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
$contact_section = get_field('contact_section', 'option'); // Contact section
$address_section = get_field('adress', 'option'); // Address section
$copyright = get_field('copy_content', 'option');
$copy_logo = get_field('copy_logo', 'option');
?>
<footer id="colophon "   class="container p-12  lg:px-24 2xl:px-16 mx-auto  mt-4 dots__overlay-footer  ">
	<div class="footer-container">
		<footer  data-aos-delay="100"  data-aos="fade-up" class="rounded-lg shadow-md p-8 md:p-20 text-black font-barlow overflow-hidden bg-white z-[1] relative">
			<div class="container mx-auto grid grid-cols-1 gap-8 xl:gap-20 lg:grid-cols-3  items-start  border-b border-gray-300 pb-4 mb-12">
				<!-- Logo Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($footer_logo)) : ?>
						<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="Footer Logo" class="mx-auto md:mx-0 mb-4 w-full h-auto">
					<?php endif; ?>
				</div>
				<!-- Contact Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($contact_section)) : ?>
						<?php if (!empty($contact_section['header'])) : ?>
							<h3 class="text-lg font-bold mb-4"><?php echo esc_html($contact_section['header']); ?></h3>
						<?php endif; ?>

						<?php if (!empty($contact_section['phone'])) : ?>
							<p class=>tel:<?php echo esc_html($contact_section['phone']); ?></p>
						<?php endif; ?>

						<?php if (!empty($contact_section['e-mail'])) : ?>
							<p>email:<a href="mailto:<?php echo esc_attr($contact_section['e-mail']); ?>" class="text-primary">
									<?php echo esc_html($contact_section['e-mail']); ?>
								</a></p>
						<?php endif; ?>
					<?php endif; ?>
					<div class="contact__bar mt-4 flex justify-center md:justify-start gap-3 xl:gap-4  ">
						<span>Media:</span>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'contact',
								'menu_id'        => 'social__menu',
								'menu_class' => 'flex w-full  sm__footer__menu mb-[-5px] items-start justify-start flex-row gap-3 xl:gap-4 text-lg barlow-semibold text-right break-all',
								'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
							)
						);
						?>
					</div>
				</div>
				<!-- Address Section -->
				<div class="text-center md:text-left">
					<?php if (!empty($address_section)) : ?>
						<?php if (!empty($address_section['header'])) : ?>
							<h3 class="text-lg font-bold mb-4"><?php echo esc_html($address_section['header']); ?></h3>
						<?php endif; ?>
						<?php if (!empty($address_section['content'])) : ?>
							<p><?php echo wp_kses_post($address_section['content']); ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="container-fluid bg-white">
				<div class="text-black text-center py-4 px-2 relative flex-col lg:flex-row justify-center items-center   flex z-[2]">
					<?php if ($copyright): echo $copyright;
					else: echo '<b>Certeksprt</b> 2025. Wszelkie
					prawa zastrzeżone: projekt &amp; wykonanie';endif?>
					<?php if ($copy_logo): echo  '<a href="https://www.futureindesign.com/" rel="nofollow" target="_blank"><img  class="" src="'.$copy_logo['link'].'" alt="strony www katowice" width="65" height="12" style="display:unset;">
					</a>'; else: echo '<a href="https://www.futureindesign.com/" rel="nofollow" target="_blank"><img  class="invert" src="https://budraise.pl/wp-content/themes/budrais/assets/images/logo2.png" alt="strony www katowice" width="65" height="12" style="display:unset;"></a>';endif;?>
				</div>
			</div>
		</footer>
	</div>
</footer><!-- #colophon -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
