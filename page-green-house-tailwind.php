<?php
/**
 * Template Name: Green House Tuwima (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Don't load WordPress header/footer
?>
<!doctype html>
<html lang="pl">
<head>
    <title><?php echo get_field('page_title') ?: 'Green House Tuwima - Najlepsza inwestycja w Twoją przyszłość'; ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo get_field('page_description') ?: 'Green House Tuwima - nowoczesna inwestycja mieszkaniowa w Sosnowcu. Mieszkania z ogródkami i balkonami.'; ?>">
    <meta name="keywords" content="<?php echo get_field('page_keywords') ?: 'mieszkania Sosnowiec, inwestycja mieszkaniowa, Green House Tuwima'; ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (from Vite) -->
    <?php
    // Check if we're in development mode (Vite dev server running)
    $is_development = defined('WP_DEBUG') && WP_DEBUG && future_is_vite_dev_server_running();

    if ($is_development) {
        // Development mode - load from Vite dev server
        ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/src/main.js"></script>
        <?php
    } else {
        // Production mode - load built files
        $css_file = get_template_directory() . '/dist/css/main.css';
        if (file_exists($css_file)) {
            ?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/main.css?v=<?php echo filemtime($css_file); ?>">
            <?php
        }
    }
    ?>

    <!-- jQuery and Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="leading-none text-black bg-white min-w-[1882px]" style="font-family: Lato, sans-serif; font-size: 16px;">

<div class="global_container_ float-none mx-auto relative w-full bg-white bg-center bg-cover" style="background-position: center top;">
    <?php get_template_part('template-parts/green-house-tailwind/header'); ?>

    <div class="main-content-wrapper mx-auto relative w-[1882px] px-[83px]" style="margin: 159px auto 0;">
        <?php get_template_part('template-parts/green-house-tailwind/about'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/benefits'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/layout'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/garden'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/location'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/apartments'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/apartments-table'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/gallery'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/financing'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/developer'); ?>
        <?php get_template_part('template-parts/green-house-tailwind/contact'); ?>
    </div>

    <?php get_template_part('template-parts/green-house-tailwind/footer'); ?>
</div>

<script>
// Modern JavaScript for interactions
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Apartment selector
    const apartmentDots = document.querySelectorAll('[data-apartment]');
    const apartmentInfo = document.querySelector('[data-apartment-info]');

    apartmentDots.forEach(dot => {
        dot.addEventListener('click', () => {
            // Remove active state from all dots
            apartmentDots.forEach(d => d.classList.remove('bg-green-600', 'scale-125'));
            apartmentDots.forEach(d => d.classList.add('bg-green-500'));

            // Add active state to clicked dot
            dot.classList.remove('bg-green-500');
            dot.classList.add('bg-green-600', 'scale-125');

            // Update apartment info
            const apartmentData = JSON.parse(dot.dataset.apartment);
            if (apartmentInfo && apartmentData) {
                apartmentInfo.innerHTML = `
                    <div class="bg-white rounded-lg shadow-lg p-4 max-w-xs">
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-bold text-gray-800">${apartmentData.number}</span>
                            <span class="text-xs px-2 py-1 rounded ${apartmentData.available ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800'}">
                                ${apartmentData.available ? 'Dostępne' : 'Zarezerwowane'}
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-sm text-center">
                            <div class="bg-gray-100 rounded p-2">
                                <div class="font-semibold">${apartmentData.rooms}</div>
                                <div class="text-xs text-gray-600">pokoje</div>
                            </div>
                            <div class="bg-gray-100 rounded p-2">
                                <div class="font-semibold">${apartmentData.area}m²</div>
                                <div class="text-xs text-gray-600">powierzchnia</div>
                            </div>
                            <div class="bg-gray-100 rounded p-2">
                                <div class="font-semibold">${apartmentData.garden}m²</div>
                                <div class="text-xs text-gray-600">ogródek</div>
                            </div>
                        </div>
                    </div>
                `;
            }
        });
    });
});
</script>

</body>
</html>

