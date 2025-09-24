<?php
/**
 * Page Builder Blocks Template Part
 * Renders ACF repeater blocks dynamically
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get page builder blocks
$blocks = get_field('page_builder_blocks');

if (!$blocks || !is_array($blocks)) {
    return;
}

foreach ($blocks as $index => $block) {
    $block_type = $block['block_type'] ?? '';

    // Add AOS animation attributes with fallback
    $aos_attributes = 'data-aos="fade-up" data-aos-delay="' . ($index * 100) . '"';

    switch ($block_type) {
        case 'hero-slider':
            render_hero_slider_block($block, $aos_attributes);
            break;

        case 'text-image-right':
            render_text_image_block($block, 'right', $aos_attributes);
            break;

        case 'text-image-left':
            render_text_image_block($block, 'left', $aos_attributes);
            break;

        case 'benefits':
            render_benefits_block($block, $aos_attributes);
            break;

        case 'location':
            render_location_block($block, $aos_attributes);
            break;

        case 'apartments':
            render_apartments_block($block, $aos_attributes);
            break;

        case 'visualizations':
            render_visualizations_block($block, $aos_attributes);
            break;

        case 'contact':
            render_contact_block($block, $aos_attributes);
            break;
    }
}

/**
 * Render Hero Slider Block
 */
function render_hero_slider_block($block, $aos_attributes) {
    $title = $block['hero_title'] ?? '';
    $subtitle = $block['hero_subtitle'] ?? '';
    $button_text = $block['hero_button_text'] ?? '';
    $button_url = $block['hero_button_url'] ?? '';
    $images = $block['hero_slider_images'] ?? array();

    ?>
    <section class="hero-section" <?php echo $aos_attributes; ?>>
        <div class="hero-slider">
            <?php if (!empty($images)): ?>
                <div class="slider-container">
                    <?php foreach ($images as $image): ?>
                        <div class="slide">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="hero-content">
                <div class="container">
                    <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
                    <p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php if ($button_text && $button_url): ?>
                        <a href="<?php echo esc_url($button_url); ?>" class="hero-button btn btn-primary">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <style>
    .hero-slider {
        position: relative;
        height: 100vh;
        overflow: hidden;
    }

    .slider-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .slide.active {
        opacity: 1;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        z-index: 2;
    }

    .hero-title {
        font-size: 3rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .hero-button {
        padding: 15px 30px;
        font-size: 1.2rem;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        if (slides.length > 0) {
            showSlide(0);
            setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }
    });
    </script>
    <?php
}

/**
 * Render Text + Image Block
 */
function render_text_image_block($block, $image_position, $aos_attributes) {
    $title = $block['text_image_' . $image_position . '_title'] ?? '';
    $content = $block['text_image_' . $image_position . '_content'] ?? '';
    $button_text = $block['text_image_' . $image_position . '_button_text'] ?? '';
    $button_url = $block['text_image_' . $image_position . '_button_url'] ?? '';
    $image = $block['text_image_' . $image_position . '_image'] ?? null;

    $text_class = $image_position === 'right' ? 'col-md-6 order-md-1' : 'col-md-6 order-md-2';
    $image_class = $image_position === 'right' ? 'col-md-6 order-md-2' : 'col-md-6 order-md-1';

    ?>
    <section class="text-image-section" <?php echo $aos_attributes; ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="<?php echo $text_class; ?>">
                    <div class="text-content">
                        <?php if ($title): ?>
                            <h2><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>

                        <?php if ($content): ?>
                            <div class="content">
                                <?php echo wp_kses_post($content); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($button_text && $button_url): ?>
                            <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="<?php echo $image_class; ?>">
                    <?php if ($image): ?>
                        <div class="image-wrapper" data-fancybox="gallery">
                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                 class="img-fluid">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <style>
    .text-image-section {
        padding: 80px 0;
    }

    .text-content h2 {
        margin-bottom: 1.5rem;
        color: #333;
    }

    .text-content .content {
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .image-wrapper img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .image-wrapper:hover img {
        transform: scale(1.05);
    }
    </style>
    <?php
}

/**
 * Render Benefits Block
 */
function render_benefits_block($block, $aos_attributes) {
    $title = $block['benefits_title'] ?? '';
    $content = $block['benefits_content'] ?? '';
    $button_text = $block['benefits_button_text'] ?? '';
    $button_url = $block['benefits_button_url'] ?? '';
    $background_image = $block['benefits_background_image'] ?? null;
    $benefits = $block['benefits_items'] ?? array();

    ?>
    <section class="benefits-section" <?php echo $aos_attributes; ?>>
        <?php if ($background_image): ?>
            <div class="benefits-background">
                <img src="<?php echo esc_url($background_image['url']); ?>"
                     alt="<?php echo esc_attr($background_image['alt']); ?>">
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if ($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if ($content): ?>
                        <div class="content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($button_text && $button_url): ?>
                        <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <?php if (!empty($benefits)): ?>
                        <div class="benefits-grid">
                            <?php foreach ($benefits as $benefit): ?>
                                <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                                    <?php if ($benefit['benefit_icon']): ?>
                                        <div class="benefit-icon">
                                            <img src="<?php echo esc_url($benefit['benefit_icon']['url']); ?>"
                                                 alt="<?php echo esc_attr($benefit['benefit_icon']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <h4><?php echo esc_html($benefit['benefit_title']); ?></h4>
                                    <p><?php echo esc_html($benefit['benefit_description']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <style>
    .benefits-section {
        padding: 80px 0;
        position: relative;
    }

    .benefits-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .benefits-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.1;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .benefit-item {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .benefit-icon {
        margin-bottom: 1rem;
    }

    .benefit-icon img {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }

    .benefit-item h4 {
        margin-bottom: 1rem;
        color: #00a906;
    }
    </style>
    <?php
}

/**
 * Render Location Block
 */
function render_location_block($block, $aos_attributes) {
    $title = $block['location_title'] ?? '';
    $content = $block['location_content'] ?? '';
    $map_embed = $block['location_map_embed'] ?? '';
    $locations = $block['location_items'] ?? array();

    ?>
    <section class="location-section" <?php echo $aos_attributes; ?>>
        <div class="container">
            <?php if ($title): ?>
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($content): ?>
                <div class="section-content">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-6">
                    <?php if ($map_embed): ?>
                        <div class="map-container">
                            <?php echo wp_kses_post($map_embed); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <?php if (!empty($locations)): ?>
                        <div class="location-items">
                            <?php foreach ($locations as $location): ?>
                                <div class="location-item" data-aos="fade-left" data-aos-delay="200">
                                    <?php if ($location['location_icon']): ?>
                                        <div class="location-icon">
                                            <img src="<?php echo esc_url($location['location_icon']['url']); ?>"
                                                 alt="<?php echo esc_attr($location['location_icon']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="location-info">
                                        <h4><?php echo esc_html($location['location_time']); ?></h4>
                                        <p><?php echo esc_html($location['location_name']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <style>
    .location-section {
        padding: 80px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 2rem;
        color: #333;
    }

    .section-content {
        text-align: center;
        margin-bottom: 3rem;
    }

    .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
    }

    .location-items {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .location-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .location-icon img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .location-info h4 {
        margin: 0 0 0.5rem 0;
        color: #00a906;
        font-size: 1.2rem;
    }

    .location-info p {
        margin: 0;
        color: #666;
    }
    </style>
    <?php
}

/**
 * Render Apartments Block
 */
function render_apartments_block($block, $aos_attributes) {
    $title = $block['apartments_title'] ?? '';
    $description = $block['apartments_description'] ?? '';
    $floor_plan = $block['apartments_floor_plan'] ?? null;
    $apartments = $block['apartments_list'] ?? array();

    ?>
    <section class="apartments-section" <?php echo $aos_attributes; ?>>
        <div class="container">
            <?php if ($title): ?>
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <div class="section-content">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

            <!-- Interactive Floor Plan -->
            <div class="interactive-floor-plan" data-aos="fade-up" data-aos-delay="200">
                <div class="floor-plan-container">
                    <!-- Base image with dots (kropki.jpg) -->
                    <img src="<?php echo get_template_directory_uri(); ?>/plansza/kropki.jpg" 
                         alt="Plan piętra z oznaczeniami" 
                         class="floor-plan-image" 
                         id="floor-plan-image">
                    
                    <!-- Hover overlay image (lokale.jpg) - hidden by default -->
                    <img src="<?php echo get_template_directory_uri(); ?>/plansza/lokale.jpg" 
                         alt="Plan piętra - podgląd" 
                         class="floor-plan-hover-image" 
                         id="floor-plan-hover-image">
                    
                    <!-- Interactive dots overlay - positioned over the actual dots in kropki.jpg -->
                    <div class="apartment-dots-overlay">
                        <?php if (!empty($apartments)): ?>
                            <?php 
                            // Define actual dot positions based on kropki.jpg layout
                            $dot_positions = array(
                                array('left' => '25%', 'top' => '35%'),   // Apartment 1
                                array('left' => '45%', 'top' => '35%'),   // Apartment 2
                                array('left' => '65%', 'top' => '35%'),   // Apartment 3
                                array('left' => '25%', 'top' => '55%'),   // Apartment 4
                                array('left' => '45%', 'top' => '55%'),   // Apartment 5
                                array('left' => '65%', 'top' => '55%'),   // Apartment 6
                            );
                            ?>
                            <?php foreach ($apartments as $index => $apartment): ?>
                                <?php 
                                $position = isset($dot_positions[$index]) ? $dot_positions[$index] : $dot_positions[0];
                                ?>
                                <div class="apartment-dot" 
                                     data-apartment="<?php echo esc_attr($apartment['apartment_number']); ?>"
                                     data-rooms="<?php echo esc_attr($apartment['apartment_rooms']); ?>"
                                     data-area="<?php echo esc_attr($apartment['apartment_area']); ?>"
                                     data-garden="<?php echo esc_attr($apartment['apartment_garden']); ?>"
                                     data-status="<?php echo esc_attr($apartment['apartment_status']); ?>"
                                     data-price="<?php echo esc_attr($apartment['apartment_price']); ?>"
                                     data-plan="<?php echo esc_attr($apartment['apartment_plan_url']); ?>"
                                     style="left: <?php echo $position['left']; ?>; top: <?php echo $position['top']; ?>;">
                                    <span class="dot-number"><?php echo esc_html($apartment['apartment_number']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Apartment Details Panel -->
                <div class="apartment-details-panel" id="apartment-details-panel">
                    <div class="panel-header">
                        <h3>Szczegóły mieszkania</h3>
                        <button class="close-panel">&times;</button>
                    </div>
                    <div class="panel-content">
                        <div class="apartment-info">
                            <p><strong>Mieszkanie:</strong> <span id="detail-number">-</span></p>
                            <p><strong>Liczba pokoi:</strong> <span id="detail-rooms">-</span></p>
                            <p><strong>Powierzchnia:</strong> <span id="detail-area">-</span></p>
                            <p><strong>Ogródek:</strong> <span id="detail-garden">-</span></p>
                            <p><strong>Status:</strong> <span id="detail-status">-</span></p>
                            <p><strong>Cena:</strong> <span id="detail-price">-</span></p>
                        </div>
                        <div class="apartment-actions">
                            <button class="btn btn-primary price-inquiry-btn" id="detail-inquiry-btn">
                                Zapytaj o cenę
                            </button>
                            <a href="#" class="btn btn-secondary" id="detail-plan-btn" target="_blank">
                                Zobacz plan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($apartments)): ?>
                <div class="apartments-table-container" data-aos="fade-up" data-aos-delay="400">
                    <h3>Lista wszystkich mieszkań</h3>
                    <table class="apartments-table">
                        <thead>
                            <tr>
                                <th>Numer</th>
                                <th>Pokoje</th>
                                <th>Powierzchnia</th>
                                <th>Ogródek</th>
                                <th>Status</th>
                                <th>Cena</th>
                                <th>Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($apartments as $apartment): ?>
                                <tr>
                                    <td><?php echo esc_html($apartment['apartment_number']); ?></td>
                                    <td><?php echo esc_html($apartment['apartment_rooms']); ?></td>
                                    <td><?php echo esc_html($apartment['apartment_area']); ?> m²</td>
                                    <td><?php echo esc_html($apartment['apartment_garden']); ?> m²</td>
                                    <td>
                                        <span class="status status-<?php echo esc_attr($apartment['apartment_status']); ?>">
                                            <?php
                                            $status_labels = array(
                                                'available' => 'Dostępne',
                                                'reserved' => 'Zarezerwowane',
                                                'sold' => 'Sprzedane'
                                            );
                                            echo $status_labels[$apartment['apartment_status']] ?? $apartment['apartment_status'];
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($apartment['apartment_price'] === 'Zapytaj o cenę'): ?>
                                            <button class="price-inquiry-btn"
                                                    data-apartment="<?php echo esc_attr($apartment['apartment_number']); ?>"
                                                    data-rooms="<?php echo esc_attr($apartment['apartment_rooms']); ?>"
                                                    data-area="<?php echo esc_attr($apartment['apartment_area']); ?>"
                                                    data-garden="<?php echo esc_attr($apartment['apartment_garden']); ?>">
                                                <?php echo esc_html($apartment['apartment_price']); ?>
                                            </button>
                                        <?php else: ?>
                                            <?php echo esc_html($apartment['apartment_price']); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($apartment['apartment_plan_url']): ?>
                                            <a href="<?php echo esc_url($apartment['apartment_plan_url']); ?>"
                                               class="plan-link" target="_blank">Zobacz plan</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <style>
    .apartments-section {
        padding: 80px 0;
    }

    .interactive-floor-plan {
        position: relative;
        margin-bottom: 3rem;
    }

    .floor-plan-container {
        position: relative;
        text-align: center;
        margin-bottom: 2rem;
    }

    .floor-plan-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: opacity 0.3s ease;
    }

    .floor-plan-hover-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 8px;
        pointer-events: none;
    }

    .apartment-dots-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .apartment-dot {
        position: absolute;
        width: 50px;
        height: 50px;
        background: transparent;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        pointer-events: all;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10;
        transform: translate(-50%, -50%);
    }

    .apartment-dot:hover {
        transform: translate(-50%, -50%) scale(1.1);
    }

    .apartment-dot.active {
        transform: translate(-50%, -50%) scale(1.05);
    }

    .dot-number {
        color: white;
        font-weight: bold;
        font-size: 16px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        background: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .apartment-dot:hover .dot-number {
        background: rgba(0, 169, 6, 0.8);
        transform: scale(1.2);
    }

    .apartment-dot.active .dot-number {
        background: rgba(255, 107, 53, 0.8);
    }

    /* Hover effect to show lokale.jpg image */
    .apartment-dot:hover ~ .floor-plan-hover-image,
    .floor-plan-container:hover .floor-plan-hover-image {
        opacity: 1;
    }

    .apartment-dot:hover ~ .floor-plan-image,
    .floor-plan-container:hover .floor-plan-image {
        opacity: 0.3;
    }

    .apartment-details-panel {
        position: fixed;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        width: 350px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .apartment-details-panel.show {
        opacity: 1;
        visibility: visible;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #eee;
        background: #f8f9fa;
        border-radius: 12px 12px 0 0;
    }

    .panel-header h3 {
        margin: 0;
        color: #333;
        font-size: 18px;
    }

    .close-panel {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #999;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .close-panel:hover {
        background: #e9ecef;
        color: #333;
    }

    .panel-content {
        padding: 20px;
    }

    .apartment-info p {
        margin: 10px 0;
        color: #555;
        font-size: 14px;
    }

    .apartment-info strong {
        color: #333;
    }

    .apartment-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        flex-direction: column;
    }

    .apartment-actions .btn {
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
    }

    .apartment-actions .btn-primary {
        background: #00a906;
        color: white;
    }

    .apartment-actions .btn-primary:hover {
        background: #008a05;
    }

    .apartment-actions .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .apartment-actions .btn-secondary:hover {
        background: #5a6268;
    }

    @media (max-width: 768px) {
        .apartment-details-panel {
            position: fixed;
            top: auto;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            transform: translateY(100%);
            border-radius: 20px 20px 0 0;
        }

        .apartment-details-panel.show {
            transform: translateY(0);
        }

        .apartment-dot {
            width: 35px;
            height: 35px;
        }

        .dot-number {
            font-size: 12px;
        }
    }

    .apartments-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .apartments-table th,
    .apartments-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    .apartments-table th {
        background: #00a906;
        color: white;
        font-weight: 600;
    }

    .status {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .status-available {
        background: #d4edda;
        color: #155724;
    }

    .status-reserved {
        background: #fff3cd;
        color: #856404;
    }

    .status-sold {
        background: #f8d7da;
        color: #721c24;
    }

    .plan-link {
        color: #00a906;
        text-decoration: none;
        font-weight: 600;
    }

    .plan-link:hover {
        text-decoration: underline;
    }
    </style>
    <?php
}

/**
 * Render Visualizations Block
 */
function render_visualizations_block($block, $aos_attributes) {
    $title = $block['visualizations_title'] ?? '';
    $images = $block['visualizations_images'] ?? array();

    ?>
    <section class="visualizations-section" <?php echo $aos_attributes; ?>>
        <div class="container">
            <?php if ($title): ?>
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($images)): ?>
                <div class="visualizations-slider">
                    <div class="slider-container">
                        <?php foreach ($images as $index => $image): ?>
                            <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>"
                                     data-fancybox="visualizations">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="slider-controls">
                        <button class="prev-btn">‹</button>
                        <button class="next-btn">›</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <style>
    .visualizations-section {
        padding: 80px 0;
    }

    .visualizations-slider {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .slider-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .slide {
        display: none;
    }

    .slide.active {
        display: block;
    }

    .slide img {
        width: 100%;
        height: auto;
        cursor: pointer;
    }

    .slider-controls {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        padding: 0 1rem;
    }

    .prev-btn,
    .next-btn {
        background: rgba(0, 169, 6, 0.8);
        color: white;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .prev-btn:hover,
    .next-btn:hover {
        background: #00a906;
        transform: scale(1.1);
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.visualizations-slider .slide');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);

        // Auto-advance slides
        if (slides.length > 1) {
            setInterval(nextSlide, 5000);
        }
    });
    </script>
    <?php
}

/**
 * Render Contact Block
 */
function render_contact_block($block, $aos_attributes) {
    $title = $block['contact_title'] ?? '';
    $company_logo = $block['contact_company_logo'] ?? null;
    $address = $block['contact_address'] ?? '';
    $email = $block['contact_email'] ?? '';
    $phone = $block['contact_phone'] ?? '';
    $company_details = $block['contact_company_details'] ?? '';
    $agents = $block['contact_agents'] ?? array();

    ?>
    <section class="contact-section" <?php echo $aos_attributes; ?>>
        <div class="container">
            <?php if ($title): ?>
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <?php if ($company_logo): ?>
                            <div class="company-logo" data-aos="fade-up" data-aos-delay="200">
                                <img src="<?php echo esc_url($company_logo['url']); ?>"
                                     alt="<?php echo esc_attr($company_logo['alt']); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ($address): ?>
                            <div class="contact-item" data-aos="fade-up" data-aos-delay="300">
                                <h4>Adres</h4>
                                <div class="contact-content">
                                    <?php echo wp_kses_post($address); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <div class="contact-item" data-aos="fade-up" data-aos-delay="400">
                                <h4>Email</h4>
                                <div class="contact-content">
                                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($phone): ?>
                            <div class="contact-item" data-aos="fade-up" data-aos-delay="500">
                                <h4>Telefon</h4>
                                <div class="contact-content">
                                    <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($company_details): ?>
                            <div class="contact-item" data-aos="fade-up" data-aos-delay="600">
                                <h4>Dane firmy</h4>
                                <div class="contact-content">
                                    <?php echo wp_kses_post($company_details); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <?php if (!empty($agents)): ?>
                        <div class="contact-agents">
                            <?php foreach ($agents as $index => $agent): ?>
                                <div class="agent-card" data-aos="fade-up" data-aos-delay="<?php echo 700 + ($index * 100); ?>">
                                    <?php if ($agent['agent_photo']): ?>
                                        <div class="agent-photo">
                                            <img src="<?php echo esc_url($agent['agent_photo']['url']); ?>"
                                                 alt="<?php echo esc_attr($agent['agent_photo']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="agent-info">
                                        <h4><?php echo esc_html($agent['agent_name']); ?></h4>
                                        <p>
                                            <a href="tel:<?php echo esc_attr($agent['agent_phone']); ?>">
                                                <?php echo esc_html($agent['agent_phone']); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Contact Form -->
                    <div class="contact-form-container" data-aos="fade-up" data-aos-delay="800">
                        <?php future_display_contact_messages(); ?>

                        <form id="contact-form" class="contact-form" method="post" action="">
                            <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>

                            <div class="form-group">
                                <input type="text" name="contact_name" id="contact_name" required
                                       placeholder="Imię i nazwisko">
                            </div>

                            <div class="form-group">
                                <input type="email" name="contact_email" id="contact_email" required
                                       placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="tel" name="contact_phone" id="contact_phone"
                                       placeholder="Telefon">
                            </div>

                            <div class="form-group">
                                <textarea name="contact_message" id="contact_message" required
                                          placeholder="Wiadomość"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="consent_privacy" required>
                                    <span>Wyrażam zgodę na przetwarzanie danych osobowych</span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="consent_marketing">
                                    <span>Wyrażam zgodę na marketing</span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Wyślij wiadomość</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .contact-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .contact-info {
        margin-bottom: 2rem;
    }

    .company-logo {
        margin-bottom: 2rem;
    }

    .company-logo img {
        max-width: 200px;
        height: auto;
    }

    .contact-item {
        margin-bottom: 1.5rem;
    }

    .contact-item h4 {
        color: #00a906;
        margin-bottom: 0.5rem;
    }

    .contact-content a {
        color: #00a906;
        text-decoration: none;
    }

    .contact-content a:hover {
        text-decoration: underline;
    }

    .agent-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }

    .agent-photo img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .agent-info h4 {
        margin: 0 0 0.5rem 0;
        color: #333;
    }

    .agent-info p {
        margin: 0;
    }

    .agent-info a {
        color: #00a906;
        text-decoration: none;
    }

    .contact-form-container {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 1rem;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #00a906;
    }

    .form-group textarea {
        height: 120px;
        resize: vertical;
    }

    .checkbox-label {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        cursor: pointer;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .checkbox-label input[type="checkbox"] {
        width: auto;
        margin: 0;
    }

    .btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: #00a906;
        color: white;
    }

    .btn-primary:hover {
        background: #008a05;
    }
    </style>
    <?php
}

// Add Price Inquiry Popup Modal
?>
<div id="price-inquiry-modal" class="price-inquiry-modal" style="display: none;">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h3>Zapytaj o cenę mieszkania</h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <div class="apartment-info">
                <p><strong>Mieszkanie:</strong> <span id="modal-apartment-number"></span></p>
                <p><strong>Liczba pokoi:</strong> <span id="modal-apartment-rooms"></span></p>
                <p><strong>Powierzchnia:</strong> <span id="modal-apartment-area"></span></p>
                <p><strong>Ogródek:</strong> <span id="modal-apartment-garden"></span></p>
            </div>
            <form id="price-inquiry-form" method="post" action="">
                <?php wp_nonce_field('price_inquiry_action', 'price_inquiry_nonce'); ?>
                <input type="hidden" name="apartment_number" id="form-apartment-number">
                <input type="hidden" name="apartment_rooms" id="form-apartment-rooms">
                <input type="hidden" name="apartment_area" id="form-apartment-area">
                <input type="hidden" name="apartment_garden" id="form-apartment-garden">

                <div class="form-group">
                    <label for="inquiry_name">Imię i nazwisko *</label>
                    <input type="text" id="inquiry_name" name="inquiry_name" required>
                </div>

                <div class="form-group">
                    <label for="inquiry_email">Email *</label>
                    <input type="email" id="inquiry_email" name="inquiry_email" required>
                </div>

                <div class="form-group">
                    <label for="inquiry_message">Treść wiadomości *</label>
                    <textarea id="inquiry_message" name="inquiry_message" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="inquiry_consent" required>
                        <span class="checkmark"></span>
                        Wyrażam zgodę na przetwarzanie moich danych osobowych w celu odpowiedzi na zapytanie o cenę mieszkania *
                    </label>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-cancel">Anuluj</button>
                    <button type="submit" class="btn-submit">Wyślij zapytanie</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.price-inquiry-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

.modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
}

.modal-content {
    position: relative;
    background: white;
    margin: 5% auto;
    padding: 0;
    width: 90%;
    max-width: 600px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.modal-header h3 {
    margin: 0;
    color: #333;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #999;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-close:hover {
    color: #333;
}

.modal-body {
    padding: 20px;
}

.apartment-info {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.apartment-info p {
    margin: 5px 0;
    color: #555;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #333;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #00a906;
    box-shadow: 0 0 0 2px rgba(0, 169, 6, 0.2);
}

.checkbox-label {
    display: flex !important;
    align-items: flex-start;
    cursor: pointer;
    font-weight: normal !important;
}

.checkbox-label input[type="checkbox"] {
    width: auto !important;
    margin-right: 10px;
    margin-top: 2px;
}

.form-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn-cancel,
.btn-submit {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
}

.btn-cancel {
    background: #6c757d;
    color: white;
}

.btn-cancel:hover {
    background: #5a6268;
}

.btn-submit {
    background: #00a906;
    color: white;
}

.btn-submit:hover {
    background: #008a05;
}

.price-inquiry-btn {
    background: #00a906;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: background 0.3s;
}

.price-inquiry-btn:hover {
    background: #008a05;
}

@media (max-width: 768px) {
    .modal-content {
        margin: 10% auto;
        width: 95%;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-cancel,
    .btn-submit {
        width: 100%;
    }
}
</style>

<script>
// Price Inquiry Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('price-inquiry-modal');
    const closeBtn = document.querySelector('.modal-close');
    const cancelBtn = document.querySelector('.btn-cancel');
    const overlay = document.querySelector('.modal-overlay');
    const form = document.getElementById('price-inquiry-form');

    // Open modal when price inquiry button is clicked
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('price-inquiry-btn')) {
            const btn = e.target;
            const apartmentNumber = btn.getAttribute('data-apartment');
            const apartmentRooms = btn.getAttribute('data-rooms');
            const apartmentArea = btn.getAttribute('data-area');
            const apartmentGarden = btn.getAttribute('data-garden');

            // Populate modal with apartment data
            document.getElementById('modal-apartment-number').textContent = apartmentNumber;
            document.getElementById('modal-apartment-rooms').textContent = apartmentRooms;
            document.getElementById('modal-apartment-area').textContent = apartmentArea;
            document.getElementById('modal-apartment-garden').textContent = apartmentGarden;

            // Populate hidden form fields
            document.getElementById('form-apartment-number').value = apartmentNumber;
            document.getElementById('form-apartment-rooms').value = apartmentRooms;
            document.getElementById('form-apartment-area').value = apartmentArea;
            document.getElementById('form-apartment-garden').value = apartmentGarden;

            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    });

    // Close modal functions
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        form.reset();
    }

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic validation
        const name = document.getElementById('inquiry_name').value.trim();
        const email = document.getElementById('inquiry_email').value.trim();
        const message = document.getElementById('inquiry_message').value.trim();
        const consent = document.querySelector('input[name="inquiry_consent"]').checked;

        if (!name || !email || !message || !consent) {
            alert('Proszę wypełnić wszystkie wymagane pola.');
            return;
        }

        // Submit form via AJAX
        const formData = new FormData(form);
        formData.append('action', 'price_inquiry');

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Dziękujemy za zapytanie! Skontaktujemy się z Państwem w najbliższym czasie.');
                closeModal();
            } else {
                alert('Wystąpił błąd podczas wysyłania zapytania. Spróbuj ponownie.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Wystąpił błąd podczas wysyłania zapytania. Spróbuj ponownie.');
        });
    });
});

// Interactive Floor Plan Functionality
document.addEventListener('DOMContentLoaded', function() {
    const apartmentDots = document.querySelectorAll('.apartment-dot');
    const detailsPanel = document.getElementById('apartment-details-panel');
    const closePanelBtn = document.querySelector('.close-panel');
    const detailInquiryBtn = document.getElementById('detail-inquiry-btn');
    const detailPlanBtn = document.getElementById('detail-plan-btn');

    let currentApartment = null;

    // Handle apartment dot clicks
    apartmentDots.forEach(function(dot) {
        dot.addEventListener('click', function() {
            // Remove active class from all dots
            apartmentDots.forEach(function(d) {
                d.classList.remove('active');
            });

            // Add active class to clicked dot
            this.classList.add('active');

            // Get apartment data
            currentApartment = {
                number: this.getAttribute('data-apartment'),
                rooms: this.getAttribute('data-rooms'),
                area: this.getAttribute('data-area'),
                garden: this.getAttribute('data-garden'),
                status: this.getAttribute('data-status'),
                price: this.getAttribute('data-price'),
                plan: this.getAttribute('data-plan')
            };

            // Update panel content
            updateDetailsPanel(currentApartment);

            // Show panel
            detailsPanel.classList.add('show');
        });
    });

    // Close panel
    function closePanel() {
        detailsPanel.classList.remove('show');
        apartmentDots.forEach(function(dot) {
            dot.classList.remove('active');
        });
        currentApartment = null;
    }

    closePanelBtn.addEventListener('click', closePanel);

    // Close panel when clicking outside
    document.addEventListener('click', function(e) {
        if (!detailsPanel.contains(e.target) && !Array.from(apartmentDots).some(dot => dot.contains(e.target))) {
            closePanel();
        }
    });

    // Handle inquiry button in panel
    detailInquiryBtn.addEventListener('click', function() {
        if (currentApartment) {
            // Trigger the existing price inquiry modal
            const inquiryBtn = document.querySelector('.price-inquiry-btn');
            if (inquiryBtn) {
                inquiryBtn.click();
            }
        }
    });

    // Handle plan button in panel
    detailPlanBtn.addEventListener('click', function() {
        if (currentApartment && currentApartment.plan) {
            window.open(currentApartment.plan, '_blank');
        }
    });

    // Update details panel content
    function updateDetailsPanel(apartment) {
        document.getElementById('detail-number').textContent = apartment.number;
        document.getElementById('detail-rooms').textContent = apartment.rooms;
        document.getElementById('detail-area').textContent = apartment.area + ' m²';
        document.getElementById('detail-garden').textContent = apartment.garden + ' m²';

        // Status with color coding
        const statusElement = document.getElementById('detail-status');
        const statusLabels = {
            'available': 'Dostępne',
            'reserved': 'Zarezerwowane',
            'sold': 'Sprzedane'
        };
        statusElement.textContent = statusLabels[apartment.status] || apartment.status;
        statusElement.className = 'status-' + apartment.status;

        // Price
        document.getElementById('detail-price').textContent = apartment.price;

        // Update inquiry button data attributes
        detailInquiryBtn.setAttribute('data-apartment', apartment.number);
        detailInquiryBtn.setAttribute('data-rooms', apartment.rooms);
        detailInquiryBtn.setAttribute('data-area', apartment.area);
        detailInquiryBtn.setAttribute('data-garden', apartment.garden);

        // Update plan button
        if (apartment.plan) {
            detailPlanBtn.href = apartment.plan;
            detailPlanBtn.style.display = 'block';
        } else {
            detailPlanBtn.style.display = 'none';
        }
    }
});
</script>

<?php
// Add AOS fallback script at the end
?>
<script>
// AOS Fallback - ensure AOS is initialized even if there were loading issues
(function() {
    function initAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
            console.log('AOS initialized successfully');
        } else {
            console.warn('AOS not available, removing data-aos attributes');
            // If AOS still not available, remove data-aos attributes to prevent errors
            document.querySelectorAll('[data-aos]').forEach(function(element) {
                element.removeAttribute('data-aos');
                element.removeAttribute('data-aos-delay');
                element.removeAttribute('data-aos-duration');
            });
        }
    }

    // Try to initialize immediately
    initAOS();

    // Also try on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAOS);
    }

    // And as a final fallback, try after a delay
    setTimeout(initAOS, 2000);
})();
</script>
<?php
?>
