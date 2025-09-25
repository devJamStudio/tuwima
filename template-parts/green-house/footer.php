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
                <img class="warstwa-0-kopia-2-2" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="" width="48" height="52">
            </div>
            <p class="text-150"><?php echo get_field('footer_title') ?: 'Green House'; ?></p>
            <img class="tuwima-2" src="<?php echo get_field('footer_tuwima_logo')['url'] ?? green_house_image_url('tuwima_2.png'); ?>" alt="tuwima" width="118" height="20" title="tuwima">
        </div>
    </div>
    <div class="col-10 shadow-xl">
        <p class="text-151"><?php echo get_field('contact_form_title') ?: 'Skontaktuj się z Nami'; ?></p>

        <form id="contact-form" class="contact-form" method="post" action="">
            <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>

            <div class="row-35 match-height group">
                <div class="col-47">
                    <div class="warstwa-61-holder" style="border: 1px solid #000; background: none;">
                        <div class="text-152">
                            <p><?php echo get_field('form_name_label') ?: 'Imię i nazwisko:'; ?></p>
                        </div>
                        <input type="text" name="contact_name" id="contact_name" required style="width: 100%; padding: 8px 12px; border: none; font-size: 14px; background: transparent; display: block; box-sizing: border-box;" placeholder="Wprowadź imię i nazwisko">
                    </div>
                    <div class="warstwa-61-kopia-holder" style="border: 1px solid #000; background: none;">
                        <div class="email">
                            <p><?php echo get_field('form_email_label') ?: 'Email:'; ?></p>
                        </div>
                        <input type="email" name="contact_email" id="contact_email" required style="width: 100%; padding: 8px 12px; border: none; font-size: 14px; background: transparent; display: block; box-sizing: border-box;" placeholder="Wprowadź adres email">
                    </div>
                    <div class="warstwa-61-kopia-2-holder" style="border: 1px solid #000; background: none;">
                        <div class="telefon">
                            <p><?php echo get_field('form_phone_label') ?: 'Telefon:'; ?></p>
                        </div>
                        <input type="tel" name="contact_phone" id="contact_phone" style="width: 100%; padding: 8px 12px; border: none; font-size: 14px; background: transparent; display: block; box-sizing: border-box;" placeholder="Wprowadź numer telefonu">
                    </div>
                </div>
                <div class="warstwa-61-kopia-3-holder" style="border: 1px solid #000; background: none;">
                    <p><?php echo get_field('form_message_label') ?: 'Napisz wiadomość:'; ?></p>
                    <textarea name="contact_message" id="contact_message" required style="width: 100%; padding: 8px 12px; border: none; font-size: 14px; min-height: 120px; resize: vertical; background: transparent; display: block; box-sizing: border-box; font-family: inherit;" placeholder="Wprowadź treść wiadomości" rows="6"></textarea>
                </div>
            </div>

            <div class="row-14 group">
                <img class="layer-24" src="<?php echo green_house_image_url('kszta_t_1.png'); ?>" alt="" width="7" height="11">
                <img class="text-154 privacy-policy-trigger" src="<?php echo get_field('privacy_policy_image')['url'] ?? green_house_image_url('polityka_prywatno_ci.png'); ?>" alt="Polityka prywatności" width="141" height="16" title="Polityka prywatności" style="cursor: pointer;">
                <div class="col-35">
                    <div class="row-25 group">
                        <div class="col-39">
                            <div class="layer-holder-3">
                                <input type="checkbox" name="consent_marketing" id="consent_marketing" style="display: none;">
                                <label for="consent_marketing" class="checkbox-label" style="cursor: pointer; display: inline-block;">
                                    <img class="ion-checkmark-icon" src="<?php echo green_house_image_url('ion-checkmark-icon.png'); ?>" alt="" width="19" height="15" style="opacity: 0.3; transition: opacity 0.3s;">
                                </label>
                            </div>
                            <p class="text-155">
                                <label for="consent_marketing"><?php echo get_field('consent_text_1') ?: 'Wyrażam zgodę na wysyłanie informacji handlowych'; ?></label>
                            </p>
                        </div>
                        <div class="col-40">
                            <div class="layer-holder-4">
                                <input type="checkbox" name="consent_privacy" id="consent_privacy" required style="display: none;">
                                <label for="consent_privacy" class="checkbox-label" style="cursor: pointer; display: inline-block;">
                                    <img class="ion-checkmark-icon-kopia" src="<?php echo green_house_image_url('ion-checkmark-icon.png'); ?>" alt="" width="19" height="15" style="opacity: 0.3; transition: opacity 0.3s;">
                                </label>
                            </div>
                            <p class="text-156">
                                <label for="consent_privacy"><?php echo get_field('consent_text_2') ?: 'Wyrażam zgodę na przekazanie i przetwarzanie moich danych<br>osobowych w celu odpowiedzi na przesłaną wiadomość'; ?></label>
                            </p>
                        </div>
                    </div>
                    <div class="layer-holder-5">
                        <button type="submit" name="submit_contact_form" class="submit-button">
                            <?php echo get_field('submit_button_text') ?: 'Wyślij wiadomość'; ?>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        // Handle form submission
        if (isset($_POST['submit_contact_form']) && wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
            $name = sanitize_text_field($_POST['contact_name']);
            $email = sanitize_email($_POST['contact_email']);
            $phone = sanitize_text_field($_POST['contact_phone']);
            $message = sanitize_textarea_field($_POST['contact_message']);
            $consent_marketing = isset($_POST['consent_marketing']) ? 1 : 0;
            $consent_privacy = isset($_POST['consent_privacy']) ? 1 : 0;

            if ($name && $email && $message && $consent_privacy) {
                // Send email
                $to = get_field('contact_email') ?: get_option('admin_email');
                $subject = 'Nowa wiadomość z formularza kontaktowego - ' . get_bloginfo('name');
                $body = "Imię i nazwisko: $name\n";
                $body .= "Email: $email\n";
                $body .= "Telefon: $phone\n";
                $body .= "Wiadomość:\n$message\n\n";
                $body .= "Zgoda na marketing: " . ($consent_marketing ? 'Tak' : 'Nie') . "\n";
                $body .= "Zgoda na przetwarzanie danych: " . ($consent_privacy ? 'Tak' : 'Nie');

                $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');

                if (wp_mail($to, $subject, $body, $headers)) {
                    echo '<div class="form-success">Dziękujemy za wiadomość! Skontaktujemy się z Państwem wkrótce.</div>';
                } else {
                    echo '<div class="form-error">Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie.</div>';
                }
            } else {
                echo '<div class="form-error">Proszę wypełnić wszystkie wymagane pola i zaakceptować zgodę na przetwarzanie danych.</div>';
            }
        }
        ?>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle checkbox styling
    const checkboxes = document.querySelectorAll('#consent_marketing, #consent_privacy');
    checkboxes.forEach(function(checkbox) {
        const label = document.querySelector('label[for="' + checkbox.id + '"]');
        const img = label.querySelector('img');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                img.classList.add('checked');
            } else {
                img.classList.remove('checked');
            }
        });

        // Click on label to toggle checkbox
        label.addEventListener('click', function(e) {
            e.preventDefault();
            checkbox.checked = !checkbox.checked;
            checkbox.dispatchEvent(new Event('change'));
        });
    });
});

// Privacy Policy Modal
document.addEventListener('DOMContentLoaded', function() {
    const privacyTrigger = document.querySelector('.privacy-policy-trigger');
    const privacyModal = document.getElementById('privacy-modal');
    const privacyClose = document.querySelector('.privacy-close');

    if (privacyTrigger) {
        privacyTrigger.addEventListener('click', function() {
            if (privacyModal) {
                privacyModal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        });
    }

    if (privacyClose) {
        privacyClose.addEventListener('click', function() {
            if (privacyModal) {
                privacyModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }

    // Close modal when clicking outside
    if (privacyModal) {
        privacyModal.addEventListener('click', function(e) {
            if (e.target === privacyModal) {
                privacyModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }
});
</script>

<!-- Privacy Policy Modal -->
<div id="privacy-modal" class="privacy-modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="privacy-modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 800px; max-height: 80vh; overflow-y: auto; border-radius: 8px;">
        <span class="privacy-close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; line-height: 1;">&times;</span>
        <h2 style="color: #00a906; margin-top: 0;">Polityka Prywatności</h2>
        <div class="privacy-content">
            <?php
            $privacy_content = get_field('privacy_policy_content');
            if ($privacy_content) {
                echo wp_kses_post($privacy_content);
            } else {
                echo '<p>Treść polityki prywatności zostanie dodana przez administratora.</p>';
            }
            ?>
        </div>
    </div>
</div>





