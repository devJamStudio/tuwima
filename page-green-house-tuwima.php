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

<div class="global_container_">
    <?php get_template_part('template-parts/green-house/header'); ?>

    <div class="main-content-wrreapper">
        <?php get_template_part('template-parts/green-house/about'); ?>

        <?php get_template_part('template-parts/green-house/benefits'); ?>

        <?php get_template_part('template-parts/green-house/layout'); ?>
        <?php get_template_part('template-parts/green-house/garden'); ?>

        <?php get_template_part('template-parts/green-house/location'); ?>

        <?php get_template_part('template-parts/green-house/apartments'); ?>

        <?php get_template_part('template-parts/green-house/apartments-table'); ?>

        <?php get_template_part('template-parts/green-house/gallery'); ?>

        <?php get_template_part('template-parts/green-house/financing'); ?>

        <?php get_template_part('template-parts/green-house/developer'); ?>

        <?php get_template_part('template-parts/green-house/contact'); ?>
    </div>

    <?php get_template_part('template-parts/green-house/footer'); ?>
</div>

</body>
</html>
