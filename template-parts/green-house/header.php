<?php
/**
 * Template part for Green House header section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Header Section -->
<header class="relative w-full min-w-[1920px] bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/4_3.jpg');">
    <!-- Overlay Layer -->
    <div class="relative w-full pb-[95px] bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/warstwa_47.png');">
        
        <!-- Navigation Header -->
        <div class="mx-auto relative w-[1882px]">
            <div class="min-h-[138px] px-[39px] pt-[10px] rounded-b-[11px] bg-white relative w-[1880px] group">
                
                <!-- Logo Section -->
                <div class="float-left mt-[9px] relative w-[118px]">
                    <div class="mx-auto pb-[1px] relative w-[57px] bg-cover bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia.png');">
                        <img class="block relative left-[4.5px] mx-auto" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2.png" alt="" width="48" height="52">
                    </div>
                    <p class="mt-[7px] text-green-custom font-montserrat text-[8.17485px] font-bold tracking-[0.5em] text-center uppercase">Green House</p>
                    <img class="block mx-auto mt-[4px]" src="<?php echo get_template_directory_uri(); ?>/html/images/tuwima.png" alt="tuwima" width="118" height="20" title="tuwima">
                </div>

                <!-- Contact Info Section -->
                <div class="float-right relative w-[1632px]">
                    <div class="h-[99px] relative w-[1632px]">
                        
                        <!-- Contact Button -->
                        <div class="absolute top-[1px] left-1/2 w-[177px] h-[42px] rounded-[11px] bg-green-custom ml-[569px]"></div>
                        <div class="absolute top-[1px] left-1/2 min-h-[42px] w-[177px] rounded-[11px] bg-green-custom text-white text-[17px] font-bold tracking-[0.02em] leading-[42px] text-center uppercase ml-[601px]">
                            <?php echo get_field('contact_button_text') ?: 'Kontakt'; ?>
                        </div>

                        <!-- Phone Numbers -->
                        <div class="absolute top-[39px] left-1/2 ml-[-816px]">
                            <div class="absolute top-[14px] left-1/2 ml-[592px]">
                                <p class="absolute top-[18px] left-1/2 text-green-custom text-[21.40198px] font-black tracking-[0.02em] leading-[22px] ml-[354px]">
                                    <?php echo get_field('phone_number_1') ?: '+48 32 123 45 67'; ?>
                                </p>
                                <p class="absolute top-0 left-1/2 text-[#010101] text-[13px] font-bold tracking-[0.02em] leading-[14px] ml-[355px]">
                                    <?php echo get_field('phone_label_1') ?: 'Telefon'; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="absolute top-[18px] left-1/2 text-green-custom text-[21.40198px] font-black tracking-[0.02em] leading-[22px] ml-[141px]">
                            <?php echo get_field('email') ?: 'kontakt@greenhouse.pl'; ?>
                        </div>
                        <div class="absolute top-[3px] left-1/2 text-[13px] font-bold tracking-[0.02em] leading-[13px] ml-[139px]">
                            <?php echo get_field('email_label') ?: 'Email'; ?>
                        </div>

                        <!-- Logo Image -->
                        <div class="absolute top-0 left-1/2 ml-[306px]">
                            <img src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_3.png" alt="Logo">
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="absolute top-[84px] left-1/2 w-[1237px] ml-[-459px]">
                    <ul class="relative list-none">
                        <li class="float-left mr-[56px]">
                            <a href="#o-inwestycji" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_1') ?: 'O inwestycji'; ?>
                            </a>
                        </li>
                        <li class="float-left mr-[56px]">
                            <a href="#lokalizacja" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_2') ?: 'Lokalizacja'; ?>
                            </a>
                        </li>
                        <li class="float-left mr-[56px]">
                            <a href="#mieszkania" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_3') ?: 'Mieszkania'; ?>
                            </a>
                        </li>
                        <li class="float-left mr-[56px]">
                            <a href="#galeria" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_4') ?: 'Galeria'; ?>
                            </a>
                        </li>
                        <li class="float-left mr-[56px]">
                            <a href="#finansowanie" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_5') ?: 'Finansowanie'; ?>
                            </a>
                        </li>
                        <li class="float-left">
                            <a href="#kontakt" class="text-black text-[18px] font-black tracking-[0.02em] uppercase hover:text-green-custom transition-colors">
                                <?php echo get_field('nav_item_6') ?: 'Kontakt'; ?>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Green Accent Line -->
                <div class="h-[4px] mt-[25px] ml-[352px] w-[134px] bg-green-custom relative"></div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="table mx-auto mt-[374px] relative">
            <h1 class="text-green-custom font-montserrat text-[40px] font-medium tracking-[0.16em] text-center uppercase" style="text-shadow: 0 2px 6px rgba(0, 0, 0, 0.26);">
                <?php echo get_field('hero_title') ?: 'Green House'; ?>
            </h1>
            <h2 class="mt-[5px] text-white text-[30px] font-bold tracking-[0.02em] text-center" style="text-shadow: 0 2px 6px rgba(0, 0, 0, 0.26);">
                <?php echo get_field('hero_subtitle') ?: 'Tuwima'; ?>
            </h2>
        </div>

        <!-- CTA Button -->
        <div class="mx-auto mt-[51px] min-h-[54px] px-[52px] relative right-[7.5px] w-[275px] bg-cover bg-no-repeat text-white text-[19px] font-bold leading-[54px] text-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_14.png');">
            <?php echo get_field('cta_button_text') ?: 'Zobacz mieszkania'; ?>
        </div>

        <!-- Info Cards -->
        <div class="mx-auto mt-[262px] min-h-[195px] px-[37px] relative right-[7px] w-[1412px] rounded-[11px] bg-green-custom group" style="box-shadow: 0 2px 18px 0 rgba(0, 0, 0, 0.2);">
            <div class="float-left mt-[39px] w-[131px] text-white text-[15px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_1') ?: '28 mieszkań'; ?>
            </div>
            <div class="float-left h-[195px] ml-[41px] w-px bg-white/55"></div>
            <div class="float-left mt-[39px] ml-[66px] w-[84px] text-white text-[15px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_2') ?: '14 domów'; ?>
            </div>
            <div class="float-left h-[195px] ml-[76px] w-px bg-white/55"></div>
            <div class="float-left mt-[39px] ml-[82px] w-[76px] text-white font-montserrat text-[13px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_3') ?: '2 piętra'; ?>
            </div>
            <div class="float-left h-[195px] ml-[85px] w-px bg-white/55"></div>
            <div class="float-left mt-[40px] ml-[46px] w-[139px] text-white font-montserrat text-[13px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_4') ?: 'Ogródki prywatne'; ?>
            </div>
            <div class="float-left h-[195px] ml-[57px] w-px bg-white/55"></div>
            <div class="float-left mt-[35px] ml-[70px] w-[93px] text-white font-montserrat text-[13px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_5') ?: 'Balkony'; ?>
            </div>
            <div class="float-left h-[195px] ml-[79px] w-px bg-white/55"></div>
            <div class="float-left mt-[35px] ml-[82px] w-[85px] text-white font-montserrat text-[13px] font-bold tracking-[0.02em] leading-[1.2] text-center">
                <?php echo get_field('info_card_6') ?: 'Parking'; ?>
            </div>
        </div>
    </div>
</header>