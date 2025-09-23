<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CertExpert
 */

get_header();
?>

	<div class="main-content-wrapper">
		<?php get_template_part('template-parts/green-house/about'); ?>

		<?php get_template_part('template-parts/green-house/benefits'); ?>

		<?php get_template_part('template-parts/green-house/layout'); ?>
		<?php get_template_part('template-parts/green-house/garden'); ?>

		<?php get_template_part('template-parts/green-house/location'); ?>

		<?php get_template_part('template-parts/green-house/apartments'); ?>

		<?php get_template_part('template-parts/green-house/gallery'); ?>

		<?php get_template_part('template-parts/green-house/financing'); ?>

		<?php get_template_part('template-parts/green-house/developer'); ?>

		<?php get_template_part('template-parts/green-house/contact'); ?>
	</div>

<?php
get_footer();
