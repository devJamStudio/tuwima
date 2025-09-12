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
<html>
<head>
    <title><?php echo get_field('page_title') ?: 'Green House Tuwima - Najlepsza inwestycja w Twoją przyszłość'; ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo get_field('page_description') ?: 'Green House Tuwima - nowoczesna inwestycja mieszkaniowa w Sosnowcu. Mieszkania z ogródkami i balkonami.'; ?>">
    <meta name="keywords" content="<?php echo get_field('page_keywords') ?: 'mieszkania Sosnowiec, inwestycja mieszkaniowa, Green House Tuwima'; ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Original CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/style.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic&amp;subset=cyrillic,cyrillic-ext,latin,latin-ext,vietnamese">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic&amp;subset=latin,latin-ext">

    <!-- jQuery and Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/html/js/match-height.js"></script>
    <script>
        $(function () {
            $('.match-height-bootstrap-row > * > *').matchHeight();
            $('.match-height > *').matchHeight();
        })
    </script>
</head>
<body>

<div class="global_container_">
    <?php get_template_part('template-parts/green-house/header'); ?>

    <div class="main-content-wrapper">
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
