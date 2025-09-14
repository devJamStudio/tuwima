<?php
/**
 * Template part for Green House header section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<header class="heder">
    <div class="baner">
        <div class="warstwa-47-holder">
            <div class="heder-2">
                <div class="row-5 group">
                    <div class="col-14">
                        <div class="logo">
                            <img class="warstwa-0-kopia-2" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_0_kopia_2.png" alt="" width="48" height="52">
                        </div>
                        <p class="text">Green House</p>
                        <img class="tuwima" src="<?php echo get_template_directory_uri(); ?>/html/images/tuwima.png" alt="tuwima" width="118" height="20" title="tuwima">
                    </div>
                    <div class="col-31">
                        <div class="wrapper-25">
                            <div class="layer"></div>
                            <div class="layer-holder mobile-hidden">napisz do nas</div>
                            <img class="warstwa-3 mobile-hidden" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_3.jpg" alt="" width="1632" height="51">
                            <img class="layer-2 mobile-hidden" src="<?php echo get_template_directory_uri(); ?>/html/images/666162.png" alt="" width="18" height="14">
                            <p class="text-3 mobile-hidden">453 287 744</p>
                            <p class="text-4 mobile-hidden">Mariusz Szyda</p>
                            <p class="text-5 mobile-hidden">572 481 313</p>
                            <p class="text-6 mobile-hidden">Rafał Banarski</p>
                            <img class="warstwa-50 mobile-hidden" src="<?php echo get_template_directory_uri() ?>/html/images/warstwa_50.png" alt="" width="41" height="41">
                            <nav class="nav-2">
                                <ul class="nav-list-2 group">
                                    <li><p class="nav-item-1-2 text-item selected"><a href="#">O inwestycji</a></p></li>
                                    <li><p class="nav-item-3 text-item"><a href="#">Lokalizacja</a></p></li>
                                    <li><p class="nav-item-3-2 text-item"><a href="#">Mieszkania</a></p></li>
                                    <li><p class="nav-item-3-3 text-item"><a href="#">Galeria</a></p></li>
                                    <li><p class="nav-item-3-4 text-item"><a href="#">Finansowanie</a></p></li>
                                    <li><p class="nav-item-3-5 text-item"><a href="#">kontakt</a></p></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="warstwa-46"></div>
                    </div>
                </div>
                <div class="baner-2 group">
                    <p class="text-7"><?php echo get_field('hero_title') ?: 'Green House<br class="text-style"><strong class="text-style-2">tuwima</strong>'; ?></p>
                    <p class="text-8"><?php echo get_field('hero_subtitle') ?: 'Najlepsza inwestycja w Twoją przyszłosć'; ?></p>
                </div>
                <div class="grupa-8">
                    <?php echo get_field('hero_button_text') ?: 'Zobacz mieszkania'; ?>
                </div>
                <div class="grupa-7 group">
                    <p class="text-10"><strong class="text-style-4"><?php echo get_field('stat_1_number') ?: '06.2026'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_1_label') ?: 'Planowane<br>zakończenie'; ?></p>
                    <div class="warstwa-48"></div>
                    <p class="text-11"><strong class="text-style-4"><?php echo get_field('stat_2_number') ?: '14'; ?></strong><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_2_label') ?: 'Liczba<br>budynków'; ?></p>
                    <div class="warstwa-48-kopia"></div>
                    <p class="text-12"><span class="text-style-6"><?php echo get_field('stat_3_number') ?: '28'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_3_label') ?: 'Ilość<br>mieszkań'; ?></p>
                    <div class="warstwa-48-kopia-2"></div>
                    <p class="text-13"><span class="text-style-6"><?php echo get_field('stat_4_number') ?: '35-49m²'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_4_label') ?: 'Dostene<br>metraże'; ?></p>
                    <div class="warstwa-48-kopia-3"></div>
                    <p class="text-14"><span class="text-style-6"><?php echo get_field('stat_5_number') ?: '40'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_5_label') ?: 'Miejsca<br>parkingowe'; ?></p>
                    <div class="warstwa-48-kopia-4"></div>
                    <p class="text-15"><span class="text-style-6"><?php echo get_field('stat_6_number') ?: '9'; ?></span><br class="text-style-3">&nbsp;<span class="text-style-5">&nbsp;</span><br><?php echo get_field('stat_6_label') ?: 'Liczba<br>ogóodków'; ?></p>
                </div>
            </div>
        </div>
    </div>
</header>

