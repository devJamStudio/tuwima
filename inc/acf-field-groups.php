<?php
/**
 * ACF Field Groups for Green House Tuwima Theme
 *
 * This file contains all ACF field group definitions for the Green House Tuwima real estate website.
 * Each section from the HTML design will have its own field group attached to page templates.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF Field Groups for Green House Tuwima
 */
function future_register_acf_field_groups() {

    // 1. HERO SECTION FIELD GROUP - Attached to Green House Tuwima page template
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'text',
                'instructions' => 'Main title for the hero section',
                'default_value' => 'Green House<br><strong>tuwima</strong>',
                'required' => 1,
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'instructions' => 'Subtitle text below the main title',
                'default_value' => 'Najlepsza inwestycja w Twoją przyszłosć',
                'required' => 1,
            ),
            array(
                'key' => 'field_hero_button',
                'label' => 'Hero Button',
                'name' => 'hero_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_button_text',
                        'label' => 'Button Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Zobacz mieszkania',
                    ),
                    array(
                        'key' => 'field_hero_button_url',
                        'label' => 'Button URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#mieszkania',
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_statistics',
                'label' => 'Hero Statistics',
                'name' => 'hero_statistics',
                'type' => 'repeater',
                'instructions' => 'Statistics displayed in the hero section',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
                'default_value' => array(
                    array(
                        'number' => '06.2026',
                        'label' => 'Planowane<br>zakończenie'
                    ),
                    array(
                        'number' => '14',
                        'label' => 'Liczba<br>budynków'
                    ),
                    array(
                        'number' => '28',
                        'label' => 'Ilość<br>mieszkań'
                    ),
                    array(
                        'number' => '35-49m²',
                        'label' => 'Dostene<br>metraże'
                    ),
                    array(
                        'number' => '40',
                        'label' => 'Miejsca<br>parkingowe'
                    ),
                    array(
                        'number' => '9',
                        'label' => 'Liczba<br>ogóodków'
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_background',
                'label' => 'Hero Background Image',
                'name' => 'hero_background',
                'type' => 'image',
                'instructions' => 'Background image for the hero section',
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

    // 2. ABOUT INVESTMENT SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_about_investment',
        'title' => 'About Investment Section',
        'fields' => array(
            array(
                'key' => 'field_about_title',
                'label' => 'Section Title',
                'name' => 'about_title',
                'type' => 'text',
                'instructions' => 'Title for the about investment section',
                'default_value' => 'O inwestycji',
                'required' => 1,
            ),
            array(
                'key' => 'field_about_subtitle',
                'label' => 'Section Subtitle',
                'name' => 'about_subtitle',
                'type' => 'text',
                'instructions' => 'Subtitle for the about investment section',
                'default_value' => 'Inwestycja w przyszłość<br>Twojej rodziny.',
                'required' => 1,
            ),
            array(
                'key' => 'field_about_content',
                'label' => 'About Content',
                'name' => 'about_content',
                'type' => 'wysiwyg',
                'instructions' => 'Main content for the about investment section',
                'default_value' => 'Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca, zaledwie kilka minut od centrum. Osiedle składa się z 14 domów w zabudowie bliźniaczej – łącznie 28 mieszkań. To idealna propozycja dla osób ceniących komfort, prywatność i dogodną lokalizację.<br><br>W ofercie znajdują się mieszkania na parterze z prywatnymi ogródkami oraz lokale na piętrze z przestronnymi balkonami. Każde z mieszkań zostało zaprojektowane z myślą o wygodzie mieszkańców – nowoczesny układ, funkcjonalne rozwiązania i wysoki standard wykończenia gwarantują komfort codziennego życia.<br><br>Osiedle znajduje się w cichej, zielonej okolicy, a jednocześnie blisko szkół, sklepów, parku i innych udogodnień. Doskonała komunikacja zapewnia szybki dojazd do centrum oraz innych dzielnic miasta. To alternatywa dla zatłoczonych blokowisk – mniejsza liczba mieszkańców, brak wysokiej zabudowy i spokojna atmosfera sprzyjają relaksowi i budowaniu dobrych relacji sąsiedzkich.',
                'required' => 1,
            ),
            array(
                'key' => 'field_about_button',
                'label' => 'About Button',
                'name' => 'about_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_button_text',
                        'label' => 'Button Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Zobacz mieszkania',
                    ),
                    array(
                        'key' => 'field_about_button_url',
                        'label' => 'Button URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#mieszkania',
                    ),
                ),
            ),
            array(
                'key' => 'field_about_image',
                'label' => 'About Image',
                'name' => 'about_image',
                'type' => 'image',
                'instructions' => 'Image for the about investment section',
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

    // 3. BENEFITS SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_benefits_section',
        'title' => 'Benefits Section',
        'fields' => array(
            array(
                'key' => 'field_benefits_title',
                'label' => 'Benefits Title',
                'name' => 'benefits_title',
                'type' => 'text',
                'instructions' => 'Title for the benefits section',
                'default_value' => 'Korzyściach<br>z wyboru tych mieszkań',
                'required' => 1,
            ),
            array(
                'key' => 'field_benefits_list',
                'label' => 'Benefits List',
                'name' => 'benefits_list',
                'type' => 'repeater',
                'instructions' => 'List of benefits with icons',
                'sub_fields' => array(
                    array(
                        'key' => 'field_benefit_icon',
                        'label' => 'Benefit Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_benefit_text',
                        'label' => 'Benefit Text',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                ),
                'default_value' => array(
                    array('text' => 'Ogrzewanie<br>podłogowe'),
                    array('text' => 'Miejsca<br>postojowe'),
                    array('text' => 'Bezpieczna<br>okolica'),
                    array('text' => 'Własne<br>ogródki'),
                    array('text' => 'Okna<br>tarasowe'),
                    array('text' => 'Zamykane<br>kameralne osiedle'),
                    array('text' => 'Okna<br>trzyszybowe'),
                    array('text' => 'Mieszkania<br>bezczynszowe'),
                ),
            ),
            array(
                'key' => 'field_benefits_description',
                'label' => 'Benefits Description',
                'name' => 'benefits_description',
                'type' => 'text',
                'instructions' => 'Description text below benefits',
                'default_value' => 'Czasy dojazdu do Katowic, Jaworzna, Dąbrowy Górniczej czy centrum Sosnowca',
            ),
            array(
                'key' => 'field_benefits_button',
                'label' => 'Benefits Button',
                'name' => 'benefits_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_benefits_button_text',
                        'label' => 'Button Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Zobacz mieszkania',
                    ),
                    array(
                        'key' => 'field_benefits_button_url',
                        'label' => 'Button URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#mieszkania',
                    ),
                ),
            ),
            array(
                'key' => 'field_benefits_image',
                'label' => 'Benefits Image',
                'name' => 'benefits_image',
                'type' => 'image',
                'instructions' => 'Image for the benefits section',
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

    // 4. LOCATION SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_location_section',
        'title' => 'Location Section',
        'fields' => array(
            array(
                'key' => 'field_location_title',
                'label' => 'Location Title',
                'name' => 'location_title',
                'type' => 'text',
                'instructions' => 'Title for the location section',
                'default_value' => 'Lokalizacja',
                'required' => 1,
            ),
            array(
                'key' => 'field_location_description',
                'label' => 'Location Description',
                'name' => 'location_description',
                'type' => 'wysiwyg',
                'instructions' => 'Description for the location section',
                'default_value' => '<strong>Green House Tuwima </strong>łączy bliskość natury z komfortem miejskiego życia.W otoczeniu inwestycji znajdują się liczne tereny zielone, a jednocześnie możesz cieszyć<br>się szybkim dojazdem do centrum oraz wygodnym dostępem do szkół, sklepów i usług.',
                'required' => 1,
            ),
            array(
                'key' => 'field_location_amenities',
                'label' => 'Location Amenities',
                'name' => 'location_amenities',
                'type' => 'repeater',
                'instructions' => 'List of nearby amenities',
                'sub_fields' => array(
                    array(
                        'key' => 'field_amenity_icon',
                        'label' => 'Amenity Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_amenity_time',
                        'label' => 'Time/Distance',
                        'name' => 'time',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_amenity_name',
                        'label' => 'Amenity Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                ),
                'default_value' => array(
                    array('time' => '5 min', 'name' => 'szkoła podstawowa'),
                    array('time' => '3 min', 'name' => 'Supermarkety'),
                    array('time' => '5 min', 'name' => 'Przystanek autobusowy'),
                    array('time' => '5 min', 'name' => 'Park'),
                    array('time' => '3 min', 'name' => 'Przedszkole publiczne'),
                    array('time' => '2 min', 'name' => 'Basen'),
                ),
            ),
            array(
                'key' => 'field_location_button',
                'label' => 'Location Button',
                'name' => 'location_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_location_button_text',
                        'label' => 'Button Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Zobacz mieszkania',
                    ),
                    array(
                        'key' => 'field_location_button_url',
                        'label' => 'Button URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#mieszkania',
                    ),
                ),
            ),
            array(
                'key' => 'field_location_map',
                'label' => 'Location Map Image',
                'name' => 'location_map',
                'type' => 'image',
                'instructions' => 'Map image for the location section',
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

    // 5. APARTMENTS SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_apartments_section',
        'title' => 'Apartments Section',
        'fields' => array(
            array(
                'key' => 'field_apartments_title',
                'label' => 'Apartments Title',
                'name' => 'apartments_title',
                'type' => 'text',
                'instructions' => 'Title for the apartments section',
                'default_value' => 'Wybierz swoje mieszkanie',
                'required' => 1,
            ),
            array(
                'key' => 'field_apartments_description',
                'label' => 'Apartments Description',
                'name' => 'apartments_description',
                'type' => 'wysiwyg',
                'instructions' => 'Description for the apartments section',
                'default_value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a Lorem Ipsum is simply dummy text of the printing and <br><br>typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a',
                'required' => 1,
            ),
            array(
                'key' => 'field_apartments_selector',
                'label' => 'Apartment Selector Image',
                'name' => 'apartments_selector',
                'type' => 'image',
                'instructions' => 'Interactive apartment selector image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_apartments_table',
                'label' => 'Apartments Table',
                'name' => 'apartments_table',
                'type' => 'repeater',
                'instructions' => 'List of available apartments',
                'sub_fields' => array(
                    array(
                        'key' => 'field_apartment_number',
                        'label' => 'Apartment Number',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_apartment_rooms',
                        'label' => 'Number of Rooms',
                        'name' => 'rooms',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_apartment_area',
                        'label' => 'Apartment Area (m²)',
                        'name' => 'area',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_apartment_garden',
                        'label' => 'Garden Area (m²)',
                        'name' => 'garden_area',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_apartment_status',
                        'label' => 'Status',
                        'name' => 'status',
                        'type' => 'select',
                        'choices' => array(
                            'available' => 'Dostępne',
                            'reserved' => 'Zarezerwowane',
                        ),
                    ),
                    array(
                        'key' => 'field_apartment_price',
                        'label' => 'Price/Action',
                        'name' => 'price_action',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_apartment_plan',
                        'label' => 'Plan Link',
                        'name' => 'plan_link',
                        'type' => 'url',
                    ),
                ),
                'default_value' => array(
                    array(
                        'number' => 'A 1.1',
                        'rooms' => 4,
                        'area' => 55,
                        'garden_area' => 245,
                        'status' => 'available',
                        'price_action' => 'Zapytaj o cenę',
                    ),
                ),
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

    // 6. CONTACT SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_contact_section',
        'title' => 'Contact Section',
        'fields' => array(
            array(
                'key' => 'field_contact_title',
                'label' => 'Contact Title',
                'name' => 'contact_title',
                'type' => 'text',
                'instructions' => 'Title for the contact section',
                'default_value' => 'Siedziba główna BUDRAISE INVEST',
                'required' => 1,
            ),
            array(
                'key' => 'field_contact_company_logo',
                'label' => 'Company Logo',
                'name' => 'contact_company_logo',
                'type' => 'image',
                'instructions' => 'Company logo for contact section',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_contact_info',
                'label' => 'Contact Information',
                'name' => 'contact_info',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_contact_address',
                        'label' => 'Address',
                        'name' => 'address',
                        'type' => 'textarea',
                        'default_value' => 'ul. Wrocławska 54<br>40-217 Katowice',
                    ),
                    array(
                        'key' => 'field_contact_email',
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'default_value' => 'biuro@budraise.pl',
                    ),
                    array(
                        'key' => 'field_contact_company_details',
                        'label' => 'Company Details',
                        'name' => 'company_details',
                        'type' => 'textarea',
                        'default_value' => 'Krs: 0000912878<br>Nip: 6431775795<br>Regon: 389511621',
                    ),
                ),
            ),
            array(
                'key' => 'field_contact_agents',
                'label' => 'Contact Agents',
                'name' => 'contact_agents',
                'type' => 'repeater',
                'instructions' => 'List of contact agents',
                'sub_fields' => array(
                    array(
                        'key' => 'field_agent_photo',
                        'label' => 'Agent Photo',
                        'name' => 'photo',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_agent_name',
                        'label' => 'Agent Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_agent_phone',
                        'label' => 'Agent Phone',
                        'name' => 'phone',
                        'type' => 'text',
                    ),
                ),
                'default_value' => array(
                    array('name' => 'Rafał Banarski', 'phone' => '572 481 313'),
                    array('name' => 'Mariusz Szyda', 'phone' => '453 287 744'),
                ),
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

    // 7. FINANCING SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_financing_section',
        'title' => 'Financing Section',
        'fields' => array(
            array(
                'key' => 'field_financing_title',
                'label' => 'Financing Title',
                'name' => 'financing_title',
                'type' => 'text',
                'instructions' => 'Title for the financing section',
                'default_value' => 'Finansowanie',
                'required' => 1,
            ),
            array(
                'key' => 'field_financing_partner_logo',
                'label' => 'Financing Partner Logo',
                'name' => 'financing_partner_logo',
                'type' => 'image',
                'instructions' => 'Logo of the financing partner',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_financing_content',
                'label' => 'Financing Content',
                'name' => 'financing_content',
                'type' => 'wysiwyg',
                'instructions' => 'Content for the financing section',
                'default_value' => 'Proces zakupu domu może wydawać się bardzo skomplikowany, ale możecie Państwo liczyć na naszą pomoc. Oferujemy pełne wsparcie przy pozyskaniu kredytu hipotecznego, który pozwoli Wam na wprowadzenie się do nowego domu.<br><br>Wybór odpowiedniego finansowania nieruchomości jest równie ważny co wybór samego domu. Posiadamy wiedzę oraz doświadczenie kredytowe, które pozwoli na szybkie znalezienie dla Państwa najkorzystniejszego rozwiązania kredytowego.<br><br>Dodatkowo współpracujemy z dedykowanym biurem doradztwa kredytowego Silesia Capital – Eksperci Kredytowi, w którym to zespół doświadczonych Doradców Kredytowych chętnie udzieli odpowiedzi na Państwa pytania.',
                'required' => 1,
            ),
            array(
                'key' => 'field_financing_button',
                'label' => 'Financing Button',
                'name' => 'financing_button',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_financing_button_text',
                        'label' => 'Button Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Skontaktuj się',
                    ),
                    array(
                        'key' => 'field_financing_button_url',
                        'label' => 'Button URL',
                        'name' => 'url',
                        'type' => 'url',
                        'default_value' => '#kontakt',
                    ),
                ),
            ),
            array(
                'key' => 'field_financing_image',
                'label' => 'Financing Image',
                'name' => 'financing_image',
                'type' => 'image',
                'instructions' => 'Image for the financing section',
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

    // 8. ABOUT DEVELOPER SECTION FIELD GROUP
    acf_add_local_field_group(array(
        'key' => 'group_about_developer',
        'title' => 'About Developer Section',
        'fields' => array(
            array(
                'key' => 'field_developer_title',
                'label' => 'Developer Title',
                'name' => 'developer_title',
                'type' => 'text',
                'instructions' => 'Title for the about developer section',
                'default_value' => 'O developerze',
                'required' => 1,
            ),
            array(
                'key' => 'field_developer_content',
                'label' => 'Developer Content',
                'name' => 'developer_content',
                'type' => 'wysiwyg',
                'instructions' => 'Content for the about developer section',
                'default_value' => 'Tworzymy nieruchomości, które spełniają oczekiwania wymagających klientów. Stawiamy na jakość naszych realizacji. Współpracujemy z doświadczonym biurem projektowym dzięki czemu nasze nieruchomości są nowoczesne i praktyczne. <br><br>Realizację projektów powierzamy firmom budowlanym o ugruntowanej pozycji na rynku. Misją naszej firmy jest to, aby oddawać w ręce naszych klientów nieruchomości, które dają znaczący komfort życia codziennego.',
                'required' => 1,
            ),
            array(
                'key' => 'field_developer_image',
                'label' => 'Developer Image',
                'name' => 'developer_image',
                'type' => 'image',
                'instructions' => 'Image for the about developer section',
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

    // 9. NAVIGATION SETTINGS FIELD GROUP (Options Page)
    acf_add_local_field_group(array(
        'key' => 'group_navigation_settings',
        'title' => 'Navigation Settings',
        'fields' => array(
            array(
                'key' => 'field_logo_primary',
                'label' => 'Primary Logo',
                'name' => 'logo_primary',
                'type' => 'image',
                'instructions' => 'Main logo for the header',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_logo_secondary',
                'label' => 'Secondary Logo',
                'name' => 'logo_secondary',
                'type' => 'image',
                'instructions' => 'Secondary logo (Tuwima)',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_contact_phone_1',
                'label' => 'Contact Phone 1',
                'name' => 'contact_phone_1',
                'type' => 'text',
                'default_value' => '453 287 744',
            ),
            array(
                'key' => 'field_contact_name_1',
                'label' => 'Contact Name 1',
                'name' => 'contact_name_1',
                'type' => 'text',
                'default_value' => 'Mariusz Szyda',
            ),
            array(
                'key' => 'field_contact_phone_2',
                'label' => 'Contact Phone 2',
                'name' => 'contact_phone_2',
                'type' => 'text',
                'default_value' => '572 481 313',
            ),
            array(
                'key' => 'field_contact_name_2',
                'label' => 'Contact Name 2',
                'name' => 'contact_name_2',
                'type' => 'text',
                'default_value' => 'Rafał Banarski',
            ),
            array(
                'key' => 'field_navigation_menu',
                'label' => 'Navigation Menu Items',
                'name' => 'navigation_menu',
                'type' => 'repeater',
                'instructions' => 'Main navigation menu items',
                'sub_fields' => array(
                    array(
                        'key' => 'field_menu_item_text',
                        'label' => 'Menu Item Text',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_menu_item_url',
                        'label' => 'Menu Item URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
                'default_value' => array(
                    array('text' => 'O inwestycji', 'url' => '#o-inwestycji'),
                    array('text' => 'Lokalizacja', 'url' => '#lokalizacja'),
                    array('text' => 'Mieszkania', 'url' => '#mieszkania'),
                    array('text' => 'Galeria', 'url' => '#galeria'),
                    array('text' => 'Finansowanie', 'url' => '#finansowanie'),
                    array('text' => 'kontakt', 'url' => '#kontakt'),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));
}

// Hook the function to ACF init
add_action('acf/init', 'future_register_acf_field_groups');

/**
 * Add Options Page for Theme Settings
 */
function future_add_options_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
        ));
    }
}
add_action('acf/init', 'future_add_options_page');
