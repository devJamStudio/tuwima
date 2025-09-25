<?php
/**
 * Template part for Green House price table section with price history
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get price table data from ACF fields
$price_table_title = get_field('price_table_title') ?: 'Cennik mieszkań';
$price_table_subtitle = get_field('price_table_subtitle') ?: 'Aktualne ceny i historia zmian';
$price_table_apartments = get_field('price_table_apartments');

// If no ACF data, create placeholder data
if (empty($price_table_apartments)) {
    $price_table_apartments = [
        [
            'number' => 'A 1.1',
            'rooms' => '4',
            'area' => '55',
            'garden_area' => '245',
            'current_price' => '450 000 zł',
            'price_per_m2' => '8 182 zł/m²',
            'status' => 'available',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '420 000 zł', 'change' => '+7.1%'],
                ['date' => '2023-12-01', 'price' => '410 000 zł', 'change' => '+2.4%'],
                ['date' => '2023-10-15', 'price' => '400 000 zł', 'change' => '+5.3%'],
            ]
        ],
        [
            'number' => 'A 1.2',
            'rooms' => '4',
            'area' => '55',
            'garden_area' => '245',
            'current_price' => '450 000 zł',
            'price_per_m2' => '8 182 zł/m²',
            'status' => 'reserved',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '420 000 zł', 'change' => '+7.1%'],
                ['date' => '2023-12-01', 'price' => '410 000 zł', 'change' => '+2.4%'],
                ['date' => '2023-10-15', 'price' => '400 000 zł', 'change' => '+5.3%'],
            ]
        ],
        [
            'number' => 'A 2.1',
            'rooms' => '3',
            'area' => '45',
            'garden_area' => '200',
            'current_price' => '380 000 zł',
            'price_per_m2' => '8 444 zł/m²',
            'status' => 'available',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '360 000 zł', 'change' => '+5.6%'],
                ['date' => '2023-12-01', 'price' => '350 000 zł', 'change' => '+2.9%'],
                ['date' => '2023-10-15', 'price' => '340 000 zł', 'change' => '+4.1%'],
            ]
        ],
        [
            'number' => 'A 2.2',
            'rooms' => '3',
            'area' => '45',
            'garden_area' => '200',
            'current_price' => '380 000 zł',
            'price_per_m2' => '8 444 zł/m²',
            'status' => 'available',
            'price_history' => [
                ['date' => '2024-01-15', 'price' => '360 000 zł', 'change' => '+5.6%'],
                ['date' => '2023-12-01', 'price' => '350 000 zł', 'change' => '+2.9%'],
                ['date' => '2023-10-15', 'price' => '340 000 zł', 'change' => '+4.1%'],
            ]
        ]
    ];
}

// Helper function to get status class
function get_status_class($status) {
    switch ($status) {
        case 'available':
            return 'status-available';
        case 'reserved':
            return 'status-reserved';
        case 'sold':
            return 'status-sold';
        default:
            return 'status-available';
    }
}

// Helper function to get status text for price table
function get_price_table_status_text($status) {
    switch ($status) {
        case 'available':
            return 'Dostępne';
        case 'reserved':
            return 'Zarezerwowane';
        case 'sold':
            return 'Sprzedane';
        default:
            return 'Dostępne';
    }
}
?>

<!-- Price Table Section -->
<section class="price-table-section" data-aos="fade-up">
    <div class="container">
        <div class="price-table-header">
            <h2 class="price-table-title"><?php echo esc_html($price_table_title); ?></h2>
            <p class="price-table-subtitle"><?php echo esc_html($price_table_subtitle); ?></p>
        </div>

        <div class="price-table-container">
            <div class="price-table-wrapper">
                <table class="price-table">
                    <thead>
                        <tr>
                            <th>Numer</th>
                            <th>Pokoje</th>
                            <th>Powierzchnia</th>
                            <th>Ogródek</th>
                            <th>Aktualna cena</th>
                            <th>Cena za m²</th>
                            <th>Status</th>
                            <th>Historia cen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($price_table_apartments as $apartment): ?>
                            <tr>
                                <td class="apartment-number"><?php echo esc_html($apartment['number']); ?></td>
                                <td><?php echo esc_html($apartment['rooms']); ?></td>
                                <td><?php echo esc_html($apartment['area']); ?> m²</td>
                                <td><?php echo esc_html($apartment['garden_area']); ?> m²</td>
                                <td class="current-price"><?php echo esc_html($apartment['current_price']); ?></td>
                                <td class="price-per-m2"><?php echo esc_html($apartment['price_per_m2']); ?></td>
                                <td>
                                    <span class="status-badge <?php echo get_status_class($apartment['status']); ?>">
                                        <?php echo get_price_table_status_text($apartment['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="price-history-btn" data-apartment="<?php echo esc_attr($apartment['number']); ?>">
                                        Zobacz historię
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Price History Modal -->
<div id="price-history-modal" class="price-history-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modal-title">Historia cen</h3>
            <span class="close-modal">&times;</span>
        </div>
        <div class="modal-body">
            <div id="price-history-content">
                <!-- Price history will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.price-table-section {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.price-table-header {
    text-align: center;
    margin-bottom: 50px;
}

.price-table-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.price-table-subtitle {
    font-size: 1.1rem;
    color: #666;
    margin: 0;
}

.price-table-container {
    overflow-x: auto;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.price-table-wrapper {
    min-width: 100%;
}

.price-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.price-table th {
    background-color: #00a906;
    color: white;
    padding: 20px 15px;
    text-align: left;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.price-table td {
    padding: 20px 15px;
    border-bottom: 1px solid #e9ecef;
    vertical-align: middle;
}

.price-table tbody tr:hover {
    background-color: #f8f9fa;
}

.apartment-number {
    font-weight: 600;
    color: #00a906;
}

.current-price {
    font-weight: bold;
    font-size: 16px;
    color: #333;
}

.price-per-m2 {
    color: #666;
    font-size: 13px;
}

.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-available {
    background-color: #d4edda;
    color: #155724;
}

.status-reserved {
    background-color: #fff3cd;
    color: #856404;
}

.status-sold {
    background-color: #f8d7da;
    color: #721c24;
}

.price-history-btn {
    background-color: #00a906;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.price-history-btn:hover {
    background-color: #008a05;
    transform: translateY(-1px);
}

/* Price History Modal */
.price-history-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 600px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    border-bottom: 1px solid #e9ecef;
    background-color: #00a906;
    color: white;
    border-radius: 12px 12px 0 0;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.5rem;
}

.close-modal {
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

.close-modal:hover {
    opacity: 0.7;
}

.modal-body {
    padding: 30px;
}

.price-history-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #e9ecef;
}

.price-history-item:last-child {
    border-bottom: none;
}

.price-history-date {
    font-weight: 600;
    color: #333;
}

.price-history-price {
    font-weight: bold;
    color: #00a906;
}

.price-history-change {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
}

.price-history-change.positive {
    background-color: #d4edda;
    color: #155724;
}

.price-history-change.negative {
    background-color: #f8d7da;
    color: #721c24;
}

/* Responsive Design */
@media (max-width: 768px) {
    .price-table-section {
        padding: 40px 0;
    }

    .price-table-title {
        font-size: 2rem;
    }

    .price-table th,
    .price-table td {
        padding: 12px 8px;
        font-size: 12px;
    }

    .price-table th {
        font-size: 11px;
    }

    .modal-content {
        width: 95%;
        margin: 10% auto;
    }

    .modal-header {
        padding: 15px 20px;
    }

    .modal-body {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .price-table {
        font-size: 11px;
    }

    .price-table th,
    .price-table td {
        padding: 8px 4px;
    }

    .current-price {
        font-size: 14px;
    }

    .price-per-m2 {
        font-size: 11px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('price-history-modal');
    const closeBtn = document.querySelector('.close-modal');
    const historyBtns = document.querySelectorAll('.price-history-btn');

    // Price history data from PHP
    const priceHistoryData = <?php echo json_encode(array_column($price_table_apartments, 'price_history', 'number')); ?>;

    // Open modal
    historyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const apartmentNumber = this.getAttribute('data-apartment');
            const history = priceHistoryData[apartmentNumber] || [];

            document.getElementById('modal-title').textContent = `Historia cen - ${apartmentNumber}`;

            const content = document.getElementById('price-history-content');
            content.innerHTML = '';

            if (history.length === 0) {
                content.innerHTML = '<p>Brak danych o historii cen.</p>';
            } else {
                history.forEach(item => {
                    const changeClass = item.change.startsWith('+') ? 'positive' : 'negative';
                    content.innerHTML += `
                        <div class="price-history-item">
                            <span class="price-history-date">${item.date}</span>
                            <span class="price-history-price">${item.price}</span>
                            <span class="price-history-change ${changeClass}">${item.change}</span>
                        </div>
                    `;
                });
            }

            modal.style.display = 'block';
        });
    });

    // Close modal
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
</script>
