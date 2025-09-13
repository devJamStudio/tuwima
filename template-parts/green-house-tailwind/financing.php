<?php
/**
 * Template part for Green House financing section (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="financing" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Image Column -->
            <div class="relative order-2 lg:order-1">
                <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                    <img src="<?php echo get_template_directory_uri(); ?>/html/images/6_2.jpg"
                         alt="Finansowanie mieszkań"
                         class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500" />

                    <!-- Overlay with financing theme -->
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/20 via-transparent to-transparent"></div>

                    <!-- Money icon overlay -->
                    <div class="absolute top-6 right-6 w-16 h-16 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>

                <!-- Floating elements -->
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-500/10 rounded-full blur-xl"></div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-green-500/5 rounded-full blur-2xl"></div>
            </div>

            <!-- Content Column -->
            <div class="space-y-8 order-1 lg:order-2">
                <div class="space-y-6">
                    <div class="flex items-center space-x-4 mb-6">
                        <h2 class="text-4xl lg:text-5xl font-bold text-green-500">Finansowanie</h2>
                    </div>

                    <!-- Partner Logo -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 mb-8">
                        <img src="<?php echo get_template_directory_uri(); ?>/html/images/logo-poziom-nobg.png"
                             alt="Partner finansowy"
                             class="h-16 mx-auto object-contain" />
                    </div>

                    <div class="text-gray-700 leading-relaxed text-lg space-y-4">
                        <p>
                            Proces zakupu domu może wydawać się bardzo skomplikowany, ale możecie Państwo liczyć na naszą pomoc.
                            Oferujemy pełne wsparcie przy pozyskaniu kredytu hipotecznego, który pozwoli Wam na wprowadzenie się do nowego domu.
                        </p>

                        <p>
                            Wybór odpowiedniego finansowania nieruchomości jest równie ważny co wybór samego domu.
                            Posiadamy wiedzę oraz doświadczenie kredytowe, które pozwoli na szybkie znalezienie dla Państwa najkorzystniejszego rozwiązania kredytowego.
                        </p>

                        <p>
                            Dodatkowo współpracujemy z dedykowanym biurem doradztwa kredytowego <strong class="text-green-600">Silesia Capital – Eksperci Kredytowi</strong>,
                            w którym to zespół doświadczonych Doradców Kredytowych chętnie udzieli odpowiedzi na Państwa pytania.
                        </p>
                    </div>
                </div>

                <!-- Financing Features -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Nasza pomoc w finansowaniu:</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Doradztwo kredytowe</h4>
                                <p class="text-gray-600">Pomoc w wyborze najlepszego kredytu</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Przygotowanie dokumentów</h4>
                                <p class="text-gray-600">Wsparcie w kompletowaniu wniosku</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Kontakt z bankami</h4>
                                <p class="text-gray-600">Negocjacje warunków kredytowych</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Obsługa do końca</h4>
                                <p class="text-gray-600">Wsparcie aż do podpisania umowy</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financing Options -->
                <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Dostępne opcje finansowania:</h4>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Kredyt hipoteczny</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Kredyt mieszkaniowy</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Dopłaty z programów</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Finansowanie własne</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 pt-4">
                    <button class="flex-1 bg-green-500 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Skontaktuj się
                    </button>

                    <button class="flex-1 bg-white border-2 border-green-500 text-green-500 px-8 py-4 rounded-xl font-bold text-lg hover:bg-green-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Kalkulator kredytowy
                    </button>
                </div>
            </div>
        </div>

        <!-- Partner Banks -->
        <div class="mt-20 bg-gray-50 rounded-2xl p-8 lg:p-12">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Współpracujemy z bankami</h3>
                <p class="text-gray-600">Najlepsze warunki kredytowe dla naszych klientów</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
                <!-- Bank logos would go here -->
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">PKO BP</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">mBank</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">ING</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">Millennium</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">Santander</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg flex items-center justify-center h-20">
                    <div class="text-gray-400 font-bold">Credit Agricole</div>
                </div>
            </div>
        </div>

        <!-- Financing Calculator -->
        <div class="mt-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-8 lg:p-12 text-white">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold mb-4">Kalkulator kredytowy</h3>
                <p class="text-green-100">Sprawdź orientacyjną wysokość raty</p>
            </div>

            <div class="max-w-2xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-green-100">Cena mieszkania</label>
                        <input type="number" id="apartment-price" placeholder="500000"
                               class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-green-100">Wkład własny</label>
                        <input type="number" id="down-payment" placeholder="100000"
                               class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-white/50 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-green-100">Okres kredytowania</label>
                        <select id="loan-period"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white focus:ring-2 focus:ring-white/50 focus:border-transparent">
                            <option value="15">15 lat</option>
                            <option value="20">20 lat</option>
                            <option value="25" selected>25 lat</option>
                            <option value="30">30 lat</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button onclick="calculateLoan()"
                            class="bg-white text-green-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-green-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Oblicz ratę
                    </button>

                    <div id="loan-result" class="mt-6 p-4 bg-white/10 backdrop-blur-sm rounded-lg hidden">
                        <div class="text-2xl font-bold mb-2">Orientacyjna rata:</div>
                        <div id="monthly-payment" class="text-4xl font-bold text-green-200"></div>
                        <div class="text-sm text-green-100 mt-2">*Kalkulacja orientacyjna, oprocentowanie 7%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function calculateLoan() {
    const price = parseFloat(document.getElementById('apartment-price').value) || 500000;
    const downPayment = parseFloat(document.getElementById('down-payment').value) || 100000;
    const years = parseInt(document.getElementById('loan-period').value) || 25;

    const loanAmount = price - downPayment;
    const monthlyRate = 0.07 / 12; // 7% annual rate
    const numberOfPayments = years * 12;

    const monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, numberOfPayments)) /
                          (Math.pow(1 + monthlyRate, numberOfPayments) - 1);

    document.getElementById('monthly-payment').textContent =
        new Intl.NumberFormat('pl-PL', { style: 'currency', currency: 'PLN' }).format(monthlyPayment);

    document.getElementById('loan-result').classList.remove('hidden');
    document.getElementById('loan-result').classList.add('animate-fade-in');
}
</script>
