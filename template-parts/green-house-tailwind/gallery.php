<?php
/**
 * Template part for Green House gallery section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="gallery" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-green-500 mb-6">
                Zobacz galerię
            </h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Poznaj wnętrza i otoczenie mieszkań Green House Tuwima
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">

            <!-- Main Featured Image -->
            <div class="lg:col-span-2">
                <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/4_2.jpg"
                         alt="Green House Tuwima - Widok główny"
                         class="w-full h-96 lg:h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700" />

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Play button overlay -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="w-20 h-20 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-colors">
                            <svg class="w-8 h-8 text-green-500 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Image label -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="bg-white/90 backdrop-blur-sm rounded-lg p-3">
                            <h3 class="font-semibold text-gray-900">Widok na osiedle</h3>
                            <p class="text-sm text-gray-600">Nowoczesna architektura w zielonym otoczeniu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Images -->
            <div class="space-y-8">
                <div class="relative group overflow-hidden rounded-2xl shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/2.png"
                         alt="Wnętrze mieszkania"
                         class="w-full h-44 object-cover transform group-hover:scale-110 transition-transform duration-500" />

                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="absolute bottom-3 left-3 right-3">
                        <div class="bg-white/90 backdrop-blur-sm rounded p-2">
                            <p class="text-sm font-semibold text-gray-900">Wnętrze mieszkania</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/5_2.png"
                         alt="Ogródek prywatny"
                         class="w-full h-44 object-cover transform group-hover:scale-110 transition-transform duration-500" />

                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="absolute bottom-3 left-3 right-3">
                        <div class="bg-white/90 backdrop-blur-sm rounded p-2">
                            <p class="text-sm font-semibold text-gray-900">Prywatny ogródek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Gallery Images -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="<?php echo get_template_directory_uri(); ?>/html/images/3_2.png"
                     alt="Kuchnia"
                     class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white font-semibold">Kuchnia</span>
                </div>
            </div>

            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="<?php echo get_template_directory_uri(); ?>/html/images/6.png"
                     alt="Salon"
                     class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white font-semibold">Salon</span>
                </div>
            </div>

            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="<?php echo get_template_directory_uri(); ?>/html/images/4_2.jpg"
                     alt="Sypialnia"
                     class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white font-semibold">Sypialnia</span>
                </div>
            </div>

            <!-- View All Button -->
            <div class="relative group overflow-hidden rounded-xl shadow-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center cursor-pointer hover:from-green-600 hover:to-green-700 transition-all duration-300">
                <div class="text-center text-white p-6">
                    <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="font-bold text-lg">Zobacz wszystkie</p>
                    <p class="text-sm text-green-100">50+ zdjęć</p>
                </div>
            </div>
        </div>

        <!-- Gallery Categories -->
        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Wnętrza mieszkań</h3>
                    <p class="text-gray-600 mb-4">Zobacz przykładowe aranżacje i wykończenia mieszkań</p>
                    <button class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                        Zobacz (15 zdjęć)
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Ogródki i tarasy</h3>
                    <p class="text-gray-600 mb-4">Prywatne przestrzenie zewnętrzne przy mieszkaniach</p>
                    <button class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition-colors">
                        Zobacz (20 zdjęć)
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Otoczenie osiedla</h3>
                    <p class="text-gray-600 mb-4">Okolica, infrastruktura i tereny zielone</p>
                    <button class="w-full bg-purple-500 text-white py-3 rounded-lg font-semibold hover:bg-purple-600 transition-colors">
                        Zobacz (25 zdjęć)
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
