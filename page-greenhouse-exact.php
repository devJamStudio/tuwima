<?php
/**
 * Template Name: Green House Exact Copy
 * Exact replica of page-green-house-tuwima.php with Tailwind styling
 */

get_header(); ?>

<div class="global_container_">

    <div class="main-content-wrapper">
        <?php get_template_part('template-parts/green-house/about'); ?>

        <?php get_template_part('template-parts/green-house/benefits'); ?>

        <?php get_template_part('template-parts/green-house/layout'); ?>
        <?php get_template_part('template-parts/green-house/garden'); ?>

        <?php get_template_part('template-parts/green-house/location'); ?>

        <?php get_template_part('template-parts/green-house/apartments'); ?>

        <?php get_template_part('template-parts/green-house/apartments-table'); ?>

        <!-- Gallery section placeholder -->
        <div class="galeria group">
            <div class="col-28">
                <img class="text-135" src="<?php echo get_template_directory_uri(); ?>/html/images/zobacz_galerie.png" alt="Zobacz galerie" width="256" height="38" title="Zobacz galerie">
                <div class="row-21 group">
                    <img class="layer-17" src="<?php echo get_template_directory_uri(); ?>/html/images/4_2.jpg" alt="" width="821" height="478">
                    <div class="col-37">
                        <img class="layer-18" src="<?php echo get_template_directory_uri(); ?>/html/images/2.png" alt="" width="290" height="210">
                        <img class="layer-19" src="<?php echo get_template_directory_uri(); ?>/html/images/5_2.png" alt="" width="290" height="210">
                    </div>
                </div>
            </div>
            <div class="col-32 group">
                <img class="layer-20" src="<?php echo get_template_directory_uri(); ?>/html/images/3_2.png" alt="" width="290" height="210">
                <div class="wrapper-17">
                    <div class="warstwa-51-holder">
                        Zobacz wszystkie
                    </div>
                </div>
            </div>
        </div>

        <!-- Financing section placeholder -->
        <div class="finansowanie group">
            <div class="row-16 group">
                <img class="layer-21" src="<?php echo get_template_directory_uri(); ?>/html/images/6_2.jpg" alt="" width="747" height="686">
                <div class="col-29">
                    <img class="finansowanie-2" src="<?php echo get_template_directory_uri(); ?>/html/images/finansowanie.png" alt="Finansowanie" width="243" height="31" title="Finansowanie">
                    <img class="logo-poziom-nobg" src="<?php echo get_template_directory_uri(); ?>/html/images/logo-poziom-nobg.png" alt="" width="426" height="91">
                    <p class="text-137"><?php echo get_field('financing_description') ?: 'Proces zakupu domu może wydawać się bardzo skomplikowany, ale możecie Państwo liczyć na naszą pomoc. Oferujemy pełne wsparcie przy pozyskaniu kredytu hipotecznego, który pozwoli Wam na wprowadzenie się do nowego domu.'; ?></p>
                    <div class="btn-kopia-2-2">
                        Skontaktuj się
                    </div>
                </div>
            </div>
            <div class="btn-kopia-4">
                Skontaktuj się
            </div>
        </div>

        <?php get_template_part('template-parts/green-house/developer'); ?>

        <?php get_template_part('template-parts/green-house/contact'); ?>
    </div>

    <?php get_template_part('template-parts/green-house/footer'); ?>
</div>

<?php get_footer(); ?>
