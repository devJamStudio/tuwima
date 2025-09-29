<?php
/**
 * Template part for Green House apartments table section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get AOS attributes from global
$aos_direction = $GLOBALS['current_section_aos']['direction'] ?? 'fade-up';
$aos_delay = $GLOBALS['current_section_aos']['delay'] ?? 200;

// Get apartments data from ACF fields
$apartments_data = get_field('apartments_list');
$table_title = get_field('apartments_table_title') ?: 'Dostępne mieszkania';

// Debug: Check if ACF data exists
if (empty($apartments_data)) {
    // Add debug notice for admin
    if (current_user_can('manage_options')) {
        echo '<!-- DEBUG: No ACF apartments data found, using fallback data -->';
    }
    // If no ACF data, create sample data for testing
    $apartments_data = [
        [
            'number' => 'A 1.1',
            'rooms' => '4',
            'area' => '55',
            'garden_area' => '245',
            'status' => 'available',
            'current_price' => '450 000 PLN',
            'price_per_sqm' => '8 182 PLN/m²',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '430 000 PLN', 'price_per_sqm' => '7 818 PLN/m²'],
                ['date' => '2024-02-01', 'price' => '440 000 PLN', 'price_per_sqm' => '8 000 PLN/m²'],
                ['date' => '2024-03-01', 'price' => '450 000 PLN', 'price_per_sqm' => '8 182 PLN/m²']
            ],
            'plan_image' => get_template_directory_uri() . '/html/images/plan-placeholder.jpg',
            'plan_pdf' => '#',
            'contact_email' => 'biuro@budraise.pl'
        ],
        [
            'number' => 'A 1.2',
            'rooms' => '3',
            'area' => '45',
            'garden_area' => '200',
            'status' => 'reserved',
            'current_price' => '380 000 PLN',
            'price_per_sqm' => '8 444 PLN/m²',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '360 000 PLN', 'price_per_sqm' => '8 000 PLN/m²'],
                ['date' => '2024-02-01', 'price' => '370 000 PLN', 'price_per_sqm' => '8 222 PLN/m²'],
                ['date' => '2024-03-01', 'price' => '380 000 PLN', 'price_per_sqm' => '8 444 PLN/m²']
            ],
            'plan_image' => get_template_directory_uri() . '/html/images/plan-placeholder.jpg',
            'plan_pdf' => '#',
            'contact_email' => 'biuro@budraise.pl'
        ]
    ];
} else {
    // Add debug notice for admin when ACF data is found
    if (current_user_can('manage_options')) {
        echo '<!-- DEBUG: ACF apartments data found: ' . count($apartments_data) . ' apartments -->';
    }
}

// Helper function to get status image
function get_status_image($status) {
    $template_dir = get_template_directory_uri();
    switch ($status) {
        case 'available':
            return $template_dir . '/html/images/dost_pne_2.png';
        case 'reserved':
            return '';
        case 'sold':
            return '';
        default:
            return $template_dir . '/html/images/dost_pne_2.png';
    }
}

// Helper function to get status text
function get_status_text($status) {
    switch ($status) {
        case 'available':
            return 'Dostępne';
        case 'reserved':
            return 'Zarezerwowane';
        case 'sold':
            return 'Sprzedane';
        default:
            return '';
    }
}
?>

<!-- Apartments Table Section -->
<style>
.price-history-btn {
    background: #6c757d;
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    transition: background 0.3s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    height: 32px;
    margin-left: 8px;
}

.price-history-btn:hover {
    background: #5a6268;
}

.price-display {
    display: flex;
    align-items: center;
    gap: 8px;
}

.current-price {
    font-weight: 600;
    color: #333;
}

.price-per-sqm {
    font-size: 12px;
    color: #666;
}

/* Modal Styles */
.apartment-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-header {
    background: #00a906;
    color: white;
    padding: 1.5rem;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.close-modal {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.close-modal:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.modal-body {
    padding: 2rem;
}

.price-history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

.price-history-table th,
.price-history-table td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.price-history-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #495057;
}
</style>

<section class="apartments-table-section" data-aos="<?php echo $aos_direction; ?>" data-aos-delay="<?php echo $aos_delay; ?>">
<div class="apartments-table-container">
    <table class="apartments-table">
        <thead>
            <tr>
                <th>Numer</th>
                <th>Pokoje</th>
                <th>Pow</th>
                <th>Pow ogóródka</th>
                <th>Dosteność</th>
                <th>Cena</th>
                <th>Plan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apartments_data as $index => $apartment): ?>
                <tr>
                    <td class="number" data-label="Numer"><?php echo esc_html($apartment['number']); ?></td>
                    <td data-label="Pokoje"><?php echo esc_html($apartment['rooms']); ?></td>
                    <td class="area" data-label="Pow"><?php echo esc_html($apartment['area']); ?> m²</td>
                    <td class="area" data-label="Pow ogóródka"><?php echo esc_html($apartment['garden_area']); ?> m²</td>
                    <td data-label="Dosteność">
                        <?php if ($apartment['status'] === 'available'): ?>
                            <span class="status-available"><?php echo get_status_text($apartment['status']); ?></span>
                        <?php else: ?>
                            <span class="status-reserved"><?php echo get_status_text($apartment['status']); ?></span>
                        <?php endif; ?>
                    </td>
                    <td data-label="Cena">
                        <div class="price-display">
                            <div>
                                <div class="current-price"><?php echo esc_html($apartment['current_price']); ?></div>
                                <div class="price-per-sqm"><?php echo esc_html($apartment['price_per_sqm']); ?></div>
                            </div>
                            <button class="price-history-btn" onclick="openPriceHistory('<?php echo esc_js($apartment['number']); ?>')" title="Historia cen">
                                <i class="fas fa-history"></i>
                            </button>
                        </div>
                    </td>
                    <td data-label="Plan">
                        <a href="<?php echo esc_url($apartment['plan_image']); ?>" class="plan-link" target="_blank">Zobacz plan</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Price History Modal -->
<div id="priceHistoryModal" class="apartment-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Historia cen - Mieszkanie <span id="priceHistoryApartmentNumber"></span></h3>
            <button class="close-modal" onclick="closeModal('priceHistoryModal')" type="button">&times;</button>
        </div>
        <div class="modal-body">
            <table class="price-history-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Cena</th>
                        <th>Cena/m²</th>
                        <th>Zmiana</th>
                    </tr>
                </thead>
                <tbody id="priceHistoryTableBody">
                    <!-- Price history data will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// ACF Data from PHP
const apartmentsData = <?php echo json_encode($apartments_data); ?>;
console.log('Apartments data:', apartmentsData);

// Process ACF data for JavaScript
const priceHistoryData = {};

apartmentsData.forEach(apartment => {
    const number = apartment.number;
    console.log('Processing apartment:', number, apartment);

    // Process price history - handle both ACF structure and fallback
    if (apartment.price_history && apartment.price_history.length > 0) {
        priceHistoryData[number] = apartment.price_history.map((entry, index) => {
            // Calculate percentage change
            let change = '0%';
            if (index > 0) {
                const prevPrice = parseFloat(apartment.price_history[index - 1].price.replace(/[^\d]/g, ''));
                const currentPrice = parseFloat(entry.price.replace(/[^\d]/g, ''));
                if (prevPrice > 0) {
                    const percentChange = ((currentPrice - prevPrice) / prevPrice) * 100;
                    change = (percentChange > 0 ? '+' : '') + percentChange.toFixed(1) + '%';
                }
            }

            return {
                date: entry.date,
                price: entry.price,
                pricePerSqm: entry.price_per_sqm || entry.pricePerSqm,
                change: change
            };
        });
    } else {
        // Add default price history if none exists
        priceHistoryData[number] = [
            {
                date: '2024-01-15',
                price: '430 000 PLN',
                pricePerSqm: '7 818 PLN/m²',
                change: '0%'
            },
            {
                date: '2024-02-01',
                price: '440 000 PLN',
                pricePerSqm: '8 000 PLN/m²',
                change: '+2.3%'
            },
            {
                date: '2024-03-01',
                price: apartment.current_price || '450 000 PLN',
                pricePerSqm: apartment.price_per_sqm || '8 182 PLN/m²',
                change: '+2.3%'
            }
        ];
    }
});

console.log('Price history data:', priceHistoryData);

function openPriceHistory(apartmentNumber) {
    console.log('Opening price history for:', apartmentNumber);

    // Fix null apartment number
    const displayNumber = apartmentNumber || 'Unknown';
    document.getElementById('priceHistoryApartmentNumber').textContent = displayNumber;

    const history = priceHistoryData[apartmentNumber] || [];
    const tableBody = document.getElementById('priceHistoryTableBody');

    if (history.length > 0) {
        tableBody.innerHTML = history.map(item => `
            <tr>
                <td>${item.date}</td>
                <td>${item.price}</td>
                <td>${item.pricePerSqm}</td>
                <td style="color: #28a745;">${item.change}</td>
            </tr>
        `).join('');
    } else {
        tableBody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #6c757d;">Brak danych historycznych</td></tr>';
    }

    document.getElementById('priceHistoryModal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeModal(modalId) {
    console.log('Closing modal:', modalId);
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('.apartment-modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
        }
    });
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('.apartment-modal');
        modals.forEach(modal => {
            if (modal.style.display === 'block') {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
        });
    }
});
</script>
</section>
