<?php
/**
 * Template part for Green House contact section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="contact" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                <span class="text-green-500">Siedziba główna</span>
                <span class="text-gray-900">BUDRAISE INVEST</span>
            </h2>
        </div>

        <!-- Company Info -->
        <div class="grid lg:grid-cols-3 gap-8 mb-16">

            <!-- Company Logo -->
            <div class="lg:col-span-1 flex justify-center lg:justify-start">
                <img src="<?php echo get_field('contact_logo')['url'] ?? get_template_directory_uri() . '/html/images/budraise_invest_wh.png'; ?>"
                     alt="Budraise Invest"
                     class="h-20 object-contain" />
            </div>

            <!-- Contact Details -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Address -->
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <?php
                        $address = get_field('contact_address') ?: 'ul. Wrocławska 54<br>40-217 Katowice<br><span class="text-green-500">Zobacz dojazd</span>';
                        echo '<div class="text-gray-900 leading-relaxed">' . $address . '</div>';
                        ?>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <a href="mailto:<?php echo get_field('contact_email') ?: 'biuro@budraise.pl'; ?>"
                       class="text-gray-900 hover:text-green-500 transition-colors">
                        <?php echo get_field('contact_email') ?: 'biuro@budraise.pl'; ?>
                    </a>
                </div>
            </div>

            <!-- Company Details -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="font-bold text-gray-900 mb-4">Dane firmowe</h3>
                    <div class="space-y-2 text-sm">
                        <?php
                        $details = get_field('contact_company_details') ?: '<strong>Krs:</strong> 0000912878<br><strong>Nip:</strong> 6431775795<br><strong>Regon:</strong> 389511621';
                        echo '<div class="text-gray-700">' . $details . '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Agents -->
        <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12 mb-16">
            <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">Nasi doradcy</h3>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">

                <!-- Agent 1 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-48 h-48 mx-auto rounded-full overflow-hidden shadow-2xl ring-4 ring-green-100 group-hover:ring-green-300 transition-all duration-300">
                            <img src="<?php echo get_field('agent_1_photo')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_56.jpg'; ?>"
                                 alt="<?php echo get_field('agent_1_name') ?: 'Rafał Banarski'; ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </div>

                        <!-- Contact overlay -->
                        <div class="absolute inset-0 bg-green-500/90 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                            <div class="text-white text-center">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div class="text-sm font-semibold">Zadzwoń</div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-xl font-bold text-gray-900 mb-2">
                        <?php echo get_field('agent_1_name') ?: 'Rafał Banarski'; ?>
                    </h4>

                    <a href="tel:<?php echo str_replace(' ', '', get_field('agent_1_phone') ?: '572481313'); ?>"
                       class="inline-block text-2xl font-bold text-green-500 hover:text-green-600 transition-colors">
                        <?php echo get_field('agent_1_phone') ?: '572 481 313'; ?>
                    </a>

                    <div class="mt-4">
                        <button class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                            Skontaktuj się
                        </button>
                    </div>
                </div>

                <!-- Agent 2 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-48 h-48 mx-auto rounded-full overflow-hidden shadow-2xl ring-4 ring-green-100 group-hover:ring-green-300 transition-all duration-300">
                            <img src="<?php echo get_field('agent_2_photo')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_57.jpg'; ?>"
                                 alt="<?php echo get_field('agent_2_name') ?: 'Mariusz Szyda'; ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </div>

                        <!-- Contact overlay -->
                        <div class="absolute inset-0 bg-green-500/90 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                            <div class="text-white text-center">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div class="text-sm font-semibold">Zadzwoń</div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-xl font-bold text-gray-900 mb-2">
                        <?php echo get_field('agent_2_name') ?: 'Mariusz Szyda'; ?>
                    </h4>

                    <a href="tel:<?php echo str_replace(' ', '', get_field('agent_2_phone') ?: '453287744'); ?>"
                       class="inline-block text-2xl font-bold text-green-500 hover:text-green-600 transition-colors">
                        <?php echo get_field('agent_2_phone') ?: '453 287 744'; ?>
                    </a>

                    <div class="mt-4">
                        <button class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                            Skontaktuj się
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-gradient-to-br from-green-500 via-green-600 to-green-700 rounded-2xl shadow-2xl p-8 lg:p-12 text-white">
            <h3 class="text-3xl font-bold text-center mb-12">
                <?php echo get_field('contact_form_title') ?: 'Skontaktuj się z Nami'; ?>
            </h3>

            <form class="max-w-4xl mx-auto" method="POST" action="<?php echo admin_url('admin-ajax.php'); ?>">
                <input type="hidden" name="action" value="green_house_contact">
                <?php wp_nonce_field('green_house_contact_nonce', 'contact_nonce'); ?>

                <div class="grid md:grid-cols-2 gap-6 mb-8">

                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-green-100">
                                <?php echo get_field('form_name_label') ?: 'Imię i nazwisko:'; ?>
                            </label>
                            <input type="text" name="contact_name" required
                                   class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-green-100">
                                <?php echo get_field('form_email_label') ?: 'Email:'; ?>
                            </label>
                            <input type="email" name="contact_email" required
                                   class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-green-100">
                                <?php echo get_field('form_phone_label') ?: 'Telefon:'; ?>
                            </label>
                            <input type="tel" name="contact_phone"
                                   class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-green-100">
                            <?php echo get_field('form_message_label') ?: 'Napisz wiadomość:'; ?>
                        </label>
                        <textarea name="contact_message" rows="8" required
                                  class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all resize-none"></textarea>
                    </div>
                </div>

                <!-- Consent Checkboxes -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="consent1" name="consent_marketing" required
                               class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-white/50 focus:ring-2">
                        <label for="consent1" class="text-sm text-green-100 leading-relaxed">
                            <?php echo get_field('consent_text_1') ?: 'Wyrażam zgodę na wysyłanie informacji handlowych'; ?>
                        </label>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="consent2" name="consent_data" required
                               class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-white/50 focus:ring-2">
                        <label for="consent2" class="text-sm text-green-100 leading-relaxed">
                            <?php echo get_field('consent_text_2') ?: 'Wyrażam zgodę na przekazanie i przetwarzanie moich danych osobowych w celu odpowiedzi na przesłaną wiadomość'; ?>
                        </label>
                    </div>

                    <div class="flex items-start space-x-3">
                        <svg class="w-4 h-4 text-green-300 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <a href="#" class="text-sm text-green-200 hover:text-white underline transition-colors">
                            Polityka prywatności
                        </a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-white text-green-600 px-12 py-4 rounded-xl font-bold text-lg hover:bg-green-50 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <?php echo get_field('submit_button_text') ?: 'Wyślij wiadomość'; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
