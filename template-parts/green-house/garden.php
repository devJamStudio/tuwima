<?php
/**
 * Template part for Green House garden section - Pixel Perfect 1920px Design
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Garden Section - Pixel Perfect 1920px Design -->
<section id="garden" class="relative w-full bg-white">
    <div class="mt-[158px] mx-auto relative w-[1450px]">

        <!-- Garden Image -->
        <img class="float-left mr-[51px]" src="<?php echo get_field('garden_image')['url'] ?? get_template_directory_uri() . '/html/images/3.jpg'; ?>" alt="Garden View" width="747" height="686">

        <!-- Content Column -->
        <div class="float-left mt-[113px] relative w-[652px]">
            <!-- Title -->
            <p class="text-[#00a906] text-[30px] font-bold tracking-[0.02em] leading-[1.2]">
                <?php echo get_field('garden_title') ?: 'Mieszkanie<br>z własnym ogródkiem'; ?>
            </p>

            <!-- Description -->
            <p class="mt-[39px] leading-[24px] text-justify">
                <?php echo get_field('garden_description') ?: 'Mieszkania na parterze w Green House Tuwima oferują unikalną możliwość posiadania własnego ogródka. To idealne rozwiązanie dla osób, które marzą o własnym kawałku zieleni, gdzie mogą odpocząć, uprawiać rośliny lub spędzać czas z rodziną.<br><span class="text-style-7">&nbsp;</span><br>Każdy ogródek został zaprojektowany tak, aby zapewnić prywatność i komfort użytkowania. Dzięki temu mieszkańcy mogą cieszyć się własną przestrzenią na świeżym powietrzu, bez konieczności opuszczania domu.'; ?>
            </p>

            <!-- CTA Button -->
            <div class="mt-[124px] mx-auto min-h-[58px] px-[20px] py-[16px] relative right-[66.5px] w-[225px] bg-cover bg-no-repeat text-[#00a906] font-montserrat text-[17px] font-bold text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_17.png');">
                <?php echo get_field('garden_button_text') ?: 'Zobacz mieszkania'; ?>
            </div>
        </div>
    </div>
</section>
