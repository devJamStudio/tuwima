<?php
/**
 * Hero Section for Green House Tuwima
 * 
 * @package Future
 */

// Get ACF fields
$hero_title = get_field('hero_title') ?: 'Green House<br><strong>tuwima</strong>';
$hero_subtitle = get_field('hero_subtitle') ?: 'Najlepsza inwestycja w Twoją przyszłosć';
$hero_button = get_field('hero_button');
$hero_statistics = get_field('hero_statistics');
$hero_background = get_field('hero_background');
?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" 
         style="background-image: url('<?php echo $hero_background ? esc_url($hero_background['url']) : get_template_directory_uri() . '/html/images/4_3.jpg'; ?>');">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    
    <!-- Content -->
    <div class="relative z-10 text-center text-white container-custom">
        <!-- Main Title -->
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-montserrat font-medium uppercase tracking-widest text-shadow-lg mb-4">
            <?php echo wp_kses_post($hero_title); ?>
        </h1>
        
        <!-- Subtitle -->
        <p class="text-xl md:text-2xl lg:text-3xl font-bold text-shadow mb-12">
            <?php echo esc_html($hero_subtitle); ?>
        </p>
        
        <!-- CTA Button -->
        <?php if ($hero_button): ?>
            <a href="<?php echo esc_url($hero_button['url']); ?>" 
               class="btn-primary text-lg px-12 py-4 inline-block">
                <?php echo esc_html($hero_button['text']); ?>
            </a>
        <?php endif; ?>
    </div>
    
    <!-- Statistics Bar -->
    <?php if ($hero_statistics): ?>
    <div class="absolute bottom-0 left-0 right-0 bg-primary-500 py-8">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center text-white">
                <?php foreach ($hero_statistics as $stat): ?>
                    <div class="space-y-2">
                        <p class="text-2xl lg:text-3xl font-bold">
                            <?php echo esc_html($stat['number']); ?>
                        </p>
                        <p class="text-sm lg:text-base font-bold leading-tight">
                            <?php echo wp_kses_post($stat['label']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

