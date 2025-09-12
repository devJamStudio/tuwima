<?php
/**
 * Debug ACF Fields
 * Access this at: http://localhost:3000/tuwima/wp-content/themes/future/debug-acf.php
 */

// Load WordPress
require_once('../../../wp-load.php');

echo "<h1>ACF Debug Information</h1>";

// Check if ACF is active
if (function_exists('acf_add_local_field_group')) {
    echo "<p>✅ ACF is active and ready</p>";

    // Check if our field groups are registered
    global $wp_filter;
    if (isset($wp_filter['acf/init'])) {
        echo "<p>✅ ACF init hook is registered</p>";
    } else {
        echo "<p>❌ ACF init hook not found</p>";
    }

    // List all field groups
    $field_groups = acf_get_field_groups();
    echo "<h2>Registered Field Groups:</h2>";
    if ($field_groups) {
        foreach ($field_groups as $group) {
            echo "<p>- " . $group['title'] . " (Key: " . $group['key'] . ")</p>";
        }
    } else {
        echo "<p>No field groups found</p>";
    }

} else {
    echo "<p>❌ ACF plugin is not active</p>";
}

// Check current page template
if (is_page()) {
    $template = get_page_template();
    echo "<h2>Current Page Template:</h2>";
    echo "<p>" . $template . "</p>";
}

echo "<hr>";
echo "<h2>Next Steps:</h2>";
echo "<ol>";
echo "<li>Make sure ACF plugin is active</li>";
echo "<li>Create a page with 'Green House Tuwima' template</li>";
echo "<li>Edit that page to see ACF fields</li>";
echo "</ol>";
?>
