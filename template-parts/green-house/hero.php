<?php
/**
 * Template part for Green House hero section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get hero background image
$hero_background = get_field('hero_background');
$background_style = '';
if ($hero_background && !empty($hero_background['url'])) {
    $background_style = 'style="background-image: url(' . esc_url($hero_background['url']) . '); background-size: cover; background-position: center; background-repeat: no-repeat;"';
}
?>

<section class="hero-section" <?php echo $background_style; ?>>
    <div class="baner-2 group">
        <p class="text-7"><?php echo get_field('hero_title') ?: 'Green House<br class="text-style"><strong class="text-style-2">tuwima</strong>'; ?></p>
        <p class="text-8"><?php echo get_field('hero_subtitle') ?: 'Najlepsza inwestycja w Twoją przyszłosć'; ?></p>
    </div>
    <?php
    $hero_button = get_field('hero_button');
    if (!empty($hero_button['text']) && !empty($hero_button['url']) && $hero_button['url'] !== '#') : ?>
    <button class="grupa-8" onclick="window.location.href='<?php echo esc_url($hero_button['url']); ?>'" aria-label="<?php echo esc_attr($hero_button['text']); ?> - <?php echo esc_attr(get_field('hero_title') ?: 'Green House'); ?>">
        <?php echo esc_html($hero_button['text']); ?>
    </button>
    <?php else : ?>
    <button class="grupa-8" onclick="window.location.href='#mieszkania'" aria-label="Zobacz mieszkania - Green House">
        Zobacz mieszkania
    </button>
    <?php endif; ?>
    <div class="grupa-7 group">
        <p class="text-10"><strong class="text-style-4"><?php echo get_field('stat_1_number') ?: '06.2026'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_1_label') ?: 'Planowane <br>zakończenie'; ?></p>
        <div class="warstwa-48"></div>
        <p class="text-11"><strong class="text-style-4"><?php echo get_field('stat_2_number') ?: '14'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_2_label') ?: 'Liczba <br>budynków'; ?></p>
        <div class="warstwa-48-kopia"></div>
        <p class="text-12"><span class="text-style-6"><?php echo get_field('stat_3_number') ?: '28'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_3_label') ?: 'Ilość <br>mieszkań'; ?></p>
        <div class="warstwa-48-kopia-2"></div>
        <p class="text-13"><span class="text-style-6"><?php echo get_field('stat_4_number') ?: '35-49m²'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_4_label') ?: 'Dostene <br>metraże'; ?></p>
        <div class="warstwa-48-kopia-3"></div>
        <p class="text-14"><span class="text-style-6"><?php echo get_field('stat_5_number') ?: '40'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_5_label') ?: 'Miejsca <br>parkingowe'; ?></p>
        <div class="warstwa-48-kopia-4"></div>
        <p class="text-15"><span class="text-style-6"><?php echo get_field('stat_6_number') ?: '9'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_6_label') ?: 'Liczba <br>ogóodków'; ?></p>
    </div>
</section>
