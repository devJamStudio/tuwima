<?php
/**
 * Template part for Green House apartments section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="apartments" class="py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2300a906" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-green-500 mb-6">
                <?php echo get_field('apartments_title') ?: 'Wybierz swoje mieszkanie'; ?>
            </h2>
            <p class="text-lg lg:text-xl text-gray-700 leading-relaxed max-w-4xl mx-auto">
                <?php
                $description = get_field('apartments_description') ?: 'Każde mieszkanie zostało zaprojektowane z myślą o komforcie i funkcjonalności. Wybierz spośród różnorodnych układów - od przytulnych kawalerek po przestronne apartamenty rodzinne.';
                echo $description;
                ?>
            </p>
        </div>

        <!-- Interactive Apartment Selector -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 mb-16">

            <!-- Building Layout -->
            <div class="relative mb-12">
                <h3 class="text-2xl font-bold text-center mb-8 text-gray-900">Plan osiedla - kliknij na mieszkanie</h3>

                <!-- Building Visualization -->
                <div class="relative max-w-4xl mx-auto">

                    <!-- Building 1 (Top Row) -->
                    <div class="grid grid-cols-10 gap-2 mb-4">
                        <?php for($i = 1; $i <= 20; $i++): ?>
                        <button class="apartment-dot w-4 h-4 bg-green-500 rounded-full hover:bg-green-600 hover:scale-125 transition-all duration-200 cursor-pointer"
                                data-apartment='{"number":"A<?php echo $i; ?>.1","rooms":<?php echo rand(2,4); ?>,"area":<?php echo rand(35,65); ?>,"garden":<?php echo rand(0,50); ?>,"available":<?php echo rand(0,1) ? 'true' : 'false'; ?>}'
                                title="Mieszkanie A<?php echo $i; ?>.1">
                        </button>
                        <?php endfor; ?>
                    </div>

                    <!-- Building 2 (Bottom Row) -->
                    <div class="grid grid-cols-10 gap-2">
                        <?php for($i = 21; $i <= 40; $i++): ?>
                        <button class="apartment-dot w-4 h-4 bg-green-500 rounded-full hover:bg-green-600 hover:scale-125 transition-all duration-200 cursor-pointer"
                                data-apartment='{"number":"B<?php echo $i-20; ?>.1","rooms":<?php echo rand(2,4); ?>,"area":<?php echo rand(35,65); ?>,"garden":<?php echo rand(0,50); ?>,"available":<?php echo rand(0,1) ? 'true' : 'false'; ?>}'
                                title="Mieszkanie B<?php echo $i-20; ?>.1">
                        </button>
                        <?php endfor; ?>
                    </div>

                    <!-- Legend -->
                    <div class="flex justify-center space-x-8 mt-8">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Dostępne</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Zarezerwowane</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-red-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Sprzedane</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selected Apartment Info -->
            <div class="bg-gray-50 rounded-2xl p-8" data-apartment-info>
                <div class="text-center text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <p class="text-lg">Kliknij na mieszkanie aby zobaczyć szczegóły</p>
                </div>
            </div>
        </div>

        <!-- Apartment Types Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">

            <!-- Studio Apartments -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="text-4xl font-bold mb-2">1-2</div>
                        <div class="text-lg">pokoje</div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kawalerki i małe mieszkania</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Powierzchnia:</span>
                            <span class="font-semibold">25-40 m²</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ilość:</span>
                            <span class="font-semibold">8 mieszkań</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Cena od:</span>
                            <span class="font-semibold text-green-500">Zapytaj o cenę</span>
                        </div>
                    </div>
                    <button class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                        Zobacz układy
                    </button>
                </div>
            </div>

            <!-- 3-Room Apartments -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="text-4xl font-bold mb-2">3</div>
                        <div class="text-lg">pokoje</div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mieszkania 3-pokojowe</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Powierzchnia:</span>
                            <span class="font-semibold">45-60 m²</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ilość:</span>
                            <span class="font-semibold">12 mieszkań</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Cena od:</span>
                            <span class="font-semibold text-green-500">Zapytaj o cenę</span>
                        </div>
                    </div>
                    <button class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition-colors">
                        Zobacz układy
                    </button>
                </div>
            </div>

            <!-- 4+ Room Apartments -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="text-4xl font-bold mb-2">4+</div>
                        <div class="text-lg">pokoi</div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Duże mieszkania rodzinne</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Powierzchnia:</span>
                            <span class="font-semibold">65-85 m²</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ilość:</span>
                            <span class="font-semibold">8 mieszkań</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Cena od:</span>
                            <span class="font-semibold text-green-500">Zapytaj o cenę</span>
                        </div>
                    </div>
                    <button class="w-full bg-purple-500 text-white py-3 rounded-lg font-semibold hover:bg-purple-600 transition-colors">
                        Zobacz układy
                    </button>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-8 lg:p-12 text-white">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold mb-4">Każde mieszkanie zawiera</h3>
                <p class="text-green-100">Standard wykończenia i wyposażenia</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Ogrzewanie podłogowe</h4>
                    <p class="text-sm text-green-100">W całym mieszkaniu</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Okna trzyszybowe</h4>
                    <p class="text-sm text-green-100">Energooszczędne</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Bezpieczeństwo</h4>
                    <p class="text-sm text-green-100">Zamykane osiedle</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-2">Miejsce parkingowe</h4>
                    <p class="text-sm text-green-100">W cenie mieszkania</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.apartment-dot {
    transition: all 0.2s ease;
}

.apartment-dot:hover {
    transform: scale(1.25);
}

.apartment-dot.selected {
    background-color: #ef4444;
    transform: scale(1.5);
}

.apartment-dot.reserved {
    background-color: #f97316;
}

.apartment-dot.sold {
    background-color: #dc2626;
}
</style>
