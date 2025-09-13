<?php
/**
 * Template part for Green House developer section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="o-developerze group">
    <div class="col-9">
        <img class="text-140" src="<?php echo get_field('developer_title_image')['url'] ?? get_template_directory_uri() . '/html/images/o_developerze.png'; ?>" alt="O developerze" width="257" height="37" title="O developerze">
        <p class="text-141"><?php echo get_field('developer_description') ?: 'Tworzymy nieruchomości, które spełniają oczekiwania wymagających klientów. Stawiamy na jakość naszych realizacji. Współpracujemy z doświadczonym biurem projektowym dzięki czemu nasze nieruchomości są nowoczesne i praktyczne. <br><span class="text-style-12">&nbsp;</span><br>Realizację projektów powierzamy firmom budowlanym o ugruntowanej pozycji na rynku. Misją naszej firmy jest to, aby oddawać w ręce naszych klientów nieruchomości, które dają znaczący komfort życia codziennego.'; ?></p>
    </div>
    <img class="layer-22" src="<?php echo get_field('developer_image')['url'] ?? get_template_directory_uri() . '/html/images/5.jpg'; ?>" alt="" width="747" height="686">
</div>




