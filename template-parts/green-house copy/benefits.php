<?php
/**
 * Template part for Green House benefits section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="row-36 group">
    <img class="layer-4" src="<?php echo get_field('benefits_image')['url'] ?? get_template_directory_uri() . '/html/images/4.png'; ?>" alt="" width="712" height="651">
    <div class="col-27">
        <p class="text-20"><?php echo get_field('benefits_title') ?: 'Korzyściach<br>z wyboru tych mieszkań'; ?></p>
        <div class="row-24 group">
            <div class="grupa-3-kopia-3">
                <img class="pngtree-underfloor-heating-line-icon-vector-png-image_6684603" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-underfloor-heatin.png" alt="" width="33" height="46">
                <img class="layer-5" src="<?php echo get_template_directory_uri(); ?>/html/images/1281080-200.png" alt="" width="51" height="27">
                <img class="layer-6" src="<?php echo get_template_directory_uri(); ?>/html/images/1746650.png" alt="" width="37" height="41">
            </div>
            <div class="col-43">
                <p class="text-21"><?php echo get_field('benefit_1_title') ?: 'Ogrzewanie<br>podłogowe'; ?></p>
                <p class="text-22"><?php echo get_field('benefit_2_title') ?: 'Miejsca<br>postojowe'; ?></p>
                <p class="text-23"><?php echo get_field('benefit_3_title') ?: 'Bezpieczna<br>okolica'; ?></p>
            </div>
            <div class="col-44">
                <div class="row-29 group">
                    <img class="pngtree-garden-line-icon-png-image_9063065" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-garden-line-icon-.png" alt="" width="50" height="36">
                    <p class="text-24"><?php echo get_field('benefit_4_title') ?: 'Własne<br>ogródki'; ?></p>
                </div>
                <div class="row-30 group">
                    <img class="balcony-5" src="<?php echo get_template_directory_uri(); ?>/html/images/balcony-5.png" alt="" width="36" height="30">
                    <p class="text-25"><?php echo get_field('benefit_5_title') ?: 'Okna<br>tarasowe'; ?></p>
                </div>
                <div class="row-31 group">
                    <img class="warstwa-65" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_65.png" alt="" width="41" height="41">
                    <p class="text-26"><?php echo get_field('benefit_6_title') ?: 'Zamykane<br>kameralne osiedle'; ?></p>
                </div>
            </div>
        </div>
        <div class="row-20 group">
            <img class="layer-7" src="<?php echo get_template_directory_uri(); ?>/html/images/99626.png" alt="" width="48" height="38">
            <p class="text-27"><?php echo get_field('benefit_7_title') ?: 'Okna<br>trzyszybowe'; ?></p>
            <p class="text-28"><?php echo get_field('benefit_8_title') ?: 'Mieszkania<br>bezczynszowe'; ?></p>
            <div class="fi-xtluxx-times-thin-holder">
                <img class="layer-8" src="<?php echo get_template_directory_uri(); ?>/html/images/520656-200.png" alt="" width="28" height="27">
            </div>
        </div>
        <p class="text-29"><?php echo get_field('benefits_description') ?: 'Czasy dojazdu do Katowic, Jaworzna, Dąbrowy Górniczej czy centrum&nbsp;Sosnowca'; ?></p>
        <div class="btn-kopia">
            <?php echo get_field('benefits_button_text') ?: 'Zobacz mieszkania'; ?>
        </div>
    </div>
</div>

