<?php
/**
 * Template part for Green House location section - Pixel Perfect 1920px Design
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Location Section - Pixel Perfect 1920px Design -->
<section id="lokalizacja" class="relative w-full bg-white">
    <div class="left-[26.5px] mt-[115px] mx-auto relative w-[1473px]">

        <!-- Section Title -->
        <p class="mx-[588px] text-[#00a906] text-[40px] font-bold tracking-[0.02em]">
            <?php echo get_field('location_title') ?: 'Lokalizacja'; ?>
        </p>

        <!-- Description -->
        <p class="mt-[51px] mx-auto relative right-[28.5px] w-[1416px] font-montserrat leading-[24px] text-center">
            <?php echo get_field('location_description') ?: '<strong class="text-style-8">Green House Tuwima </strong>łączy bliskość natury z komfortem miejskiego życia. W otoczeniu inwestycji znajdują się liczne tereny zielone, a jednocześnie możesz cieszyć<br>się szybkim dojazdem do centrum oraz wygodnym dostępem do szkół, sklepów i usług.'; ?>
        </p>

        <!-- Location Content Row -->
        <div class="left-[21.5px] mt-[56px] mx-auto relative w-[1430px]">

            <!-- Left Column - Location Info -->
            <div class="float-left mt-[65px] mr-[136px] relative w-[547px]">

                <!-- Row 1 - School and Supermarkets -->
                <div class="relative">
                    <img class="float-left mt-[3px]" src="<?php echo get_template_directory_uri(); ?>/html/images/4615221.png" alt="School" width="56" height="46">
                    <p class="float-left mt-[1px] ml-[14px] w-[147px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <span class="text-style-9"><?php echo get_field('location_1_time') ?: '5 min'; ?></span><br>
                        <?php echo get_field('location_1_name') ?: 'szkoła podstawowa'; ?>
                    </p>
                    <p class="float-right mt-[1px] w-[109px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <span class="text-style-9"><?php echo get_field('location_2_time') ?: '3 min'; ?></span><br>
                        <?php echo get_field('location_2_name') ?: 'Supermarkety'; ?>
                    </p>
                    <img class="float-right mt-0 mr-[19px]" src="<?php echo get_template_directory_uri(); ?>/html/images/3700434.png" alt="Supermarket" width="51" height="51">
                </div>

                <!-- Row 2 - Bus Stop and Park -->
                <div class="mt-[132px] ml-[13px] relative w-[534px]">
                    <img class="float-left mt-[15px]" src="<?php echo get_template_directory_uri(); ?>/html/images/5854105.png" alt="Bus" width="47" height="41">
                    <p class="float-left mt-[6px] ml-[13px] w-[177px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <span class="text-style-9"><?php echo get_field('location_3_time') ?: '5 min'; ?></span><br>
                        <?php echo get_field('location_3_name') ?: 'Przystanek autobusowy'; ?>
                    </p>
                    <p class="float-right mt-[7px] mr-[25px] w-[81px] text-[#00a906] text-[29px] font-bold tracking-[0.02em] leading-[1.2]">
                        <?php echo get_field('location_4_time') ?: '5 min'; ?><br class="text-style-3">
                        <span class="text-style-10"><?php echo get_field('location_4_name') ?: 'Park'; ?></span>
                    </p>
                    <img class="float-right mt-0 mr-[14px]" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-park-line-icon-pn.png" alt="Park" width="56" height="56">
                </div>

                <!-- Row 3 - Kindergarten and Pool -->
                <div class="mt-[117px] ml-[10px] relative w-[537px]">
                    <img class="float-left mt-[3px]" src="<?php echo get_template_directory_uri(); ?>/html/images/6429371.png" alt="Kindergarten" width="45" height="45">
                    <p class="float-left ml-[21px] w-[164px] text-[15px] font-bold tracking-[0.02em] leading-[1.2]">
                        <span class="text-style-9"><?php echo get_field('location_5_time') ?: '3 min'; ?></span><br>
                        <?php echo get_field('location_5_name') ?: 'Przedszkole publiczne'; ?>
                    </p>
                    <p class="float-right mt-[3px] mr-[24px] w-[81px] text-[#00a906] text-[29px] font-bold tracking-[0.02em] leading-[1.2]">
                        <?php echo get_field('location_6_time') ?: '2 min'; ?><br class="text-style-3">
                        <span class="text-style-10"><?php echo get_field('location_6_name') ?: 'Basen'; ?></span>
                    </p>
                    <img class="float-right mt-[9px] mr-[19px]" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-swimming-pool-lin.png" alt="Pool" width="49" height="39">
                </div>

                <!-- CTA Button -->
                <div class="mt-[98px] ml-[13px] min-h-[58px] px-[22px] relative w-[225px] bg-cover bg-no-repeat text-[#00a906] font-montserrat text-[17px] font-bold leading-[58px] text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_17.png');">
                    <?php echo get_field('location_button_text') ?: 'Zobacz mieszkania'; ?>
                </div>
            </div>

            <!-- Right Column - Map Image -->
            <img class="float-left" src="<?php echo get_field('location_map_image')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_64.jpg'; ?>" alt="Location Map" width="747" height="686">
        </div>
    </div>
</section>
