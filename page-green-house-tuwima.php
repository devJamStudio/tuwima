<?php
/**
 * Template Name: Green House Tuwima
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
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

    <!-- Custom styles for pixel-perfect design -->
    <style>
        /* Ensure Montserrat font is loaded */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap');
        
        /* Custom font classes */
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        
        /* Ensure proper text rendering */
        body { 
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-family: 'Lato', sans-serif;
        }
        
        /* Fix for exact pixel positioning */
        .min-w-\[1920px\] { min-width: 1920px; }
        
        /* Ensure proper float clearing */
        .group:after {
            content: "";
            display: table;
            clear: both;
        }
        
        /* Custom color classes */
        .text-green-custom { color: #00a906; }
        .bg-green-custom { background-color: #00a906; }
    </style>
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