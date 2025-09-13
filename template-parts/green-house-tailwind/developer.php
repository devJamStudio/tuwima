<?php
/**
 * Template part for Green House developer section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Content Column -->
            <div class="space-y-8">
                <div class="space-y-6">
                    <h2 class="text-4xl lg:text-5xl font-bold text-green-500 leading-tight">
                        O developerze
                    </h2>

                    <div class="text-gray-700 leading-relaxed text-lg space-y-4">
                        <?php
                        $description = get_field('developer_description') ?: 'Tworzymy nieruchomości, które spełniają oczekiwania wymagających klientów. Stawiamy na jakość naszych realizacji. Współpracujemy z doświadczonym biurem projektowym dzięki czemu nasze nieruchomości są nowoczesne i praktyczne.<br><br>Realizację projektów powierzamy firmom budowlanym o ugruntowanej pozycji na rynku. Misją naszej firmy jest to, aby oddawać w ręce naszych klientów nieruchomości, które dają znaczący komfort życia codziennego.';

                        // Split paragraphs and format them
                        $paragraphs = explode('<br><br>', $description);
                        foreach ($paragraphs as $paragraph) {
                            echo '<p>' . $paragraph . '</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Company Values -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Nasze wartości:</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Jakość wykonania</h4>
                                <p class="text-gray-600">Współpraca z najlepszymi firmami budowlanymi</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Nowoczesny design</h4>
                                <p class="text-gray-600">Doświadczone biuro projektowe</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Komfort życia</h4>
                                <p class="text-gray-600">Funkcjonalne rozwiązania dla codzienności</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Terminowość</h4>
                                <p class="text-gray-600">Dotrzymujemy ustalonych terminów</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Stats -->
                <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-green-500">15+</div>
                            <div class="text-sm text-gray-600">lat doświadczenia</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-500">500+</div>
                            <div class="text-sm text-gray-600">zadowolonych klientów</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-500">50+</div>
                            <div class="text-sm text-gray-600">zrealizowanych projektów</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="relative">
                <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                    <img src="<?php echo get_field('developer_image')['url'] ?? get_template_directory_uri() . '/html/images/5.jpg'; ?>"
                         alt="Developer"
                         class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500" />

                    <!-- Company overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/30 via-transparent to-transparent"></div>

                    <!-- Company logo overlay -->
                    <div class="absolute bottom-6 left-6 right-6">
                        <div class="bg-white/90 backdrop-blur-sm rounded-lg p-4">
                            <div class="text-center">
                                <h4 class="font-bold text-gray-900 mb-1">BUDRAISE INVEST</h4>
                                <p class="text-sm text-gray-600">Deweloper z pasją</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Floating elements -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-green-500/10 rounded-full blur-xl"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-green-500/5 rounded-full blur-2xl"></div>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="mt-16 bg-gray-50 rounded-2xl p-8">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Zaufali nam</h3>
                <p class="text-gray-600">Nasze referencje i certyfikaty</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Certyfikat ISO</h4>
                    <p class="text-sm text-gray-600">Zarządzanie jakością</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Gwarancja</h4>
                    <p class="text-sm text-gray-600">5 lat na konstrukcję</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Finansowanie</h4>
                    <p class="text-sm text-gray-600">Pomoc w kredycie</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Obsługa klienta</h4>
                    <p class="text-sm text-gray-600">24/7 wsparcie</p>
                </div>
            </div>
        </div>

        <!-- Image Column -->
        <div class="relative">
            <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                <img src="<?php echo get_field('developer_image')['url'] ?? get_template_directory_uri() . '/html/images/5.jpg'; ?>"
                     alt="Budraise Invest Developer"
                     class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500" />

                <!-- Professional overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 via-transparent to-transparent"></div>

                <!-- Company badge -->
                <div class="absolute top-6 left-6">
                    <div class="bg-white/90 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-sm font-bold text-gray-900">BUDRAISE INVEST</div>
                        <div class="text-xs text-gray-600">Deweloper</div>
                    </div>
                </div>
            </div>

            <!-- Floating elements -->
            <div class="absolute -top-4 -right-4 w-24 h-24 bg-green-500/10 rounded-full blur-xl"></div>
            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-green-500/5 rounded-full blur-2xl"></div>
        </div>
    </div>

    <!-- Timeline/Process -->
    <div class="mt-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Proces realizacji</h3>
                <p class="text-gray-600">Od projektu do oddania kluczy</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">1</div>
                    <h4 class="font-semibold text-gray-900 mb-2">Projekt</h4>
                    <p class="text-sm text-gray-600">Opracowanie dokumentacji</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">2</div>
                    <h4 class="font-semibold text-gray-900 mb-2">Pozwolenia</h4>
                    <p class="text-sm text-gray-600">Uzyskanie pozwoleń budowlanych</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">3</div>
                    <h4 class="font-semibold text-gray-900 mb-2">Budowa</h4>
                    <p class="text-sm text-gray-600">Realizacja inwestycji</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl">4</div>
                    <h4 class="font-semibold text-gray-900 mb-2">Odbiór</h4>
                    <p class="text-sm text-gray-600">Przekazanie kluczy</p>
                </div>
            </div>
        </div>
    </div>
</section>
