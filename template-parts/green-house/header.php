<?php
/**
 * Template part for Green House header section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Custom Navigation Walker for Green House theme
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
?>

<header class="heder ">
    <div class="baner">
        <div class="warstwa-47-holder">
            <div class="heder-2">
                <div class="row-5 group navigation-header">
                    <div class="col-14">
                        <div class="logo">
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            if ($custom_logo_id) {
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                echo '<img class="warstwa-0-kopia-2" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" width="48" height="52">';
                            } else {
                                echo '<img class="warstwa-0-kopia-2" src="' . green_house_image_url('warstwa_0_kopia_2.png') . '" alt="' . get_bloginfo('name') . '" width="48" height="52">';
                            }
                            ?>
                        </div>
                        <p class="text"><?php echo get_bloginfo('name') ?: 'Green House'; ?></p>
                        <img class="tuwima" src="<?php echo green_house_image_url('tuwima.png'); ?>" alt="tuwima" width="118" height="20" title="tuwima">
                    </div>
                    <div class="col-31">
                        <div class="wrapper-25">
                            <div class="layer"></div>
                            <div class="layer-holder">napisz do nas</div>
                            <img class="warstwa-3" src="<?php echo green_house_image_url('warstwa_3.jpg'); ?>" alt="" width="1632" height="51">
                            <img class="layer-2" src="<?php echo green_house_image_url('666162.png'); ?>" alt="" width="18" height="14">
                            <p class="text-3"><a href="tel:<?php echo get_field('contact_phone_1') ?: '453287744'; ?>"><?php echo get_field('contact_phone_1') ?: '453 287 744'; ?></a></p>
                            <p class="text-4"><?php echo get_field('contact_name_1') ?: 'Mariusz Szyda'; ?></p>
                            <p class="text-5"><a href="tel:<?php echo get_field('contact_phone_2') ?: '572481313'; ?>"><?php echo get_field('contact_phone_2') ?: '572 481 313'; ?></a></p>
                            <p class="text-6"><?php echo get_field('contact_name_2') ?: 'Rafał Banarski'; ?></p>
                            <img class="warstwa-50" src="<?php echo green_house_image_url('warstwa_50.png'); ?>" alt="" width="41" height="41">
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
                                    echo '<li><p class="nav-item-1-2 text-item selected"><a href="#o-inwestycji">O inwestycji</a></p></li>';
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
                        <div class="warstwa-46"></div>
                    </div>
                </div>
                <div class="baner-2 group">
                    <p class="text-7"><?php echo get_field('hero_title') ?: 'Green House<br class="text-style"><strong class="text-style-2">tuwima</strong>'; ?></p>
                    <p class="text-8"><?php echo get_field('hero_subtitle') ?: 'Najlepsza inwestycja w Twoją przyszłosć'; ?></p>
                </div>
                <button class="grupa-8" onclick="window.location.href='<?php echo esc_url(get_field('hero_button')['url'] ?? '#mieszkania'); ?>'" aria-label="<?php echo esc_attr(get_field('hero_button')['text'] ?? 'Zobacz mieszkania'); ?> - <?php echo esc_attr(get_field('hero_title') ?: 'Green House'); ?>">
                    <?php echo esc_html(get_field('hero_button')['text'] ?? 'Zobacz mieszkania'); ?>
                </button>
                <div class="grupa-7 group">
                    <p class="text-10"><strong class="text-style-4"><?php echo get_field('stat_1_number') ?: '06.2026'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_1_label') ?: 'Planowane<br>zakończenie'; ?></p>
                    <div class="warstwa-48"></div>
                    <p class="text-11"><strong class="text-style-4"><?php echo get_field('stat_2_number') ?: '14'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_2_label') ?: 'Liczba<br>budynków'; ?></p>
                    <div class="warstwa-48-kopia"></div>
                    <p class="text-12"><span class="text-style-6"><?php echo get_field('stat_3_number') ?: '28'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_3_label') ?: 'Ilość<br>mieszkań'; ?></p>
                    <div class="warstwa-48-kopia-2"></div>
                    <p class="text-13"><span class="text-style-6"><?php echo get_field('stat_4_number') ?: '35-49m²'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_4_label') ?: 'Dostene<br>metraże'; ?></p>
                    <div class="warstwa-48-kopia-3"></div>
                    <p class="text-14"><span class="text-style-6"><?php echo get_field('stat_5_number') ?: '40'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_5_label') ?: 'Miejsca<br>parkingowe'; ?></p>
                    <div class="warstwa-48-kopia-4"></div>
                    <p class="text-15"><span class="text-style-6"><?php echo get_field('stat_6_number') ?: '9'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_6_label') ?: 'Liczba<br>ogóodków'; ?></p>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const targetPosition = target.offsetTop - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Active navigation highlighting
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-list-2 a[href^="#"]');

    function highlightNavigation() {
        let current = '';
        sections.forEach(function(section) {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(function(link) {
            link.parentElement.parentElement.classList.remove('selected');
            if (link.getAttribute('href') === '#' + current) {
                link.parentElement.parentElement.classList.add('selected');
            }
        });
    }

    window.addEventListener('scroll', highlightNavigation);
    highlightNavigation(); // Call once on load
});
</script>

