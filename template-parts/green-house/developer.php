<?php
/**
 * Developer Section Template Part
 *
 * @package Future
 */

// Get developer content from ACF or set defaults
$developer_title = get_field('developer_title') ?: 'O developerze';
$developer_content = get_field('developer_content') ?: 'Tworzymy nieruchomości, które spełniają oczekiwania wymagających klientów. Stawiamy na jakość naszych realizacji. Współpracujemy z doświadczonym biurem projektowym dzięki czemu nasze nieruchomości są nowoczesne i praktyczne.<br><span class="text-style-7">&nbsp;</span><br>Realizację projektów powierzamy firmom budowlanym o ugruntowanej pozycji na rynku. Misją naszej firmy jest to, aby oddawać w ręce naszych klientów nieruchomości, które dają znaczący komfort życia codziennego.';
$developer_button_text = get_field('developer_button_text') ?: 'Skontaktuj się';
$developer_button_url = get_field('developer_button_url') ?: '#kontakt';
$developer_image = get_field('developer_image');
?>

<section class="o-developerze ">
    <div class="row-17  flex flex-col lg:flex-row gap-[36px] justify-between">
        <div class="col-9">
            <img class="text-140" src="<?php echo get_template_directory_uri(); ?>/html/images/o_developerze.png" alt="<?php echo esc_attr($developer_title); ?>" width="257" height="37" title="<?php echo esc_attr($developer_title); ?>">

            <div class="text-141">
                <?php echo wp_kses_post($developer_content); ?>
            </div>

            <button class="btn-developer" onclick="window.location.href='<?php echo esc_url($developer_button_url); ?>'" aria-label="<?php echo esc_attr($developer_button_text); ?> - <?php echo esc_attr($developer_title); ?>">
                <?php echo esc_html($developer_button_text); ?>
            </button>
        </div>

        <?php if ($developer_image): ?>
            <?php
            $developer_image_url = is_array($developer_image) ? $developer_image['url'] : $developer_image;
            ?>
            <img class="layer-22" src="<?php echo esc_url($developer_image_url); ?>" alt="Developer" width="747" height="686">
        <?php else: ?>
            <img class="layer-22" src="<?php echo get_template_directory_uri(); ?>/html/images/5.jpg" alt="Developer" width="747" height="686">
        <?php endif; ?>
    </div>
</section>





