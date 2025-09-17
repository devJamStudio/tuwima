<?php
/**
 * Script to update all image paths in green-house template parts
 * Run this once to update all template parts to use the new helper function
 */

// Get all PHP files in the green-house template parts directory
$template_dir = __DIR__ . '/template-parts/green-house/';
$files = glob($template_dir . '*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Replace get_template_directory_uri() . '/html/images/' with green_house_image_url()
    $pattern = '/get_template_directory_uri\(\)\s*\.\s*[\'"]\/html\/images\/([^\'"]+)[\'"]/';
    $replacement = 'green_house_image_url(\'$1\')';
    
    $updated_content = preg_replace($pattern, $replacement, $content);
    
    // Also handle cases with get_field fallbacks
    $pattern2 = '/get_template_directory_uri\(\)\s*\.\s*[\'"]\/html\/images\/([^\'"]+)[\'"]/';
    $replacement2 = 'green_house_image_url(\'$1\')';
    
    $updated_content = preg_replace($pattern2, $replacement2, $updated_content);
    
    if ($updated_content !== $content) {
        file_put_contents($file, $updated_content);
        echo "Updated: " . basename($file) . "\n";
    }
}

echo "Image path update completed!\n";
?>
