<?php
/**
 * Template part for Green House garden section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="row-34 group">
    <img class="layer-9" src="<?php echo get_field('garden_image')['url'] ?? get_template_directory_uri() . '/html/images/3.jpg'; ?>" alt="" width="747" height="686">
    <div class="col-46">
        <p class="text-34"><?php echo get_field('garden_title') ?: 'Mieszkanie<br>z własnym ogródkiem'; ?></p>
        <p class="text-35"><?php echo get_field('garden_description') ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br><span class="text-style-7">&nbsp;</span><br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'; ?></p>
        <div class="btn-kopia-3">
            <?php echo get_field('garden_button_text') ?: 'Zobacz mieszkania'; ?>
        </div>
    </div>
</div>

