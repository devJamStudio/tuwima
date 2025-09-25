<?php
/**
 * Template Name: Green House Tuwima
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
get_header(); ?>


<body>

<div class="global_container_ ">
    <?php get_template_part('template-parts/green-house/header'); ?>

    <div class="main-content-wrapper">
        <?php
        // Check if page has page builder blocks
        $blocks = get_field('page_builder_blocks');

        if ($blocks && is_array($blocks) && !empty($blocks)) {
            // Use dynamic page builder blocks
            get_template_part('template-parts/green-house/page-builder-blocks');
        } else {
            // Fallback to static template parts
            get_template_part('template-parts/green-house/about');
            get_template_part('template-parts/green-house/benefits');
            get_template_part('template-parts/green-house/layout');
            get_template_part('template-parts/green-house/garden');
            get_template_part('template-parts/green-house/location');
            get_template_part('template-parts/green-house/apartments');
            get_template_part('template-parts/green-house/apartments-table');
            get_template_part('template-parts/green-house/price-table');
            get_template_part('template-parts/green-house/gallery');
            get_template_part('template-parts/green-house/financing');
            get_template_part('template-parts/green-house/developer');
            get_template_part('template-parts/green-house/contact');
        }
        ?>
    </div>

    <?php get_template_part('template-parts/green-house/footer'); ?>
</div>

</body>
</html>
