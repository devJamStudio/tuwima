<?php
/**
 * Simple Working ACF Fields for Green House Tuwima
 * This version will definitely work
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Only run if ACF is active
if (function_exists('acf_add_local_field_group')) {

    // Add Options Page
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'menu_slug' => 'theme-options',
            'capability' => 'edit_posts',
            'icon_url' => 'dashicons-admin-customizer',
        ));
    }

    // Hero Section Fields
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

    // About Section Fields
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
                'default_value' => 'Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca, zaledwie kilka minut od centrum. Osiedle składa się z 14 domów w zabudowie bliźniaczej – łącznie 28 mieszkań.',
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

    // Contact Section Fields
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

    // Theme Options Fields
    acf_add_local_field_group(array(
        'key' => 'group_theme_options',
        'title' => 'Theme Options',
        'fields' => array(
            array(
                'key' => 'field_login_logo',
                'label' => 'Login Page Logo',
                'name' => 'login_logo',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_primary_color',
                'label' => 'Primary Color',
                'name' => 'primary_color',
                'type' => 'color_picker',
                'default_value' => '#00a906',
            ),
            array(
                'key' => 'field_secondary_color',
                'label' => 'Secondary Color',
                'name' => 'secondary_color',
                'type' => 'color_picker',
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_loader_logo',
                'label' => 'Page Loader Logo',
                'name' => 'loader_logo',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_404_title',
                'label' => '404 Page Title',
                'name' => '404_title',
                'type' => 'text',
                'default_value' => 'Strona nie została znaleziona',
            ),
            array(
                'key' => 'field_404_description',
                'label' => '404 Page Description',
                'name' => '404_description',
                'type' => 'textarea',
                'default_value' => 'Przepraszamy, ale strona której szukasz nie istnieje lub została przeniesiona.',
            ),
            array(
                'key' => 'field_404_home_button',
                'label' => '404 Home Button Text',
                'name' => '404_home_button',
                'type' => 'text',
                'default_value' => 'Strona główna',
            ),
            array(
                'key' => 'field_404_contact_button',
                'label' => '404 Contact Button Text',
                'name' => '404_contact_button',
                'type' => 'text',
                'default_value' => 'Kontakt',
            ),
            array(
                'key' => 'field_404_additional_content',
                'label' => '404 Additional Content',
                'name' => '404_additional_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-options',
                ),
            ),
        ),
    ));

    // Page Builder Blocks (ACF Repeater)
    acf_add_local_field_group(array(
        'key' => 'group_page_builder_blocks',
        'title' => 'Page Builder Blocks',
        'fields' => array(
            array(
                'key' => 'field_page_builder_blocks',
                'label' => 'Page Blocks',
                'name' => 'page_builder_blocks',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_block_type',
                        'label' => 'Block Type',
                        'name' => 'block_type',
                        'type' => 'select',
                        'choices' => array(
                            'hero-slider' => 'Hero Slider',
                            'text-image-right' => 'Text + Image (Right)',
                            'text-image-left' => 'Text + Image (Left)',
                            'benefits' => 'Benefits',
                            'location' => 'Location',
                            'apartments' => 'Apartments Selection',
                            'visualizations' => 'Visualizations Slider',
                            'contact' => 'Contact',
                        ),
                        'default_value' => 'hero-slider',
                    ),
                    // Hero Slider Fields
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Hero Title',
                        'name' => 'hero_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_subtitle',
                        'label' => 'Hero Subtitle',
                        'name' => 'hero_subtitle',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_button_text',
                        'label' => 'Button Text',
                        'name' => 'hero_button_text',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_button_url',
                        'label' => 'Button URL',
                        'name' => 'hero_button_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_slider_images',
                        'label' => 'Slider Images',
                        'name' => 'hero_slider_images',
                        'type' => 'gallery',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_number_counters',
                        'label' => 'Number Counters',
                        'name' => 'hero_number_counters',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Counter',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_counter_number',
                                'label' => 'Number',
                                'name' => 'counter_number',
                                'type' => 'number',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_counter_label',
                                'label' => 'Label',
                                'name' => 'counter_label',
                                'type' => 'text',
                                'default_value' => '',
                            ),
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'hero-slider',
                                ),
                            ),
                        ),
                    ),
                    // Text + Image Fields (Right)
                    array(
                        'key' => 'field_text_image_right_title',
                        'label' => 'Title',
                        'name' => 'text_image_right_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-right',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_right_content',
                        'label' => 'Content',
                        'name' => 'text_image_right_content',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-right',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_right_button_text',
                        'label' => 'Button Text',
                        'name' => 'text_image_right_button_text',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-right',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_right_button_url',
                        'label' => 'Button URL',
                        'name' => 'text_image_right_button_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-right',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_right_image',
                        'label' => 'Image',
                        'name' => 'text_image_right_image',
                        'type' => 'image',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-right',
                                ),
                            ),
                        ),
                    ),
                    // Text + Image Fields (Left)
                    array(
                        'key' => 'field_text_image_left_title',
                        'label' => 'Title',
                        'name' => 'text_image_left_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-left',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_left_content',
                        'label' => 'Content',
                        'name' => 'text_image_left_content',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-left',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_left_button_text',
                        'label' => 'Button Text',
                        'name' => 'text_image_left_button_text',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-left',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_left_button_url',
                        'label' => 'Button URL',
                        'name' => 'text_image_left_button_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-left',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_text_image_left_image',
                        'label' => 'Image',
                        'name' => 'text_image_left_image',
                        'type' => 'image',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'text-image-left',
                                ),
                            ),
                        ),
                    ),
                    // Benefits Fields
                    array(
                        'key' => 'field_benefits_title',
                        'label' => 'Benefits Title',
                        'name' => 'benefits_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_benefits_content',
                        'label' => 'Benefits Content',
                        'name' => 'benefits_content',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_benefits_button_text',
                        'label' => 'Button Text',
                        'name' => 'benefits_button_text',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_benefits_button_url',
                        'label' => 'Button URL',
                        'name' => 'benefits_button_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_benefits_background_image',
                        'label' => 'Background Image',
                        'name' => 'benefits_background_image',
                        'type' => 'image',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_benefits_items',
                        'label' => 'Benefits Items',
                        'name' => 'benefits_items',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Benefit',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_benefit_icon',
                                'label' => 'Icon',
                                'name' => 'benefit_icon',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'field_benefit_title',
                                'label' => 'Title',
                                'name' => 'benefit_title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_benefit_description',
                                'label' => 'Description',
                                'name' => 'benefit_description',
                                'type' => 'textarea',
                            ),
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'benefits',
                                ),
                            ),
                        ),
                    ),
                    // Location Fields
                    array(
                        'key' => 'field_location_title',
                        'label' => 'Location Title',
                        'name' => 'location_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'location',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_location_content',
                        'label' => 'Location Content',
                        'name' => 'location_content',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'location',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_location_map_embed',
                        'label' => 'Google Maps Embed Code',
                        'name' => 'location_map_embed',
                        'type' => 'textarea',
                        'instructions' => 'Paste Google Maps embed code here',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'location',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_location_items',
                        'label' => 'Location Items',
                        'name' => 'location_items',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Location',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_location_icon',
                                'label' => 'Icon',
                                'name' => 'location_icon',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'field_location_time',
                                'label' => 'Time',
                                'name' => 'location_time',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_location_name',
                                'label' => 'Name',
                                'name' => 'location_name',
                                'type' => 'text',
                            ),
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'location',
                                ),
                            ),
                        ),
                    ),
                    // Apartments Fields
                    array(
                        'key' => 'field_apartments_title',
                        'label' => 'Apartments Title',
                        'name' => 'apartments_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'apartments',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_apartments_description',
                        'label' => 'Apartments Description',
                        'name' => 'apartments_description',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'apartments',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_apartments_floor_plan',
                        'label' => 'Floor Plan Image',
                        'name' => 'apartments_floor_plan',
                        'type' => 'image',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'apartments',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_apartments_list',
                        'label' => 'Apartments',
                        'name' => 'apartments_list',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Apartment',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_apartment_number',
                                'label' => 'Number',
                                'name' => 'apartment_number',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_apartment_rooms',
                                'label' => 'Rooms',
                                'name' => 'apartment_rooms',
                                'type' => 'number',
                            ),
                            array(
                                'key' => 'field_apartment_area',
                                'label' => 'Area (m²)',
                                'name' => 'apartment_area',
                                'type' => 'number',
                            ),
                            array(
                                'key' => 'field_apartment_garden',
                                'label' => 'Garden Area (m²)',
                                'name' => 'apartment_garden',
                                'type' => 'number',
                            ),
                            array(
                                'key' => 'field_apartment_status',
                                'label' => 'Status',
                                'name' => 'apartment_status',
                                'type' => 'select',
                                'choices' => array(
                                    'available' => 'Available',
                                    'reserved' => 'Reserved',
                                    'sold' => 'Sold',
                                ),
                                'default_value' => 'available',
                            ),
                            array(
                                'key' => 'field_apartment_price',
                                'label' => 'Price Action',
                                'name' => 'apartment_price',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_apartment_plan_url',
                                'label' => 'Plan URL',
                                'name' => 'apartment_plan_url',
                                'type' => 'url',
                            ),
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'apartments',
                                ),
                            ),
                        ),
                    ),
                    // Visualizations Fields
                    array(
                        'key' => 'field_visualizations_title',
                        'label' => 'Visualizations Title',
                        'name' => 'visualizations_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'visualizations',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_visualizations_images',
                        'label' => 'Visualization Images',
                        'name' => 'visualizations_images',
                        'type' => 'gallery',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'visualizations',
                                ),
                            ),
                        ),
                    ),
                    // Contact Fields
                    array(
                        'key' => 'field_contact_title',
                        'label' => 'Contact Title',
                        'name' => 'contact_title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_company_logo',
                        'label' => 'Company Logo',
                        'name' => 'contact_company_logo',
                        'type' => 'image',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_address',
                        'label' => 'Address',
                        'name' => 'contact_address',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_email',
                        'label' => 'Email',
                        'name' => 'contact_email',
                        'type' => 'email',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_phone',
                        'label' => 'Phone',
                        'name' => 'contact_phone',
                        'type' => 'text',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_company_details',
                        'label' => 'Company Details',
                        'name' => 'contact_company_details',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_contact_agents',
                        'label' => 'Contact Agents',
                        'name' => 'contact_agents',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Agent',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_agent_photo',
                                'label' => 'Photo',
                                'name' => 'agent_photo',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'field_agent_name',
                                'label' => 'Name',
                                'name' => 'agent_name',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_agent_phone',
                                'label' => 'Phone',
                                'name' => 'agent_phone',
                                'type' => 'text',
                            ),
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_block_type',
                                    'operator' => '==',
                                    'value' => 'contact',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}
