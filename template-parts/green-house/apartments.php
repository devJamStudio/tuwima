<?php
/**
 * Template part for Green House apartments section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="mieszkania group" id="mieszkania">
    <p class="text-45"><?php echo get_field('apartments_title') ?: 'Wybierz swoje mieszkanie'; ?></p>
    <p class="text-46"><?php echo get_field('apartments_description') ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a Lorem Ipsum is simply dummy text of the printing and <br><span class="text-style-7">&nbsp;</span><br>typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a'; ?></p>
    <div class="wrapper-6">
        <div class="kulki">
            <div class="row-2 no-space-between-inline-blocks">
                <div class="elipsa-2"></div>
                <div class="elipsa-2-kopia"></div>
                <div class="elipsa-2-kopia-2"></div>
                <div class="elipsa-2-kopia-3"></div>
                <div class="elipsa-2-kopia-4"></div>
                <div class="elipsa-2-kopia-5"></div>
                <div class="elipsa-2-kopia-6"></div>
                <div class="elipsa-2-kopia-7"></div>
                <div class="elipsa-2-kopia-8"></div>
                <div class="elipsa-2-kopia-9"></div>
                <div class="elipsa-2-kopia-10"></div>
                <div class="elipsa-2-kopia-11"></div>
                <div class="elipsa-2-kopia-12"></div>
                <div class="elipsa-2-kopia-13"></div>
                <div class="elipsa-2-kopia-14"></div>
                <div class="elipsa-2-kopia-15"></div>
                <div class="elipsa-2-kopia-22"></div>
                <div class="elipsa-2-kopia-23"></div>
                <div class="elipsa-2-kopia-24"></div>
                <div class="elipsa-2-kopia-40"></div>
            </div>
            <div class="row-3 group">
                <div class="elipsa-2-kopia-38"></div>
                <div class="elipsa-2-kopia-37"></div>
                <div class="elipsa-2-kopia-36"></div>
                <div class="elipsa-2-kopia-35"></div>
                <div class="elipsa-2-kopia-34"></div>
                <div class="elipsa-2-kopia-41"></div>
                <div class="elipsa-2-kopia-33"></div>
                <div class="elipsa-2-kopia-32"></div>
                <div class="elipsa-2-kopia-31"></div>
                <div class="elipsa-2-kopia-30"></div>
                <div class="elipsa-2-kopia-29"></div>
                <div class="elipsa-2-kopia-28"></div>
                <div class="elipsa-2-kopia-20"></div>
                <div class="elipsa-2-kopia-19"></div>
                <div class="elipsa-2-kopia-18"></div>
                <div class="elipsa-2-kopia-42"></div>
                <div class="elipsa-2-kopia-17"></div>
                <div class="elipsa-2-kopia-25"></div>
                <div class="elipsa-2-kopia-16"></div>
                <div class="elipsa-2-kopia-26"></div>
                <div class="elipsa-2-kopia-27"></div>
            </div>
        </div>
        <div class="dymek group">
            <div class="row-4 group">
                <img class="text-48" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne.png" alt="Dostępne" width="65" height="12" title="Dostępne">
                <p class="text-47"><?php echo get_field('selected_apartment_number') ?: 'A 1.1'; ?></p>
            </div>
            <div class="wrapper-14">
                <nav class="nav">
                    <ul class="nav-list group">
                        <li><p class="nav-item-1"><a href="#"><?php echo get_field('selected_apartment_rooms') ?: '4'; ?></a></p></li>
                        <li><p class="nav-item-4"><a href="#"><?php echo get_field('selected_apartment_area') ?: '55'; ?><span class="text-style-11">m²</span></a></p></li>
                        <li><p class="nav-item-8"><a href="#"><?php echo get_field('selected_apartment_garden') ?: '245'; ?><span class="text-style-11">m²</span></a></p></li>
                    </ul>
                </nav>
                <img class="layer-14" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
                <img class="layer-15" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
                <img class="layer-16" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
            </div>
        </div>
    </div>
</section>

