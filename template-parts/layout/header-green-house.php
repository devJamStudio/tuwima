<?php
/**
 * Header for Green House Tuwima
 *
 * @package Future
 */

// Get navigation settings from options
$logo_primary = get_field('logo_primary', 'option');
$logo_secondary = get_field('logo_secondary', 'option');
$contact_phone_1 = get_field('contact_phone_1', 'option') ?: '453 287 744';
$contact_name_1 = get_field('contact_name_1', 'option') ?: 'Mariusz Szyda';
$contact_phone_2 = get_field('contact_phone_2', 'option') ?: '572 481 313';
$contact_name_2 = get_field('contact_name_2', 'option') ?: 'Rafał Banarski';
$navigation_menu = get_field('navigation_menu', 'option');
?>

<header class="relative bg-white shadow-lg z-50">
    <div class="container-custom">
        <div class="flex items-center justify-between py-4">
            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <?php
                // Check for WordPress custom logo first
                if (has_custom_logo()):
                    the_custom_logo();
                elseif ($logo_primary): ?>
                    <img src="<?php echo esc_url($logo_primary['url']); ?>"
                         alt="<?php echo esc_attr($logo_primary['alt']); ?>"
                         class="h-12 w-auto">
                <?php else: ?>
                    <!-- Default logo from design -->
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2.png"
                         alt="Green House Logo"
                         class="h-12 w-auto">
                <?php endif; ?>

                <div class="text-center">
                    <p class="text-primary-500 font-montserrat font-bold text-xs uppercase tracking-widest">Green House</p>
                    <?php if ($logo_secondary): ?>
                        <img src="<?php echo esc_url($logo_secondary['url']); ?>"
                             alt="<?php echo esc_attr($logo_secondary['alt']); ?>"
                             class="h-5 w-auto mt-1">
                    <?php else: ?>
                        <!-- Default Tuwima logo from design -->
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/tuwima.png"
                             alt="Tuwima"
                             class="h-5 w-auto mt-1">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="hidden lg:flex items-center space-x-8">
                <div class="text-center">
                    <p class="text-sm font-bold text-gray-900"><?php echo esc_html($contact_name_1); ?></p>
                    <p class="text-primary-500 font-bold text-lg"><?php echo esc_html($contact_phone_1); ?></p>
                </div>
                <div class="text-center">
                    <p class="text-sm font-bold text-gray-900"><?php echo esc_html($contact_name_2); ?></p>
                    <p class="text-primary-500 font-bold text-lg"><?php echo esc_html($contact_phone_2); ?></p>
                </div>
                <button class="btn-primary text-sm px-6 py-2">
                    napisz do nas
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2" id="mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <?php if ($navigation_menu): ?>
        <nav class="hidden lg:block border-t border-gray-200 py-4">
            <ul class="flex space-x-12">
                <?php foreach ($navigation_menu as $menu_item): ?>
                    <li>
                        <a href="<?php echo esc_url($menu_item['url']); ?>"
                           class="text-gray-900 font-bold text-lg uppercase tracking-wide hover:text-primary-500 transition-colors">
                            <?php echo esc_html($menu_item['text']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="lg:hidden fixed inset-0 bg-white z-50 transform -translate-x-full transition-transform duration-300">
    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <?php if ($logo_primary): ?>
                    <img src="<?php echo esc_url($logo_primary['url']); ?>"
                         alt="<?php echo esc_attr($logo_primary['alt']); ?>"
                         class="h-10 w-auto">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2.png"
                         alt="Green House Logo"
                         class="h-10 w-auto">
                <?php endif; ?>
                <div>
                    <p class="text-primary-500 font-montserrat font-bold text-xs uppercase tracking-widest">Green House</p>
                    <?php if ($logo_secondary): ?>
                        <img src="<?php echo esc_url($logo_secondary['url']); ?>"
                             alt="<?php echo esc_attr($logo_secondary['alt']); ?>"
                             class="h-4 w-auto mt-1">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/tuwima.png"
                             alt="Tuwima"
                             class="h-4 w-auto mt-1">
                    <?php endif; ?>
                </div>
            </div>
            <button id="mobile-menu-close" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <?php if ($navigation_menu): ?>
        <nav class="mb-8">
            <ul class="space-y-4">
                <?php foreach ($navigation_menu as $menu_item): ?>
                    <li>
                        <a href="<?php echo esc_url($menu_item['url']); ?>"
                           class="block text-gray-900 font-bold text-lg uppercase tracking-wide py-2">
                            <?php echo esc_html($menu_item['text']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php endif; ?>

        <!-- Mobile Contact Info -->
        <div class="space-y-4">
            <div class="text-center">
                <p class="text-sm font-bold text-gray-900"><?php echo esc_html($contact_name_1); ?></p>
                <p class="text-primary-500 font-bold text-lg"><?php echo esc_html($contact_phone_1); ?></p>
            </div>
            <div class="text-center">
                <p class="text-sm font-bold text-gray-900"><?php echo esc_html($contact_name_2); ?></p>
                <p class="text-primary-500 font-bold text-lg"><?php echo esc_html($contact_phone_2); ?></p>
            </div>
            <button class="btn-primary w-full">
                napisz do nas
            </button>
        </div>
    </div>
</div>

<script>
// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    if (mobileMenuButton && mobileMenu && mobileMenuClose) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('-translate-x-full');
        });

        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.add('-translate-x-full');
        });
    }
});
</script>
