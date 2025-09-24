<?php
/**
 * Admin Setup Script
 * Run this once to set up the admin user
 */

// Include WordPress
require_once('../../../wp-config.php');

// Check if user already exists
$user = get_user_by('login', 'admin_tuwima');

if (!$user) {
    // Create admin user
    $user_id = wp_create_user('admin_tuwima', 'GREENHOUSEtuwima', 'biuro@budraise.pl');
    
    if (!is_wp_error($user_id)) {
        // Set user role to administrator
        $user = new WP_User($user_id);
        $user->set_role('administrator');
        
        // Update user display name
        wp_update_user(array(
            'ID' => $user_id,
            'display_name' => 'Admin Tuwima',
            'first_name' => 'Admin',
            'last_name' => 'Tuwima'
        ));
        
        echo "Admin user created successfully!\n";
        echo "Username: admin_tuwima\n";
        echo "Password: GREENHOUSEtuwima\n";
        echo "Email: biuro@budraise.pl\n";
    } else {
        echo "Error creating user: " . $user_id->get_error_message() . "\n";
    }
} else {
    // Update existing user password
    wp_set_password('GREENHOUSEtuwima', $user->ID);
    echo "Admin user password updated!\n";
    echo "Username: admin_tuwima\n";
    echo "Password: GREENHOUSEtuwima\n";
    echo "Email: biuro@budraise.pl\n";
}

// Update site email
update_option('admin_email', 'biuro@budraise.pl');

echo "Setup complete!\n";
?>
