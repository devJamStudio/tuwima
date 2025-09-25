<?php
/**
 * Financing Section Template Part
 *
 * @package Future
 */

// Get financing content from ACF or set defaults
$financing_title = get_field('financing_title') ?: 'Finansowanie';
$financing_content = get_field('financing_content') ?: 'Proces zakupu domu może wydawać się bardzo skomplikowany, ale możecie Państwo liczyć na naszą pomoc. Oferujemy pełne wsparcie przy pozyskaniu kredytu hipotecznego, który pozwoli Wam na wprowadzenie się do nowego domu.<br><span class="text-style-7">&nbsp;</span><br>Wybór odpowiedniego finansowania nieruchomości jest równie ważny co wybór samego domu. Posiadamy wiedzę oraz doświadczenie kredytowe, które pozwoli na szybkie znalezienie dla Państwa najkorzystniejszego rozwiązania kredytowego.<br><span class="text-style-7">&nbsp;</span><br>Dodatkowo współpracujemy z dedykowanym biurem doradztwa kredytowego Silesia Capital – Eksperci Kredytowi, w którym to zespół doświadczonych Doradców Kredytowych chętnie udzieli odpowiedzi na Państwa pytania.';
$financing_button_text = get_field('financing_button_text') ?: 'Skontaktuj się';
$financing_button_url = get_field('financing_button_url') ?: '#kontakt';
$financing_partner_logo = get_field('financing_partner_logo');
$financing_image = get_field('financing_image');
?>

<section class="finansowanie group" id="finansowanie">
    <div class="row-16  flex flex-col lg:flex-row gap-[36px] justify-between">
        <?php if ($financing_image): ?>
            <?php
            $financing_image_url = is_array($financing_image) ? $financing_image['url'] : $financing_image;
            ?>
            <img class="layer-21" src="<?php echo esc_url($financing_image_url); ?>" alt="Financing" width="747" height="686">
        <?php else: ?>
            <img class="layer-21" src="<?php echo get_template_directory_uri(); ?>/images/6_2.jpg" alt="Financing" width="747" height="686">
        <?php endif; ?>

        <div class="col-29">
            <img class="finansowanie-2" src="<?php echo get_template_directory_uri(); ?>/images/finansowanie.png" alt="<?php echo esc_attr($financing_title); ?>" width="243" height="31" title="<?php echo esc_attr($financing_title); ?>">

            <?php if ($financing_partner_logo): ?>
                <?php
                $logo_url = is_array($financing_partner_logo) ? $financing_partner_logo['url'] : $financing_partner_logo;
                ?>
                <img class="logo-poziom-nobg" src="<?php echo esc_url($logo_url); ?>" alt="Partner Logo" width="426" height="91">
            <?php else: ?>
                <img class="logo-poziom-nobg" src="<?php echo get_template_directory_uri(); ?>/images/logo-poziom-nobg.png" alt="Partner Logo" width="426" height="91">
            <?php endif; ?>

            <div class="text-137">
                <?php echo wp_kses_post($financing_content); ?>
            </div>

            <button class="btn-kopia-2-2" onclick="window.location.href='<?php echo esc_url($financing_button_url); ?>'" aria-label="<?php echo esc_attr($financing_button_text); ?> - <?php echo esc_attr($financing_title); ?>">
                <?php echo esc_html($financing_button_text); ?>
            </button>
        </div>
    </div>
</section>
