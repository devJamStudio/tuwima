<?php
/**
 * About Investment Section for Green House Tuwima
 * 
 * @package Future
 */

// Get ACF fields
$about_title = get_field('about_title') ?: 'O inwestycji';
$about_subtitle = get_field('about_subtitle') ?: 'Inwestycja w przyszłość<br>Twojej rodziny.';
$about_content = get_field('about_content');
$about_button = get_field('about_button');
$about_image = get_field('about_image');
?>

<section id="o-inwestycji" class="section-padding bg-white">
    <div class="container-custom">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Content -->
            <div class="space-y-8">
                <!-- Title -->
                <div class="space-y-4">
                    <h2 class="text-heading text-3xl lg:text-4xl">
                        <?php echo esc_html($about_title); ?>
                    </h2>
                    <h3 class="text-subheading text-xl lg:text-2xl">
                        <?php echo wp_kses_post($about_subtitle); ?>
                    </h3>
                </div>
                
                <!-- Content -->
                <?php if ($about_content): ?>
                    <div class="text-body leading-relaxed">
                        <?php echo wp_kses_post($about_content); ?>
                    </div>
                <?php else: ?>
                    <div class="text-body leading-relaxed">
                        <p>Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca, zaledwie kilka minut od centrum. Osiedle składa się z 14 domów w zabudowie bliźniaczej – łącznie 28 mieszkań. To idealna propozycja dla osób ceniących komfort, prywatność i dogodną lokalizację.</p>
                        
                        <p class="mt-6">W ofercie znajdują się mieszkania na parterze z prywatnymi ogródkami oraz lokale na piętrze z przestronnymi balkonami. Każde z mieszkań zostało zaprojektowane z myślą o wygodzie mieszkańców – nowoczesny układ, funkcjonalne rozwiązania i wysoki standard wykończenia gwarantują komfort codziennego życia.</p>
                        
                        <p class="mt-6">Osiedle znajduje się w cichej, zielonej okolicy, a jednocześnie blisko szkół, sklepów, parku i innych udogodnień. Doskonała komunikacja zapewnia szybki dojazd do centrum oraz innych dzielnic miasta. To alternatywa dla zatłoczonych blokowisk – mniejsza liczba mieszkańców, brak wysokiej zabudowy i spokojna atmosfera sprzyjają relaksowi i budowaniu dobrych relacji sąsiedzkich.</p>
                    </div>
                <?php endif; ?>
                
                <!-- Button -->
                <?php if ($about_button): ?>
                    <div class="pt-4">
                        <a href="<?php echo esc_url($about_button['url']); ?>" 
                           class="btn-primary">
                            <?php echo esc_html($about_button['text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Image -->
            <div class="order-first lg:order-last">
                <?php if ($about_image): ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>" 
                         alt="<?php echo esc_attr($about_image['alt']); ?>" 
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/5.jpg" 
                         alt="O inwestycji" 
                         class="w-full h-auto rounded-lg shadow-lg">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
