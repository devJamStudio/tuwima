<?php
/**
 * Template part for Green House location section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="lokalizacja group" id="lokalizacja">
    <p class="lokalizacja-2"><?php echo get_field('location_title') ?: 'Lokalizacja'; ?></p>
    <p class="text-37"><?php echo get_field('location_description') ?: '<strong class="text-style-8">Green House Tuwima </strong>łączy bliskość natury z komfortem miejskiego życia.W otoczeniu inwestycji znajdują się liczne tereny zielone, a jednocześnie możesz cieszyć<br>się szybkim dojazdem do centrum oraz wygodnym dostępem do szkół, sklepów i usług.'; ?></p>
    <div class="row-15 flex flex-col lg:flex-row gap-10 2xl:gap-[136px]  justify-between">
        <div class="col-34">
			<div class="lg:min-w-[420px]">
            <!-- Desktop Layout (original HTML structure) -->
            <div class="row-18 group desktop-layout">
                <img class="layer-10" src="<?php echo get_template_directory_uri(); ?>/html/images/4615221.png" alt="" width="56" height="46">
                <p class="text-38"><span class="text-style-9"><?php echo get_field('location_1_time') ?: '5 min'; ?></span><br><?php echo get_field('location_1_name') ?: 'szkoła podstawowa'; ?></p>
                <p class="text-39"><span class="text-style-9"><?php echo get_field('location_2_time') ?: '3 min'; ?></span><br><?php echo get_field('location_2_name') ?: 'Supermarkety'; ?></p>
                <img class="layer-11" src="<?php echo get_template_directory_uri(); ?>/html/images/3700434.png" alt="" width="51" height="51">
            </div>

            <!-- Mobile Layout (responsive structure) -->
            <div class="row-18 mobile-layout">
                <div class="location-pair-1">
                    <img class="layer-10" src="<?php echo get_template_directory_uri(); ?>/html/images/4615221.png" alt="" width="56" height="46">
                    <p class="text-38"><span class="text-style-9"><?php echo get_field('location_1_time') ?: '5 min'; ?></span><br><?php echo get_field('location_1_name') ?: 'szkoła podstawowa'; ?></p>
                </div>
                <div class="location-pair-2">
                    <p class="text-39"><span class="text-style-9"><?php echo get_field('location_2_time') ?: '3 min'; ?></span><br><?php echo get_field('location_2_name') ?: 'Supermarkety'; ?></p>
                    <img class="layer-11" src="<?php echo get_template_directory_uri(); ?>/html/images/3700434.png" alt="" width="51" height="51">
                </div>
            </div>
            <!-- Desktop Layout (original HTML structure) -->
            <div class="row-23 group desktop-layout">
                <img class="layer-12" src="<?php echo get_template_directory_uri(); ?>/html/images/5854105.png" alt="" width="47" height="41">
                <p class="text-40"><span class="text-style-9"><?php echo get_field('location_3_time') ?: '5 min'; ?></span><br><?php echo get_field('location_3_name') ?: 'Przystanek autobusowy'; ?></p>
                <p class="text-41"><?php echo get_field('location_4_time') ?: '5 min'; ?><br class="text-style-3"><span class="text-style-10"><?php echo get_field('location_4_name') ?: 'Park'; ?></span></p>
                <img class="pngtree-park-line-icon-png-image_9118726" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-park-line-icon-pn.png" alt="" width="56" height="56">
            </div>

            <!-- Mobile Layout (responsive structure) -->
            <div class="row-23 mobile-layout">
                <div class="location-pair-3">
                    <img class="layer-12" src="<?php echo get_template_directory_uri(); ?>/html/images/5854105.png" alt="" width="47" height="41">
                    <p class="text-40"><span class="text-style-9"><?php echo get_field('location_3_time') ?: '5 min'; ?></span><br><?php echo get_field('location_3_name') ?: 'Przystanek autobusowy'; ?></p>
                </div>
                <div class="location-pair-4">
                    <p class="text-41"><?php echo get_field('location_4_time') ?: '5 min'; ?><br class="text-style-3"><span class="text-style-10"><?php echo get_field('location_4_name') ?: 'Park'; ?></span></p>
                    <img class="pngtree-park-line-icon-png-image_9118726" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-park-line-icon-pn.png" alt="" width="56" height="56">
                </div>
            </div>
            <!-- Desktop Layout (original HTML structure) -->
            <div class="row-32 group desktop-layout">
                <img class="layer-13" src="<?php echo get_template_directory_uri(); ?>/html/images/6429371.png" alt="" width="45" height="45">
                <p class="text-42"><span class="text-style-9"><?php echo get_field('location_5_time') ?: '3 min'; ?></span><br><?php echo get_field('location_5_name') ?: 'Przedszkole publiczne'; ?></p>
                <p class="text-43"><?php echo get_field('location_6_time') ?: '2 min'; ?><br class="text-style-3"><span class="text-style-10"><?php echo get_field('location_6_name') ?: 'Basen'; ?></span></p>
                <img class="pngtree-swimming-pool-line-icon-vector-png-image_6683063" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-swimming-pool-lin.png" alt="" width="49" height="39">
            </div>

            <!-- Mobile Layout (responsive structure) -->
            <div class="row-32 mobile-layout">
                <div class="location-pair-5">
                    <img class="layer-13" src="<?php echo get_template_directory_uri(); ?>/html/images/6429371.png" alt="" width="45" height="45">
                    <p class="text-42"><span class="text-style-9"><?php echo get_field('location_5_time') ?: '3 min'; ?></span><br><?php echo get_field('location_5_name') ?: 'Przedszkole publiczne'; ?></p>
                </div>
                <div class="location-pair-6">
                    <p class="text-43"><?php echo get_field('location_6_time') ?: '2 min'; ?><br class="text-style-3"><span class="text-style-10"><?php echo get_field('location_6_name') ?: 'Basen'; ?></span></p>
                    <img class="pngtree-swimming-pool-line-icon-vector-png-image_6683063" src="<?php echo get_template_directory_uri(); ?>/html/images/pngtree-swimming-pool-lin.png" alt="" width="49" height="39">
                </div>
            </div>
            <div class="btn-kopia-2">
                <?php echo get_field('location_button_text') ?: 'Zobacz mieszkania'; ?>
            </div>
			</div>
        </div>
        <div class="warstwa-64">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2550.123456789!2d19.1234567!3d50.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDA3JzI0LjQiTiAxOcKwMDcnMjQuNCJF!5e0!3m2!1spl!2spl!4v1234567890123!5m2!1spl!2spl"
                width="747"
                height="686"
                style="border:0; border-radius: 8px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Mapa lokalizacji Green House Tuwima">
            </iframe>
        </div>
    </div>
</div>

