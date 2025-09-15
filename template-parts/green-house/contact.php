<?php
/**
 * Template part for Green House contact section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="kontakt group" id="kontakt">
    <p class="text-142"><?php echo get_field('contact_company_name') ?: 'Siedziba główna <span class="color000000">BUDRAISE INVEST</span>'; ?></p>
    <div class="row-19 group">
        <img class="budraise_invest_wh" src="<?php echo get_field('contact_logo')['url'] ?? get_template_directory_uri() . '/html/images/budraise_invest_wh.png'; ?>" alt="" width="374" height="87">
        <div class="col-41">
            <div class="row-26 group">
                <img class="locator-mark-of-map-and-location-pin-on-transparent-background-free-png" src="<?php echo get_template_directory_uri(); ?>/html/images/locator-mark-of-map-and-l.png" alt="" width="16" height="23">
                <p class="text-143"><?php echo get_field('contact_address') ?: 'ul. Wrocławska 54<br>40-217 Katowice<br><span class="color00a906">Zobacz dojazd</span>'; ?></p>
            </div>
            <div class="row-27 group">
                <img class="layer-23" src="<?php echo get_template_directory_uri(); ?>/html/images/736212.png" alt="" width="20" height="18">
                <p class="text-144"><?php echo get_field('contact_email') ?: 'biuro@budraise.pl'; ?></p>
            </div>
        </div>
        <p class="text-145"><?php echo get_field('contact_company_details') ?: '<strong class="fw700">Krs: </strong>0000912878<br><strong class="fw700">Nip:</strong> 6431775795<br><strong class="fw700">Regon: </strong>389511621'; ?></p>
    </div>
    <div class="wrapper-11">
        <img class="warstwa-56" src="<?php echo get_field('agent_1_photo')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_56.jpg'; ?>" alt="" width="463" height="463">
        <div class="col">
            <p class="text-146"><?php echo get_field('agent_1_name') ?: 'Rafał Banarski'; ?></p>
            <p class="text-147"><?php echo get_field('agent_1_phone') ?: '572 481 313'; ?></p>
        </div>
        <img class="warstwa-57" src="<?php echo get_field('agent_2_photo')['url'] ?? get_template_directory_uri() . '/html/images/warstwa_57.jpg'; ?>" alt="" width="463" height="463">
        <div class="col-2">
            <p class="text-148"><?php echo get_field('agent_2_name') ?: 'Mariusz Szyda'; ?></p>
            <p class="text-149"><?php echo get_field('agent_2_phone') ?: '453 287 744'; ?></p>
        </div>
    </div>
</section>





