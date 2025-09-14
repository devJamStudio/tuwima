<?php
/**
 * Template part for Green House apartments table section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get apartments data from ACF fields
// ACF Field: apartments_table (repeater)
// Sub-fields: number, rooms, area, garden_area, status, price_action, plan_link
$apartments_data = get_field('apartments_table');

// If no ACF data, create placeholder data (same item repeated)
if (empty($apartments_data)) {
    $placeholder_apartment = [
        'number' => 'A 1.1',
        'rooms' => '4',
        'area' => '55',
        'garden_area' => '245',
        'status' => 'available',
        'price_action' => 'Zapytaj o cenę',
        'plan_link' => '#'
    ];

    // Create 8 apartments with the same data (alternating status)
    $apartments_data = [];
    for ($i = 0; $i < 8; $i++) {
        $apartment = $placeholder_apartment;
        $apartment['number'] = 'A ' . (floor($i / 2) + 1) . '.' . (($i % 2) + 1);
        $apartment['status'] = ($i % 2 == 0) ? 'available' : 'reserved';
        $apartment['price_action'] = ($i % 2 == 0) ? 'Zapytaj o cenę' : 'Rezerwacja';
        $apartments_data[] = $apartment;
    }
}

// Debug: Ensure we have data
if (empty($apartments_data)) {
    $apartments_data = [
        [
            'number' => 'A 1.1',
            'rooms' => '4',
            'area' => '55',
            'garden_area' => '245',
            'status' => 'available',
            'price_action' => 'Zapytaj o cenę',
            'plan_link' => '#'
        ]
    ];
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
.apartments-table {
    width: 100%;
    max-width: 1200px;
    margin: 75px auto 0;
    border-collapse: collapse;
    font-family: Montserrat, sans-serif;
}

.apartments-table th {
    background-color: #00a906;
    color: #ffffff;
    padding: 20px 15px;
    text-align: left;
    font-weight: bold;
    font-size: 16px;
    border: none;
    font-family: Montserrat, sans-serif;
    height: 80px;
    vertical-align: middle;
}

.apartments-table td {
    padding: 20px 15px;
    border: none;
    font-size: 14px;
}

.apartments-table tbody tr {
    height: 80px;
}

.apartments-table tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

.apartments-table tbody tr:nth-child(even) {
    background-color: #f5f5f5;
}

.apartments-table .status-available {
    color: #00a906;
    font-weight: bold;
}

.apartments-table .status-reserved {
    color: #ff6b35;
    font-weight: bold;
}

.apartments-table .plan-link {
    color: #00a906;
    text-decoration: none;
    font-weight: bold;
}

.apartments-table .plan-link:hover {
    text-decoration: underline;
}

.apartments-table .number {
    font-weight: bold;
    color: #333;
}

.apartments-table .area {
    color: #666;
}
</style>

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
                    <td data-label="Cena"><?php echo esc_html($apartment['price_action']); ?></td>
                    <td data-label="Plan">
                        <a href="<?php echo esc_url($apartment['plan_link']); ?>" class="plan-link">Zobacz plan</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
