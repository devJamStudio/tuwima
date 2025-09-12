<?php
/**
 * Template Name: Green House Tuwima
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Don't load WordPress header/footer
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Custom meta tags -->
    <title><?php echo get_field('page_title') ?: 'Green House Tuwima - Najlepsza inwestycja w Twoją przyszłość'; ?></title>
    <meta name="description" content="<?php echo get_field('page_description') ?: 'Green House Tuwima - nowoczesna inwestycja mieszkaniowa w Sosnowcu. Mieszkania z ogródkami i balkonami.'; ?>">
    <meta name="keywords" content="<?php echo get_field('page_keywords') ?: 'mieszkania Sosnowiec, inwestycja mieszkaniowa, Green House Tuwima'; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- WordPress head - loads all enqueued styles and scripts -->
    <?php wp_head(); ?>

    <!-- Additional Green House specific styles (keeping for compatibility) -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/responsive.css">

    <!-- Additional scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/html/js/match-height.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.match-height-bootstrap-row > * > *').matchHeight();
            $('.match-height > *').matchHeight();
        });
    </script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Main Content Container -->
<div class="min-h-screen">
    <?php get_template_part('template-parts/green-house/header'); ?>

    <main>
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
    </main>

    <?php get_template_part('template-parts/green-house/footer'); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
