<?php
/**
 * Simple test to verify WordPress is working
 * Access this at: http://localhost:3000/tuwima/wp-content/themes/future/test-wordpress.php
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if WordPress is loaded
if (function_exists('get_header')) {
    echo "<h1>✅ WordPress is working!</h1>";
    echo "<p>WordPress version: " . get_bloginfo('version') . "</p>";
    echo "<p>Site URL: " . get_site_url() . "</p>";
    echo "<p>Theme: " . get_template() . "</p>";
    
    // Check if ACF is active
    if (function_exists('get_field')) {
        echo "<p>✅ ACF is active and ready to use!</p>";
    } else {
        echo "<p>❌ ACF plugin is not installed or activated</p>";
    }
    
    echo "<hr>";
    echo "<h2>Next Steps:</h2>";
    echo "<ol>";
    echo "<li>Go to <a href='" . admin_url('post-new.php?post_type=page') . "'>Create New Page</a></li>";
    echo "<li>Select 'Green House Tuwima' template</li>";
    echo "<li>Fill in the ACF fields</li>";
    echo "<li>Publish the page</li>";
    echo "</ol>";
    
} else {
    echo "<h1>❌ WordPress is not properly loaded</h1>";
    echo "<p>Please check your WordPress installation.</p>";
}
?>
