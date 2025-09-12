<?php
/**
 * Contact Section for Green House Tuwima
 *
 * @package Future
 */

// Get ACF fields
$contact_title = get_field('contact_title') ?: 'Siedziba główna BUDRAISE INVEST';
$contact_company_logo = get_field('contact_company_logo');
$contact_info = get_field('contact_info');
$contact_agents = get_field('contact_agents');
?>

<section id="kontakt" class="section-padding bg-gray-50">
    <div class="container-custom">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-heading text-3xl lg:text-4xl">
                <?php echo esc_html($contact_title); ?>
            </h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Company Info -->
            <div class="space-y-8">
                <!-- Company Logo -->
                <?php if ($contact_company_logo): ?>
                    <img src="<?php echo esc_url($contact_company_logo['url']); ?>"
                         alt="<?php echo esc_attr($contact_company_logo['alt']); ?>"
                         class="h-20 w-auto">
                <?php endif; ?>

                <!-- Contact Information -->
                <?php if ($contact_info): ?>
                    <div class="space-y-4">
                        <?php if ($contact_info['address']): ?>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-primary-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-body">
                                    <?php echo wp_kses_post($contact_info['address']); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($contact_info['email']): ?>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <a href="mailto:<?php echo esc_attr($contact_info['email']); ?>"
                                   class="text-body hover:text-primary-500 transition-colors">
                                    <?php echo esc_html($contact_info['email']); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($contact_info['company_details']): ?>
                            <div class="text-body">
                                <?php echo wp_kses_post($contact_info['company_details']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <!-- Default contact info -->
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-body">
                                ul. Wrocławska 54<br>40-217 Katowice
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <a href="mailto:biuro@budraise.pl"
                               class="text-body hover:text-primary-500 transition-colors">
                                biuro@budraise.pl
                            </a>
                        </div>

                        <div class="text-body">
                            Krs: 0000912878<br>Nip: 6431775795<br>Regon: 389511621
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Contact Agents -->
            <div class="lg:col-span-2">
                <?php if ($contact_agents): ?>
                    <div class="grid md:grid-cols-2 gap-8">
                        <?php foreach ($contact_agents as $agent): ?>
                            <div class="text-center space-y-4">
                                <?php if ($agent['photo']): ?>
                                    <img src="<?php echo esc_url($agent['photo']['url']); ?>"
                                         alt="<?php echo esc_attr($agent['photo']['alt']); ?>"
                                         class="w-32 h-32 rounded-full mx-auto object-cover shadow-lg">
                                <?php else: ?>
                                    <div class="w-32 h-32 bg-primary-500 rounded-full mx-auto flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>

                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">
                                        <?php echo esc_html($agent['name']); ?>
                                    </h3>
                                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $agent['phone'])); ?>"
                                       class="text-primary-500 font-bold text-2xl hover:text-primary-600 transition-colors">
                                        <?php echo esc_html($agent['phone']); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <!-- Default agents -->
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="text-center space-y-4">
                            <div class="w-32 h-32 bg-primary-500 rounded-full mx-auto flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Rafał Banarski</h3>
                                <a href="tel:572481313"
                                   class="text-primary-500 font-bold text-2xl hover:text-primary-600 transition-colors">
                                    572 481 313
                                </a>
                            </div>
                        </div>

                        <div class="text-center space-y-4">
                            <div class="w-32 h-32 bg-primary-500 rounded-full mx-auto flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Mariusz Szyda</h3>
                                <a href="tel:453287744"
                                   class="text-primary-500 font-bold text-2xl hover:text-primary-600 transition-colors">
                                    453 287 744
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
