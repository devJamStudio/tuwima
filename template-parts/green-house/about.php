<?php
/**
 * Template part for Green House about section - Pixel Perfect 1920px Design
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- About Section - Pixel Perfect 1920px Design -->
<section id="o-inwestycji" class="relative w-full bg-white">
    <div class="mx-auto mt-[159px] px-[83px] relative w-[1882px]">
        <div class="mx-auto relative w-[1441px]">
            
            <!-- Main Content Row -->
            <div class="float-left mr-[34px] relative w-[660px]">
                <!-- Title -->
                <p class="ml-[4px] text-[#00a906] text-[40px] font-bold tracking-[0.02em]">
                    <?php echo get_field('about_title') ?: 'O inwestycji'; ?>
                </p>
                
                <!-- Subtitle -->
                <p class="mt-[31px] text-[30px] font-bold tracking-[0.02em] leading-[1.2]">
                    <?php echo get_field('about_subtitle') ?: 'Inwestycja w przyszłość<br>Twojej rodziny.'; ?>
                </p>
                
                <!-- Description -->
                <p class="mt-[42px] ml-[4px] w-[656px] leading-[24px] text-justify">
                    <?php echo get_field('about_description') ?: 'Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca, zaledwie kilka minut od centrum. Osiedle składa się z 14 domów w zabudowie bliźniaczej – łącznie 28 mieszkań. To idealna propozycja dla osób ceniących komfort, prywatność i dogodną lokalizację.<br><span class="text-style-7">&nbsp;</span><br>W ofercie znajdują się mieszkania na parterze z prywatnymi ogródkami oraz mieszkania na piętrze z balkonami. Każde mieszkanie zostało zaprojektowane z myślą o funkcjonalności i komforcie użytkowania.'; ?>
                </p>
                
                <!-- CTA Button -->
                <div class="mt-[47px] ml-[4px] min-h-[58px] px-[20px] py-[16px] relative w-[225px] bg-cover bg-no-repeat text-[#00a906] font-montserrat text-[17px] font-bold text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_17.png');">
                    <?php echo get_field('about_button_text') ?: 'Zobacz więcej'; ?>
                </div>
            </div>

            <!-- Image Section -->
            <div class="float-left mt-[7px]">
                <img src="<?php echo get_field('about_image') ?: get_template_directory_uri() . '/html/images/layer_3.png'; ?>" alt="About Green House" class="block">
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="mt-[144px] mx-auto relative w-[1416px]">
            <div class="float-left mr-[123px]">
                <img src="<?php echo get_field('benefits_image') ?: get_template_directory_uri() . '/html/images/layer_4.png'; ?>" alt="Benefits" class="block">
            </div>
            
            <div class="float-left mt-[14px] relative w-[581px]">
                <!-- Benefits Title -->
                <p class="text-[#00a906] text-[29px] font-bold tracking-[0.02em] leading-[1.2]">
                    <?php echo get_field('benefits_title') ?: 'Dlaczego warto wybrać<br>Green House Tuwima?'; ?>
                </p>

                <!-- Benefits List -->
                <div class="mt-[62px] mx-auto relative w-[567px]">
                    
                    <!-- Benefit 1 -->
                    <div class="float-left relative w-[51px]">
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-underfloor-heating-line-icon-vector-png-image_6684603.png" alt="Heating" class="block mx-auto">
                    </div>
                    <div class="float-left mt-[78px]">
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/layer_5.png" alt="Benefit 1" class="block mx-auto">
                    </div>
                    <div class="float-left mt-[87px]">
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/layer_6.png" alt="Benefit 2" class="block mx-auto">
                    </div>
                    
                    <!-- Benefit Text Columns -->
                    <div class="float-left mt-[9px] ml-[9px] relative w-[96px]">
                        <p class="ml-[3px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                            <?php echo get_field('benefit_1_text') ?: 'Ogrzewanie<br>podłogowe'; ?>
                        </p>
                        <p class="mt-[78px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                            <?php echo get_field('benefit_2_text') ?: 'Wysokiej jakości<br>materiały'; ?>
                        </p>
                        <p class="mt-[79px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                            <?php echo get_field('benefit_3_text') ?: 'Nowoczesne<br>rozwiązania'; ?>
                        </p>
                    </div>
                    
                    <!-- Right Column Benefits -->
                    <div class="float-right mt-[6px] relative w-[203px]">
                        <!-- Garden -->
                        <div class="relative">
                            <img src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-garden-line-icon-png-image_9063065.png" alt="Garden" class="float-left mr-[11px]">
                            <p class="text-[15px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                                <?php echo get_field('benefit_4_text') ?: 'Prywatne ogródki'; ?>
                            </p>
                        </div>
                        
                        <!-- Balcony -->
                        <div class="mt-[80px] mx-[10px] relative">
                            <img src="<?php echo get_template_directory_uri(); ?>/html/images/balcony-5.png" alt="Balcony" class="float-left mr-[16px] mt-[3px]">
                            <p class="text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                                <?php echo get_field('benefit_5_text') ?: 'Balkony'; ?>
                            </p>
                        </div>
                        
                        <!-- Parking -->
                        <div class="mt-[75px] ml-[11px] relative">
                            <img src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_65.png" alt="Parking" class="float-left mr-[13px]">
                            <p class="mt-[5px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                                <?php echo get_field('benefit_6_text') ?: 'Miejsca parkingowe'; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Additional Benefits Row -->
                <div class="mt-[66px] ml-[14px] relative w-[567px]">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/layer_7.png" alt="Additional" class="float-left">
                    <p class="float-left mt-[3px] ml-[13px] w-[99px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <?php echo get_field('benefit_7_text') ?: 'Monitoring<br>osiedla'; ?>
                    </p>
                    <p class="float-right mt-[3px] mr-[28px] w-[109px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <?php echo get_field('benefit_8_text') ?: 'Dostęp do<br>centrum miasta'; ?>
                    </p>
                </div>

                <!-- Close Button -->
                <div class="float-right mt-0 mr-[7px] py-[9px] px-0 relative w-[44px] bg-cover bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/fi-xtluxx-times-thin.png');">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/layer_8.png" alt="Close" class="block mx-auto">
                </div>

                <!-- Description Text -->
                <p class="mt-[56px] text-center">
                    <?php echo get_field('benefits_description') ?: 'Każde mieszkanie zostało zaprojektowane z myślą o funkcjonalności i komforcie użytkowania. Wysokiej jakości materiały i nowoczesne rozwiązania gwarantują trwałość i energooszczędność.'; ?>
                </p>

                <!-- CTA Button -->
                <div class="mt-[47px] ml-[13px] min-h-[58px] px-[8px] relative w-[225px] bg-cover bg-no-repeat text-[#00a906] font-montserrat text-[17px] font-bold leading-[58px] text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_17.png');">
                    <?php echo get_field('benefits_button_text') ?: 'Dowiedz się więcej'; ?>
                </div>
            </div>
        </div>
    </div>
</section>