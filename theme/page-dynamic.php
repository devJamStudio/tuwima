9<?php

/*
 * Template Name: Dynamic Loader
 * Description: A flexible loader for custom templates.
 */
get_header();


$template = get_post_meta(get_the_ID(), '_wp_page_template', true);

// Use a switch statement or if-else logic to handle each template
switch ($template) {
    case 'page-home.php':
        // Load content specific to the 'Domowa' template
        get_template_part('template-parts/pages/home');
        break;

    case 'page-start-here.php':
        // Load content specific to the 'Zacznij tutaj' template
        get_template_part('partials/start-here-content');
        break;

    case 'page-find-funds.php':
        // Load content specific to the 'Znajdź środki' template
        get_template_part('partials/find-funds-content');
        break;

    case 'page-energy.php':
        // Load content specific to the 'Świadectwa energetyczne' template
        get_template_part('partials/energy-content');
        break;

    case 'page-contact.php':
        // Load content specific to the 'Kontakt' template
        get_template_part('partials/contact-content');
        break;

    default:
        // Fallback to generic content
        the_content();
        break;
}


get_footer();
