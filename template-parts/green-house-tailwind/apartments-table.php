<?php
/**
 * Template part for Green House apartments table (Tailwind)
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Sample apartment data - replace with ACF fields or database
$apartments = [
    ['number' => 'A 1.1', 'rooms' => 4, 'area' => 55, 'garden' => 245, 'status' => 'available', 'price' => 'Zapytaj o cenę'],
    ['number' => 'A 1.2', 'rooms' => 3, 'area' => 48, 'garden' => 0, 'status' => 'reserved', 'price' => 'Rezerwacja'],
    ['number' => 'A 2.1', 'rooms' => 4, 'area' => 62, 'garden' => 280, 'status' => 'available', 'price' => 'Zapytaj o cenę'],
    ['number' => 'A 2.2', 'rooms' => 2, 'area' => 35, 'garden' => 0, 'status' => 'sold', 'price' => 'Sprzedane'],
    ['number' => 'B 1.1', 'rooms' => 3, 'area' => 52, 'garden' => 200, 'status' => 'available', 'price' => 'Zapytaj o cenę'],
    ['number' => 'B 1.2', 'rooms' => 4, 'area' => 68, 'garden' => 0, 'status' => 'reserved', 'price' => 'Rezerwacja'],
];
?>

<section class="py-20 lg:py-32 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-green-500 mb-6">
                Dostępne mieszkania
            </h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Sprawdź dostępność i szczegóły wszystkich mieszkań w inwestycji Green House Tuwima
            </p>
        </div>

        <!-- Filters -->
        <div class="mb-12">
            <div class="flex flex-wrap justify-center gap-4">
                <button class="filter-btn active bg-green-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-600 transition-colors" data-filter="all">
                    Wszystkie
                </button>
                <button class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border border-gray-300 hover:bg-gray-50 transition-colors" data-filter="available">
                    Dostępne
                </button>
                <button class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border border-gray-300 hover:bg-gray-50 transition-colors" data-filter="reserved">
                    Zarezerwowane
                </button>
                <button class="filter-btn bg-white text-gray-700 px-6 py-3 rounded-full font-semibold border border-gray-300 hover:bg-gray-50 transition-colors" data-filter="with-garden">
                    Z ogródkiem
                </button>
            </div>
        </div>

        <!-- Desktop Table -->
        <div class="hidden lg:block bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Table Header -->
            <div class="bg-green-500 text-white">
                <div class="grid grid-cols-7 gap-4 p-6 font-bold text-center">
                    <div>Numer</div>
                    <div>Pokoje</div>
                    <div>Powierzchnia</div>
                    <div>Powierzchnia ogródka</div>
                    <div>Dostępność</div>
                    <div>Cena</div>
                    <div>Plan</div>
                </div>
            </div>

            <!-- Table Body -->
            <div class="divide-y divide-gray-200">
                <?php foreach ($apartments as $index => $apt): ?>
                <div class="apartment-row grid grid-cols-7 gap-4 p-6 hover:bg-gray-50 transition-colors"
                     data-status="<?php echo $apt['status']; ?>"
                     data-garden="<?php echo $apt['garden'] > 0 ? 'true' : 'false'; ?>">

                    <!-- Number -->
                    <div class="text-center font-montserrat font-semibold text-gray-900">
                        <?php echo $apt['number']; ?>
                    </div>

                    <!-- Rooms -->
                    <div class="text-center font-montserrat font-semibold text-gray-900">
                        <?php echo $apt['rooms']; ?>
                    </div>

                    <!-- Area -->
                    <div class="text-center font-montserrat font-semibold text-gray-900">
                        <?php echo $apt['area']; ?>m²
                    </div>

                    <!-- Garden -->
                    <div class="text-center font-montserrat font-semibold text-gray-900">
                        <?php echo $apt['garden'] > 0 ? $apt['garden'] . 'm²' : '-'; ?>
                    </div>

                    <!-- Status -->
                    <div class="text-center">
                        <?php if ($apt['status'] === 'available'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                Dostępne
                            </span>
                        <?php elseif ($apt['status'] === 'reserved'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                Zarezerwowane
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                Sprzedane
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Price -->
                    <div class="text-center">
                        <?php if ($apt['status'] === 'available'): ?>
                            <button class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                                <?php echo $apt['price']; ?>
                            </button>
                        <?php else: ?>
                            <span class="text-gray-500 font-semibold">
                                <?php echo $apt['price']; ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Plan -->
                    <div class="text-center">
                        <button class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                            Zobacz plan
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Mobile Cards -->
        <div class="lg:hidden space-y-6">
            <?php foreach ($apartments as $index => $apt): ?>
            <div class="apartment-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300"
                 data-status="<?php echo $apt['status']; ?>"
                 data-garden="<?php echo $apt['garden'] > 0 ? 'true' : 'false'; ?>">

                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-gray-900"><?php echo $apt['number']; ?></h3>

                        <?php if ($apt['status'] === 'available'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                Dostępne
                            </span>
                        <?php elseif ($apt['status'] === 'reserved'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                Zarezerwowane
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                Sprzedane
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-500"><?php echo $apt['rooms']; ?></div>
                            <div class="text-sm text-gray-600">pokoje</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-500"><?php echo $apt['area']; ?>m²</div>
                            <div class="text-sm text-gray-600">powierzchnia</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-500">
                                <?php echo $apt['garden'] > 0 ? $apt['garden'] . 'm²' : '-'; ?>
                            </div>
                            <div class="text-sm text-gray-600">ogródek</div>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <?php if ($apt['status'] === 'available'): ?>
                            <button class="flex-1 bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                                <?php echo $apt['price']; ?>
                            </button>
                        <?php else: ?>
                            <button class="flex-1 bg-gray-300 text-gray-600 py-3 rounded-lg font-semibold cursor-not-allowed">
                                <?php echo $apt['price']; ?>
                            </button>
                        <?php endif; ?>

                        <button class="flex-1 bg-white border-2 border-green-500 text-green-500 py-3 rounded-lg font-semibold hover:bg-green-500 hover:text-white transition-colors">
                            Zobacz plan
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Summary Stats -->
        <div class="mt-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-8 lg:p-12 text-white">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold mb-4">Podsumowanie oferty</h3>
                <p class="text-green-100">Aktualne dane o dostępności mieszkań</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">
                        <?php echo count(array_filter($apartments, function($apt) { return $apt['status'] === 'available'; })); ?>
                    </div>
                    <div class="text-green-100">Dostępne</div>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">
                        <?php echo count(array_filter($apartments, function($apt) { return $apt['status'] === 'reserved'; })); ?>
                    </div>
                    <div class="text-green-100">Zarezerwowane</div>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">
                        <?php echo count(array_filter($apartments, function($apt) { return $apt['garden'] > 0; })); ?>
                    </div>
                    <div class="text-green-100">Z ogródkiem</div>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">
                        <?php echo min(array_column($apartments, 'area')); ?>-<?php echo max(array_column($apartments, 'area')); ?>m²
                    </div>
                    <div class="text-green-100">Zakres powierzchni</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const apartmentRows = document.querySelectorAll('.apartment-row');
    const apartmentCards = document.querySelectorAll('.apartment-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-green-500', 'text-white');
                b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
            });
            btn.classList.add('active', 'bg-green-500', 'text-white');
            btn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');

            const filter = btn.dataset.filter;

            // Filter apartments
            [...apartmentRows, ...apartmentCards].forEach(item => {
                let show = true;

                if (filter === 'available') {
                    show = item.dataset.status === 'available';
                } else if (filter === 'reserved') {
                    show = item.dataset.status === 'reserved';
                } else if (filter === 'with-garden') {
                    show = item.dataset.garden === 'true';
                }

                if (show) {
                    item.style.display = '';
                    item.classList.add('animate-fade-in');
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
