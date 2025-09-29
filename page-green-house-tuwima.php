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
            // Fallback to static template parts with alternating AOS animations
            $static_sections = [
                'about',
                'benefits',
                'layout',
                'garden',
                'location',
                'apartments',
                'apartments-table',
                'gallery',
                'financing',
                'developer',
                'contact'
            ];

            foreach ($static_sections as $index => $section) {
                // Add alternating AOS animation attributes
                $direction = ($index % 2 === 0) ? 'fade-right' : 'fade-left';
                $delay = 100 + ($index * 100);

                // Set global AOS attributes for this section
                $GLOBALS['current_section_aos'] = [
                    'direction' => $direction,
                    'delay' => $delay
                ];

                get_template_part('template-parts/green-house/' . $section);
            }
        }
        ?>
    </div>

    <?php get_template_part('template-parts/green-house/footer'); ?>
</div>

</body>
</html>
