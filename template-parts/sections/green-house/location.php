<?php
/**
 * Location Section for Green House Tuwima
 *
 * @package Future
 */

// Get ACF fields
$location_title = get_field('location_title') ?: 'Lokalizacja';
$location_description = get_field('location_description');
$location_amenities = get_field('location_amenities');
$location_button = get_field('location_button');
$location_map = get_field('location_map');

// Default amenities if none are set
$default_amenities = array(
    array('time' => '5 min', 'name' => 'szkoła podstawowa'),
    array('time' => '3 min', 'name' => 'Supermarkety'),
    array('time' => '5 min', 'name' => 'Przystanek autobusowy'),
    array('time' => '5 min', 'name' => 'Park'),
    array('time' => '3 min', 'name' => 'Przedszkole publiczne'),
    array('time' => '2 min', 'name' => 'Basen'),
);

$amenities_to_show = $location_amenities ?: $default_amenities;
?>

<section id="lokalizacja" class="section-padding bg-white">
    <div class="container-custom">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-heading text-3xl lg:text-4xl mb-6">
                <?php echo esc_html($location_title); ?>
            </h2>
            <?php if ($location_description): ?>
                <div class="max-w-4xl mx-auto text-body text-lg">
                    <?php echo wp_kses_post($location_description); ?>
                </div>
            <?php else: ?>
                <p class="max-w-4xl mx-auto text-body text-lg">
                    <strong>Green House Tuwima </strong>łączy bliskość natury z komfortem miejskiego życia. W otoczeniu inwestycji znajdują się liczne tereny zielone, a jednocześnie możesz cieszyć się szybkim dojazdem do centrum oraz wygodnym dostępem do szkół, sklepów i usług.
                </p>
            <?php endif; ?>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Amenities -->
            <div class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($amenities_to_show as $amenity): ?>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <!-- Icon placeholder -->
                            <div class="w-12 h-12 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-primary-500 font-bold text-lg">
                                    <?php echo esc_html($amenity['time']); ?>
                                </p>
                                <p class="text-gray-800 font-medium">
                                    <?php echo esc_html($amenity['name']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Button -->
                <?php if ($location_button): ?>
                    <div class="pt-4">
                        <a href="<?php echo esc_url($location_button['url']); ?>"
                           class="btn-primary">
                            <?php echo esc_html($location_button['text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Map -->
            <div>
                <?php if ($location_map): ?>
                    <img src="<?php echo esc_url($location_map['url']); ?>"
                         alt="<?php echo esc_attr($location_map['alt']); ?>"
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_64.jpg"
                         alt="Mapa lokalizacji"
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
