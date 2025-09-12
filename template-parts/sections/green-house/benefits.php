<?php
/**
 * Benefits Section for Green House Tuwima
 * 
 * @package Future
 */

// Get ACF fields
$benefits_title = get_field('benefits_title') ?: 'Korzyściach<br>z wyboru tych mieszkań';
$benefits_list = get_field('benefits_list');
$benefits_description = get_field('benefits_description') ?: 'Czasy dojazdu do Katowic, Jaworzna, Dąbrowy Górniczej czy centrum Sosnowca';
$benefits_button = get_field('benefits_button');
$benefits_image = get_field('benefits_image');

// Default benefits if none are set
$default_benefits = array(
    array('text' => 'Ogrzewanie<br>podłogowe'),
    array('text' => 'Miejsca<br>postojowe'),
    array('text' => 'Bezpieczna<br>okolica'),
    array('text' => 'Własne<br>ogródki'),
    array('text' => 'Okna<br>tarasowe'),
    array('text' => 'Zamykane<br>kameralne osiedle'),
    array('text' => 'Okna<br>trzyszybowe'),
    array('text' => 'Mieszkania<br>bezczynszowe'),
);

$benefits_to_show = $benefits_list ?: $default_benefits;
?>

<section class="section-padding bg-gray-50">
    <div class="container-custom">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Image -->
            <div>
                <?php if ($benefits_image): ?>
                    <img src="<?php echo esc_url($benefits_image['url']); ?>" 
                         alt="<?php echo esc_attr($benefits_image['alt']); ?>" 
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/4.png" 
                         alt="Korzyści" 
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php endif; ?>
            </div>
            
            <!-- Content -->
            <div class="space-y-8">
                <!-- Title -->
                <h2 class="text-heading text-2xl lg:text-3xl">
                    <?php echo wp_kses_post($benefits_title); ?>
                </h2>
                
                <!-- Benefits Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <?php foreach ($benefits_to_show as $index => $benefit): ?>
                        <div class="flex items-center space-x-3">
                            <!-- Icon placeholder - you can add actual icons here -->
                            <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-sm lg:text-base font-bold text-gray-800 leading-tight">
                                <?php echo wp_kses_post($benefit['text']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Description -->
                <p class="text-center text-body">
                    <?php echo esc_html($benefits_description); ?>
                </p>
                
                <!-- Button -->
                <?php if ($benefits_button): ?>
                    <div class="text-center pt-4">
                        <a href="<?php echo esc_url($benefits_button['url']); ?>" 
                           class="btn-primary">
                            <?php echo esc_html($benefits_button['text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
