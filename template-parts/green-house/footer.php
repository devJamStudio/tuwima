<?php
/**
 * Template part for Green House footer section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer class="stopka">
    <div class="layer-holder-2">
        <div class="logo-kopia-3">
            <div class="wrapper-15">
                <img class="warstwa-0-kopia-2-2" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2_2.png" alt="" width="48" height="52">
            </div>
            <p class="text-150"><?php echo get_field('footer_title') ?: 'Green House'; ?></p>
            <img class="tuwima-2" src="<?php echo get_field('footer_tuwima_logo')['url'] ?? get_template_directory_uri() . '/html/images/tuwima_2.png'; ?>" alt="tuwima" width="118" height="20" title="tuwima">
        </div>
    </div>
    <div class="col-10">
        <p class="text-151"><?php echo get_field('contact_form_title') ?: 'Skontaktuj się z Nami'; ?></p>
        <div class="row-35 match-height group">
            <div class="col-47">
                <div class="warstwa-61-holder">
                    <div class="text-152">
                        <p><?php echo get_field('form_name_label') ?: 'Imię i nazwisko:'; ?></p>
                    </div>
                </div>
                <div class="warstwa-61-kopia-holder">
                    <div class="email">
                        <p><?php echo get_field('form_email_label') ?: 'Email:'; ?></p>
                    </div>
                </div>
                <div class="warstwa-61-kopia-2-holder">
                    <div class="telefon">
                        <p><?php echo get_field('form_phone_label') ?: 'Telefon:'; ?></p>
                    </div>
                </div>
            </div>
            <div class="warstwa-61-kopia-3-holder">
                <?php echo get_field('form_message_label') ?: 'Napisz wiadomość:'; ?>
            </div>
        </div>
        <div class="row-14 group">
            <img class="layer-24" src="<?php echo get_template_directory_uri(); ?>/html/images/kszta_t_1.png" alt="" width="7" height="11">
            <img class="text-154" src="<?php echo get_field('privacy_policy_image')['url'] ?? get_template_directory_uri() . '/html/images/polityka_prywatno_ci.png'; ?>" alt="Polityka prywatności" width="141" height="16" title="Polityka prywatności">
            <div class="col-35">
                <div class="row-25 group">
                    <div class="col-39">
                        <div class="layer-holder-3">
                            <img class="ion-checkmark-icon" src="<?php echo get_template_directory_uri(); ?>/html/images/ion-checkmark-icon.png" alt="" width="19" height="15">
                        </div>
                        <div class="layer-holder-4">
                            <img class="ion-checkmark-icon-kopia" src="<?php echo get_template_directory_uri(); ?>/html/images/ion-checkmark-icon.png" alt="" width="19" height="15">
                        </div>
                    </div>
                    <div class="col-40">
                        <p class="text-155"><?php echo get_field('consent_text_1') ?: 'Wyrażam zgodę na wysyłanie informacji handlowych'; ?></p>
                        <p class="text-156"><?php echo get_field('consent_text_2') ?: 'Wyrażam zgodę na przekazanie i przetwarzanie moich danych<br>osobowych w celu odpowiedzi na przesłaną wiadomość'; ?></p>
                    </div>
                </div>
                <div class="layer-holder-5">
                    <?php echo get_field('submit_button_text') ?: 'Wyślij wiadomość'; ?>
                </div>
            </div>
        </div>
    </div>
</footer>




