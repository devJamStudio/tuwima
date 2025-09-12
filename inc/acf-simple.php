<?php
/**
 * Simple ACF Field Groups for Green House Tuwima
 * This is a simplified version to ensure it works
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Simple ACF Field Groups
 */
function future_register_simple_acf_fields() {
    
    // Check if ACF is active
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Simple Hero Section
    acf_add_local_field_group(array(
        'key' => 'group_hero_simple',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title_simple',
                'label' => 'Hero Title',
                'name' => 'hero_title_simple',
                'type' => 'text',
                'default_value' => 'Green House Tuwima',
                'required' => 1,
            ),
            array(
                'key' => 'field_hero_subtitle_simple',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle_simple',
                'type' => 'text',
                'default_value' => 'Najlepsza inwestycja w Twoją przyszłosć',
                'required' => 1,
            ),
            array(
                'key' => 'field_hero_button_text',
                'label' => 'Button Text',
                'name' => 'hero_button_text',
                'type' => 'text',
                'default_value' => 'Zobacz mieszkania',
            ),
            array(
                'key' => 'field_hero_button_url',
                'label' => 'Button URL',
                'name' => 'hero_button_url',
                'type' => 'url',
                'default_value' => '#mieszkania',
            ),
            array(
                'key' => 'field_hero_background_simple',
                'label' => 'Hero Background Image',
                'name' => 'hero_background_simple',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-green-house-tuwima.php',
                ),
            ),
        ),
    ));

    // Simple About Section
    acf_add_local_field_group(array(
        'key' => 'group_about_simple',
        'title' => 'About Section',
        'fields' => array(
            array(
                'key' => 'field_about_title_simple',
                'label' => 'About Title',
                'name' => 'about_title_simple',
                'type' => 'text',
                'default_value' => 'O inwestycji',
                'required' => 1,
            ),
            array(
                'key' => 'field_about_content_simple',
                'label' => 'About Content',
                'name' => 'about_content_simple',
                'type' => 'textarea',
                'default_value' => 'Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca...',
                'required' => 1,
            ),
            array(
                'key' => 'field_about_image_simple',
                'label' => 'About Image',
                'name' => 'about_image_simple',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-green-house-tuwima.php',
                ),
            ),
        ),
    ));

    // Simple Contact Section
    acf_add_local_field_group(array(
        'key' => 'group_contact_simple',
        'title' => 'Contact Section',
        'fields' => array(
            array(
                'key' => 'field_contact_title_simple',
                'label' => 'Contact Title',
                'name' => 'contact_title_simple',
                'type' => 'text',
                'default_value' => 'Skontaktuj się z Nami',
                'required' => 1,
            ),
            array(
                'key' => 'field_contact_phone_1',
                'label' => 'Phone 1',
                'name' => 'contact_phone_1',
                'type' => 'text',
                'default_value' => '453 287 744',
            ),
            array(
                'key' => 'field_contact_name_1',
                'label' => 'Name 1',
                'name' => 'contact_name_1',
                'type' => 'text',
                'default_value' => 'Mariusz Szyda',
            ),
            array(
                'key' => 'field_contact_phone_2',
                'label' => 'Phone 2',
                'name' => 'contact_phone_2',
                'type' => 'text',
                'default_value' => '572 481 313',
            ),
            array(
                'key' => 'field_contact_name_2',
                'label' => 'Name 2',
                'name' => 'contact_name_2',
                'type' => 'text',
                'default_value' => 'Rafał Banarski',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-green-house-tuwima.php',
                ),
            ),
        ),
    ));
}

// Hook the function to ACF init
add_action('acf/init', 'future_register_simple_acf_fields');
