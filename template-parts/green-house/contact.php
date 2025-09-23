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
    <p class="text-142"><?php echo get_field('contact_title') ?: 'Siedziba główna <span class="color000000">BUDRAISE INVEST</span>'; ?></p>
    <div class="row-19 group">
        <img class="budraise_invest_wh" src="<?php echo get_field('contact_company_logo')['url'] ?? get_template_directory_uri() . '/html/images/budraise_invest_wh.png'; ?>" alt="" width="374" height="87">
        <div class="col-41">
            <div class="row-26 group">
                <img class="locator-mark-of-map-and-location-pin-on-transparent-background-free-png" src="<?php echo get_template_directory_uri(); ?>/html/images/locator-mark-of-map-and-l.png" alt="" width="16" height="23">
                <p class="text-143"><?php echo get_field('contact_info')['address'] ?? 'ul. Wrocławska 54<br>40-217 Katowice<br><a href="https://maps.google.com/?q=ul.+Wrocławska+54,+40-217+Katowice" target="_blank" class="color00a906">Zobacz dojazd</a>'; ?></p>
            </div>
            <div class="row-27 group">
                <img class="layer-23" src="<?php echo get_template_directory_uri(); ?>/html/images/736212.png" alt="" width="20" height="18">
                <p class="text-144"><a href="mailto:<?php echo get_field('contact_info')['email'] ?? 'biuro@budraise.pl'; ?>"><?php echo get_field('contact_info')['email'] ?? 'biuro@budraise.pl'; ?></a></p>
            </div>
        </div>
        <p class="text-145"><?php echo get_field('contact_info')['company_details'] ?? '<strong class="fw700">Krs: </strong>0000912878<br><strong class="fw700">Nip:</strong> 6431775795<br><strong class="fw700">Regon: </strong>389511621'; ?></p>
    </div>
    <div class="contact-wrapper">
        <div class="wrapper-11">
            <?php
            $contact_agents = get_field('contact_agents');
            if ($contact_agents && is_array($contact_agents)) {
                $agent_1 = $contact_agents[0] ?? null;
                $agent_2 = $contact_agents[1] ?? null;
            ?>
            <img class="warstwa-56" src="<?php echo $agent_1['photo']['url'] ?? get_template_directory_uri() . '/html/images/warstwa_56.jpg'; ?>" alt="" width="463" height="463">
            <div class="col">
                <p class="text-146"><?php echo $agent_1['name'] ?? 'Rafał Banarski'; ?></p>
                <p class="text-147"><a href="tel:<?php echo $agent_1['phone'] ?? '572481313'; ?>"><?php echo $agent_1['phone'] ?? '572 481 313'; ?></a></p>
            </div>
            <img class="warstwa-57" src="<?php echo $agent_2['photo']['url'] ?? get_template_directory_uri() . '/html/images/warstwa_57.jpg'; ?>" alt="" width="463" height="463">
            <div class="col-2">
                <p class="text-148"><?php echo $agent_2['name'] ?? 'Mariusz Szyda'; ?></p>
                <p class="text-149"><a href="tel:<?php echo $agent_2['phone'] ?? '453287744'; ?>"><?php echo $agent_2['phone'] ?? '453 287 744'; ?></a></p>
            </div>
            <?php } else { ?>
            <img class="warstwa-56" src="<?php echo get_template_directory_uri() . '/html/images/warstwa_56.jpg'; ?>" alt="" width="463" height="463">
            <div class="col">
                <p class="text-146">Rafał Banarski</p>
                <p class="text-147"><a href="tel:572481313">572 481 313</a></p>
            </div>
            <img class="warstwa-57" src="<?php echo get_template_directory_uri() . '/html/images/warstwa_57.jpg'; ?>" alt="" width="463" height="463">
            <div class="col-2">
                <p class="text-148">Mariusz Szyda</p>
                <p class="text-149"><a href="tel:453287744">453 287 744</a></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>





