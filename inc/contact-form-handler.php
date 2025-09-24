<?php
/**
 * Contact Form Handler with RODO Compliance
 *
 * @package Future
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle Contact Form Submission
 */
function future_handle_contact_form() {
    // Check if form was submitted
    if (!isset($_POST['contact_form_nonce']) || !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
        return;
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name'] ?? '');
    $email = sanitize_email($_POST['contact_email'] ?? '');
    $phone = sanitize_text_field($_POST['contact_phone'] ?? '');
    $message = sanitize_textarea_field($_POST['contact_message'] ?? '');
    $consent_privacy = isset($_POST['consent_privacy']) ? 1 : 0;
    $consent_marketing = isset($_POST['consent_marketing']) ? 1 : 0;

    // Validation
    $errors = array();

    if (empty($name)) {
        $errors[] = 'Imię i nazwisko jest wymagane.';
    }

    if (empty($email) || !is_email($email)) {
        $errors[] = 'Prawidłowy adres email jest wymagany.';
    }

    if (empty($message)) {
        $errors[] = 'Wiadomość jest wymagana.';
    }

    if (!$consent_privacy) {
        $errors[] = 'Zgoda na przetwarzanie danych osobowych jest wymagana.';
    }

    // If there are errors, store them and redirect back
    if (!empty($errors)) {
        set_transient('contact_form_errors', $errors, 300);
        wp_redirect(add_query_arg('contact_error', '1', wp_get_referer()));
        exit;
    }

    // Prepare email
    $to = get_field('contact_email', 'option') ?: 'biuro@budraise.pl';
    $subject = 'Nowa wiadomość z formularza kontaktowego - ' . get_bloginfo('name');

    $email_message = "
Nowa wiadomość z formularza kontaktowego:

Imię i nazwisko: {$name}
Email: {$email}
Telefon: {$phone}

Wiadomość:
{$message}

Zgody:
- Przetwarzanie danych osobowych: " . ($consent_privacy ? 'TAK' : 'NIE') . "
- Marketing: " . ($consent_marketing ? 'TAK' : 'NIE') . "

Data wysłania: " . date('Y-m-d H:i:s') . "
IP: " . $_SERVER['REMOTE_ADDR'] . "
User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "
    ";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $email . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send email
    $mail_sent = wp_mail($to, $subject, $email_message, $headers);

    if ($mail_sent) {
        // Store in database for backup
        future_store_contact_submission(array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'consent_privacy' => $consent_privacy,
            'consent_marketing' => $consent_marketing,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ));

        // Send auto-reply to user
        future_send_auto_reply($email, $name);

        wp_redirect(add_query_arg('contact_success', '1', wp_get_referer()));
        exit;
    } else {
        set_transient('contact_form_errors', array('Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie.'), 300);
        wp_redirect(add_query_arg('contact_error', '1', wp_get_referer()));
        exit;
    }
}
add_action('init', 'future_handle_contact_form');

/**
 * Store contact submission in database
 */
function future_store_contact_submission($data) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_submissions';

    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'consent_privacy' => $data['consent_privacy'],
            'consent_marketing' => $data['consent_marketing'],
            'ip_address' => $data['ip_address'],
            'user_agent' => $data['user_agent'],
            'submitted_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s')
    );

    return $result !== false;
}

/**
 * Send auto-reply to user
 */
function future_send_auto_reply($user_email, $user_name) {
    $subject = 'Dziękujemy za wiadomość - ' . get_bloginfo('name');

    $message = "
Drogi/a {$user_name},

dziękujemy za skontaktowanie się z nami. Otrzymaliśmy Twoją wiadomość i odpowiemy na nią w ciągu 24 godzin.

Z poważaniem,
Zespół " . get_bloginfo('name') . "

---
Ta wiadomość została wysłana automatycznie. Prosimy nie odpowiadać na ten email.
    ";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_field('contact_email', 'option') . '>'
    );

    wp_mail($user_email, $subject, $message, $headers);
}

/**
 * Create contact submissions table
 */
function future_create_contact_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_submissions';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20),
        message text NOT NULL,
        consent_privacy tinyint(1) NOT NULL DEFAULT 0,
        consent_marketing tinyint(1) NOT NULL DEFAULT 0,
        ip_address varchar(45),
        user_agent text,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY email (email),
        KEY submitted_at (submitted_at)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'future_create_contact_table');

/**
 * Handle Price Inquiry Form Submission
 */
function future_handle_price_inquiry() {
    if (isset($_POST['price_inquiry_nonce']) && wp_verify_nonce($_POST['price_inquiry_nonce'], 'price_inquiry_action')) {

        // Sanitize form data
        $name = sanitize_text_field($_POST['inquiry_name'] ?? '');
        $email = sanitize_email($_POST['inquiry_email'] ?? '');
        $message = sanitize_textarea_field($_POST['inquiry_message'] ?? '');
        $consent = isset($_POST['inquiry_consent']) ? 1 : 0;
        $apartment_number = sanitize_text_field($_POST['apartment_number'] ?? '');
        $apartment_rooms = sanitize_text_field($_POST['apartment_rooms'] ?? '');
        $apartment_area = sanitize_text_field($_POST['apartment_area'] ?? '');
        $apartment_garden = sanitize_text_field($_POST['apartment_garden'] ?? '');

        // Validation
        $errors = array();

        if (empty($name)) {
            $errors[] = 'Imię i nazwisko jest wymagane.';
        }

        if (empty($email) || !is_email($email)) {
            $errors[] = 'Prawidłowy adres email jest wymagany.';
        }

        if (empty($message)) {
            $errors[] = 'Treść wiadomości jest wymagana.';
        }

        if (!$consent) {
            $errors[] = 'Zgoda na przetwarzanie danych osobowych jest wymagana.';
        }

        if (empty($errors)) {
            // Prepare email
            $to = get_field('contact_email', 'option') ?: 'biuro@budraise.pl';
            $subject = 'Zapytanie o cenę mieszkania - ' . get_bloginfo('name');

            $email_message = "
            Nowe zapytanie o cenę mieszkania:

            DANE MIESZKANIA:
            Mieszkanie: {$apartment_number}
            Liczba pokoi: {$apartment_rooms}
            Powierzchnia: {$apartment_area}
            Ogródek: {$apartment_garden}

            DANE KLIENTA:
            Imię i nazwisko: {$name}
            Email: {$email}

            WIADOMOŚĆ:
            {$message}

            Zgoda na przetwarzanie danych osobowych: " . ($consent ? 'TAK' : 'NIE') . "

            Data wysłania: " . date('Y-m-d H:i:s') . "
            IP: " . $_SERVER['REMOTE_ADDR'] . "
            ";

            $headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                'From: ' . get_bloginfo('name') . ' <' . $email . '>',
                'Reply-To: ' . $name . ' <' . $email . '>'
            );

            // Send email
            $mail_sent = wp_mail($to, $subject, $email_message, $headers);

            if ($mail_sent) {
                // Store in database for backup
                global $wpdb;
                $table_name = $wpdb->prefix . 'price_inquiries';

                $wpdb->insert(
                    $table_name,
                    array(
                        'name' => $name,
                        'email' => $email,
                        'message' => $message,
                        'apartment_number' => $apartment_number,
                        'apartment_rooms' => $apartment_rooms,
                        'apartment_area' => $apartment_area,
                        'apartment_garden' => $apartment_garden,
                        'consent' => $consent,
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                        'submitted_at' => current_time('mysql')
                    ),
                    array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s')
                );

                wp_send_json_success('Zapytanie zostało wysłane pomyślnie.');
            } else {
                wp_send_json_error('Wystąpił błąd podczas wysyłania zapytania.');
            }
        } else {
            wp_send_json_error(implode(' ', $errors));
        }
    }
}
add_action('wp_ajax_price_inquiry', 'future_handle_price_inquiry');
add_action('wp_ajax_nopriv_price_inquiry', 'future_handle_price_inquiry');

/**
 * Create price inquiries table
 */
function future_create_price_inquiries_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'price_inquiries';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        message text NOT NULL,
        apartment_number varchar(20),
        apartment_rooms varchar(20),
        apartment_area varchar(50),
        apartment_garden varchar(50),
        consent tinyint(1) NOT NULL DEFAULT 0,
        ip_address varchar(45),
        user_agent text,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'future_create_price_inquiries_table');

/**
 * Display contact form messages
 */
function future_display_contact_messages() {
    if (isset($_GET['contact_success']) && $_GET['contact_success'] == '1') {
        echo '<div class="contact-message success">';
        echo '<p>Dziękujemy za wiadomość! Odpowiemy na nią w ciągu 24 godzin.</p>';
        echo '</div>';
    }

    if (isset($_GET['contact_error']) && $_GET['contact_error'] == '1') {
        $errors = get_transient('contact_form_errors');
        if ($errors) {
            echo '<div class="contact-message error">';
            echo '<p>Wystąpiły następujące błędy:</p>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . esc_html($error) . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            delete_transient('contact_form_errors');
        }
    }
}

/**
 * Add admin menu for contact submissions
 */
function future_contact_submissions_admin_menu() {
    add_menu_page(
        'Contact Submissions',
        'Contact Forms',
        'manage_options',
        'contact-submissions',
        'future_contact_submissions_page',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'future_contact_submissions_admin_menu');

/**
 * Contact submissions admin page
 */
function future_contact_submissions_page() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_submissions';

    // Handle delete action
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $wpdb->delete($table_name, array('id' => $id), array('%d'));
        echo '<div class="notice notice-success"><p>Submission deleted successfully.</p></div>';
    }

    // Get submissions
    $submissions = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC");

    ?>
    <div class="wrap">
        <h1>Contact Form Submissions</h1>

        <?php if (empty($submissions)): ?>
            <p>No submissions yet.</p>
        <?php else: ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Consents</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($submissions as $submission): ?>
                        <tr>
                            <td><?php echo $submission->id; ?></td>
                            <td><?php echo esc_html($submission->name); ?></td>
                            <td>
                                <a href="mailto:<?php echo esc_attr($submission->email); ?>">
                                    <?php echo esc_html($submission->email); ?>
                                </a>
                            </td>
                            <td><?php echo esc_html($submission->phone); ?></td>
                            <td><?php echo esc_html(wp_trim_words($submission->message, 10)); ?></td>
                            <td>
                                Privacy: <?php echo $submission->consent_privacy ? '✓' : '✗'; ?><br>
                                Marketing: <?php echo $submission->consent_marketing ? '✓' : '✗'; ?>
                            </td>
                            <td><?php echo date('Y-m-d H:i', strtotime($submission->submitted_at)); ?></td>
                            <td>
                                <a href="?page=contact-submissions&action=view&id=<?php echo $submission->id; ?>" class="button">View</a>
                                <a href="?page=contact-submissions&action=delete&id=<?php echo $submission->id; ?>"
                                   class="button"
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <style>
    .contact-message {
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
    }

    .contact-message.success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .contact-message.error {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .contact-message ul {
        margin: 10px 0 0 20px;
    }
    </style>
    <?php
}

/**
 * Handle view action for submissions
 */
function future_handle_view_submission() {
    if (isset($_GET['page']) && $_GET['page'] == 'contact-submissions' &&
        isset($_GET['action']) && $_GET['action'] == 'view' && isset($_GET['id'])) {

        global $wpdb;
        $table_name = $wpdb->prefix . 'contact_submissions';
        $id = intval($_GET['id']);

        $submission = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));

        if ($submission) {
            ?>
            <div class="wrap">
                <h1>Contact Submission Details</h1>
                <a href="?page=contact-submissions" class="button">← Back to List</a>

                <table class="form-table">
                    <tr>
                        <th>Name:</th>
                        <td><?php echo esc_html($submission->name); ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>
                            <a href="mailto:<?php echo esc_attr($submission->email); ?>">
                                <?php echo esc_html($submission->email); ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo esc_html($submission->phone); ?></td>
                    </tr>
                    <tr>
                        <th>Message:</th>
                        <td><?php echo nl2br(esc_html($submission->message)); ?></td>
                    </tr>
                    <tr>
                        <th>Consents:</th>
                        <td>
                            Privacy: <?php echo $submission->consent_privacy ? '✓ Granted' : '✗ Not granted'; ?><br>
                            Marketing: <?php echo $submission->consent_marketing ? '✓ Granted' : '✗ Not granted'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>IP Address:</th>
                        <td><?php echo esc_html($submission->ip_address); ?></td>
                    </tr>
                    <tr>
                        <th>User Agent:</th>
                        <td><?php echo esc_html($submission->user_agent); ?></td>
                    </tr>
                    <tr>
                        <th>Submitted:</th>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($submission->submitted_at)); ?></td>
                    </tr>
                </table>
            </div>
            <?php
            exit;
        }
    }
}
add_action('admin_init', 'future_handle_view_submission');
