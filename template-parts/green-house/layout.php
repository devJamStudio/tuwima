<?php
/**
 * Template part for Green House layout section - Pixel Perfect 1920px Design
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Layout Section - Pixel Perfect 1920px Design -->
<section id="layout" class="relative w-full bg-white">
    <div class="left-[91.5px] mt-[104px] mx-auto relative w-[1533px]">

        <!-- Content Column -->
        <div class="float-left mt-[97px] mr-[50px] relative w-[652px]">
            <!-- Title -->
            <p class="text-[#00a906] text-[30px] font-bold tracking-[0.02em] leading-[1.2]">
                <?php echo get_field('layout_title') ?: 'Przemyślany<br>układ mieszkań'; ?>
            </p>

            <!-- Description -->
            <p class="mt-[40px] w-[652px] leading-[24px] text-justify">
                <?php echo get_field('layout_description') ?: 'Każde mieszkanie w Green House Tuwima zostało zaprojektowane z myślą o maksymalnym wykorzystaniu przestrzeni i funkcjonalności. Przemyślany układ pomieszczeń zapewnia komfort użytkowania i optymalne warunki do życia.<br><span class="text-style-7">&nbsp;</span><br>Mieszkania na parterze oferują bezpośredni dostęp do prywatnych ogródków, natomiast mieszkania na piętrze cieszą się balkonami z pięknym widokiem na okolicę. Wszystkie pomieszczenia zostały zaprojektowane tak, aby zapewnić maksymalną funkcjonalność i komfort.'; ?>
            </p>

            <!-- CTA Button -->
            <div class="mt-[60px] min-h-[58px] px-[20px] py-[16px] relative w-[225px] bg-cover bg-no-repeat text-[#00a906] font-montserrat text-[17px] font-bold text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_17.png');">
                <?php echo get_field('layout_button_text') ?: 'Zobacz mieszkania'; ?>
            </div>
        </div>

        <!-- Layout Image -->
        <img class="float-left" src="<?php echo get_field('layout_image')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_63.png'; ?>" alt="Layout Plan" width="831" height="663">
    </div>
</section>
