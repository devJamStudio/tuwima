<?php
/**
 * Template part for Green House navigation bar
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Custom Navigation Walker for Green House theme
if (!class_exists('Custom_Nav_Walker')) {
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        // Get the nav item class based on menu position
        $nav_item_class = $this->get_nav_item_class($item->ID, $item->menu_order);

        $output .= $indent . '<li' . $id . $class_names .'>';
        $output .= '<p class="' . $nav_item_class . ' text-item">';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        $output .= '</p>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }

    private function get_nav_item_class($item_id, $menu_order) {
        $nav_classes = array(
            1 => 'nav-item-1-2',
            2 => 'nav-item-3',
            3 => 'nav-item-3-2',
            4 => 'nav-item-3-3',
            5 => 'nav-item-3-4',
            6 => 'nav-item-3-5'
        );

        return isset($nav_classes[$menu_order]) ? $nav_classes[$menu_order] : 'nav-item-default';
    }
}
}
?>

<div class="row-5 group">
    <div class="col-14">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" style="text-decoration: none; color: inherit; display: block;">
            <div class="logo">
                <?php
                echo '<img class="warstwa-0-kopia-2" src="' . get_template_directory_uri() . '/images/logo.png" alt="' . get_bloginfo('name') . '" width="48" height="52" style="width: 48px; height: 52px; object-fit: contain;">';
                ?>
            </div>
            <p class="text"><?php echo get_bloginfo('name') ?: 'Green House'; ?></p>
            <img class="tuwima" src="<?php echo green_house_image_url('tuwima.png'); ?>" alt="tuwima" width="118" height="20" title="tuwima">
        </a>
    </div>
    <div class="col-31">
        <!-- Top Row: Contact Info and Button -->
        <div class="top-row">
            <a href="mailto:biuro@budraise.pl" class="contact-button" type="button">
                <img class="button-icon" src="<?php echo green_house_image_url('666162.png'); ?>" alt="" width="18" height="14">
                <span class="button-text">napisz do nas</span>
            </a>

            <!-- Contact Person 1 -->
            <div class="contact-person">
                <img class="contact-image" src="<?php echo green_house_image_url('warstwa_50.png'); ?>" alt="" width="41" height="41">
                <div class="contact-details">
                    <p class="contact-name"><?php echo get_field('contact_name_1') ?: 'Mariusz Szyda'; ?></p>
                    <p class="contact-phone"><a href="tel:<?php echo get_field('contact_phone_1') ?: '453287744'; ?>"><?php echo get_field('contact_phone_1') ?: '453 287 744'; ?></a></p>
                </div>
            </div>

            <!-- Contact Person 2 -->
            <div class="contact-person">
                <img class="contact-image" src="<?php echo green_house_image_url('warstwa_50.png'); ?>" alt="" width="41" height="41">
                <div class="contact-details">
                    <p class="contact-name"><?php echo get_field('contact_name_2') ?: 'Rafał Banarski'; ?></p>
                    <p class="contact-phone"><a href="tel:<?php echo get_field('contact_phone_2') ?: '572481313'; ?>"><?php echo get_field('contact_phone_2') ?: '572 481 313'; ?></a></p>
                </div>
            </div>
        </div>

        <!-- Bottom Row: Navigation -->
        <div class="bottom-row">
            <nav class="nav-2">
                <?php
                // Check if we have a custom menu
                if (has_nav_menu('menu-1')) {
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_class' => 'nav-list-2 group',
                        'container' => false,
                        'fallback_cb' => false,
                        'walker' => new Custom_Nav_Walker()
                    ));
                } else {
                    // Fallback menu
                    echo '<ul class="nav-list-2 group">';
                    echo '<li><p class="nav-item-1-2 text-item"><a href="#o-inwestycji">O inwestycji</a></p></li>';
                    echo '<li><p class="nav-item-3 text-item"><a href="#lokalizacja">Lokalizacja</a></p></li>';
                    echo '<li><p class="nav-item-3-2 text-item"><a href="#mieszkania">Mieszkania</a></p></li>';
                    echo '<li><p class="nav-item-3-3 text-item"><a href="#galeria">Galeria</a></p></li>';
                    echo '<li><p class="nav-item-3-4 text-item"><a href="#finansowanie">Finansowanie</a></p></li>';
                    echo '<li><p class="nav-item-3-5 text-item"><a href="#kontakt">kontakt</a></p></li>';
                    echo '</ul>';
                }
                ?>
            </nav>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-menu-toggle" type="button" aria-label="Toggle mobile menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="nav-overlay"></div>
