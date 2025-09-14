<?php
/**
 * Template part for Green House layout section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="row-17 flex flex-col lg:flex-row gap-10 justify-between">
    <div class="col-33">
        <p class="text-31"><?php echo get_field('layout_title') ?: 'Przemyślany<br>układ mieszkań'; ?></p>
        <p class="text-32"><?php echo get_field('layout_description') ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br><span class="text-style-7">&nbsp;</span><br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'; ?></p>
        <div class="btn-2">
            <?php echo get_field('layout_button_text') ?: 'Zobacz mieszkania'; ?>
        </div>
    </div>
    <img class="warstwa-63" src="<?php echo get_field('layout_image')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_63.png'; ?>" alt="" width="720" height="663">
</div>

