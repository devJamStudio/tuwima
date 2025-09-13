<?php
/**
 * Template part for Green House footer section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer class="relative bg-gradient-to-b from-gray-800 via-gray-900 to-black text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-20"
         style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/5_3.png');"></div>

    <div class="relative z-10 py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Footer Logo -->
            <div class="text-center mb-16">
                <div class="inline-flex flex-col items-center space-y-4">
                    <div class="w-16 h-16 bg-contain bg-no-repeat"
                         style="background-image: url('<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2_2.png');">
                    </div>
                    <div class="text-center">
                        <p class="text-white font-montserrat font-bold text-sm tracking-wider uppercase mb-2">
                            <?php echo get_field('footer_title') ?: 'Green House'; ?>
                        </p>
                        <img src="<?php echo get_field('footer_tuwima_logo')['url'] ?? get_template_directory_uri() . '/html/images/tuwima_2.png'; ?>"
                             alt="Tuwima" class="h-5 mx-auto" />
                    </div>
                </div>
            </div>

            <!-- Footer Content Grid -->
            <div class="grid lg:grid-cols-4 gap-12 mb-16">

                <!-- About -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Green House Tuwima</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Nowoczesna inwestycja mieszkaniowa w spokojnej części Sosnowca.
                        28 mieszkań w 14 domach bliźniaczych z prywatnymi ogródkami.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center hover:bg-green-400 transition-colors">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center hover:bg-green-400 transition-colors">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center hover:bg-green-400 transition-colors">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Szybkie linki</h3>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-gray-300 hover:text-green-400 transition-colors">O inwestycji</a></li>
                        <li><a href="#location" class="text-gray-300 hover:text-green-400 transition-colors">Lokalizacja</a></li>
                        <li><a href="#apartments" class="text-gray-300 hover:text-green-400 transition-colors">Mieszkania</a></li>
                        <li><a href="#gallery" class="text-gray-300 hover:text-green-400 transition-colors">Galeria</a></li>
                        <li><a href="#financing" class="text-gray-300 hover:text-green-400 transition-colors">Finansowanie</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Kontakt</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-300">572 481 313</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-300">biuro@budraise.pl</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-300">ul. Wrocławska 54<br>40-217 Katowice</span>
                        </div>
                    </div>
                </div>

                <!-- Legal -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Informacje prawne</h3>
                    <div class="space-y-2 text-sm text-gray-300">
                        <p><strong>KRS:</strong> 0000912878</p>
                        <p><strong>NIP:</strong> 6431775795</p>
                        <p><strong>REGON:</strong> 389511621</p>
                    </div>
                    <div class="pt-4">
                        <a href="#" class="text-green-400 hover:text-green-300 text-sm underline transition-colors">
                            Polityka prywatności
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 mt-16">
                <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                    <p class="text-gray-400 text-sm">
                        © <?php echo date('Y'); ?> Budraise Invest. Wszelkie prawa zastrzeżone.
                    </p>

                    <div class="flex items-center space-x-6 text-sm text-gray-400">
                        <a href="#" class="hover:text-green-400 transition-colors">Regulamin</a>
                        <a href="#" class="hover:text-green-400 transition-colors">Polityka prywatności</a>
                        <a href="#" class="hover:text-green-400 transition-colors">Cookies</a>
                    </div>
                </div>
            </div>

            <!-- Back to Top Button -->
            <div class="fixed bottom-8 right-8 z-50">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                        class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-400 transition-all duration-300 transform hover:scale-110">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Gradient -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
</footer>
