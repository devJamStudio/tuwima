<?php
/**
 * Template part for Green House apartments table section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="tabela">
    <div class="table-container">
        <div class="grupa-5">
            <div class="row group table-header">
                <p class="numer">Numer</p>
                <p class="pokoje">Pokoje</p>
                <p class="pow">Pow</p>
                <p class="text-49">Pow ogóródka</p>
                <p class="text-50">Dosteność</p>
                <p class="cena">Cena</p>
                <p class="plan">Plan</p>
            </div>
        <div class="col-12 group">
            <div class="col-48">
                <div class="row-37 group">
                    <p class="text-51"><?php echo get_field('apartment_1_number') ?: 'A 1.1'; ?></p>
                    <p class="text-52"><?php echo get_field('apartment_1_rooms') ?: '4'; ?></p>
                </div>
                <div class="row-38 group">
                    <p class="text-53"><?php echo get_field('apartment_2_number') ?: 'A 1.1'; ?></p>
                    <p class="text-54"><?php echo get_field('apartment_2_rooms') ?: '4'; ?></p>
                </div>
            </div>
            <div class="col-49 group">
                <p class="text-55"><?php echo get_field('apartment_1_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
                <p class="text-56"><?php echo get_field('apartment_2_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            </div>
            <div class="col-50">
                <p class="text-57"><?php echo get_field('apartment_1_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
                <p class="text-58"><?php echo get_field('apartment_2_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            </div>
            <div class="col-51">
                <img class="text-59" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
                <p class="zarezerwowane"><?php echo get_field('apartment_2_status') ?: 'Zarezerwowane'; ?></p>
            </div>
            <div class="col-52">
                <p class="text-60"><?php echo get_field('apartment_1_price') ?: 'Zapytaj o cenę'; ?></p>
                <p class="rezerwacja"><?php echo get_field('apartment_2_price') ?: 'Rezerwacja'; ?></p>
            </div>
            <div class="col-21">
                <p class="text-61"><?php echo get_field('apartment_1_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-62"><?php echo get_field('apartment_2_plan') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
    </div>
    <div class="grupa-5-2">
        <img class="warstwa-42" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3 group">
            <p class="text-63"><?php echo get_field('apartment_3_number') ?: 'A 1.1'; ?></p>
            <p class="text-64"><?php echo get_field('apartment_3_rooms') ?: '4'; ?></p>
            <p class="text-65"><?php echo get_field('apartment_3_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-66"><?php echo get_field('apartment_3_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-67" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-68"><?php echo get_field('apartment_3_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-20">
                <p class="text-69"><?php echo get_field('apartment_3_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-70"><?php echo get_field('apartment_3_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia group">
            <p class="text-71"><?php echo get_field('apartment_4_number') ?: 'A 1.1'; ?></p>
            <p class="text-72"><?php echo get_field('apartment_4_rooms') ?: '4'; ?></p>
            <p class="text-73"><?php echo get_field('apartment_4_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-74"><?php echo get_field('apartment_4_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-2"><?php echo get_field('apartment_4_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-2"><?php echo get_field('apartment_4_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    <div class="grupa-5-3">
        <img class="warstwa-42-2" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia-2" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3-2 group">
            <p class="text-75"><?php echo get_field('apartment_5_number') ?: 'A 1.1'; ?></p>
            <p class="text-76"><?php echo get_field('apartment_5_rooms') ?: '4'; ?></p>
            <p class="text-77"><?php echo get_field('apartment_5_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-78"><?php echo get_field('apartment_5_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-79" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-80"><?php echo get_field('apartment_5_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-19">
                <p class="text-81"><?php echo get_field('apartment_5_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-82"><?php echo get_field('apartment_5_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia-2 group">
            <p class="text-83"><?php echo get_field('apartment_6_number') ?: 'A 1.1'; ?></p>
            <p class="text-84"><?php echo get_field('apartment_6_rooms') ?: '4'; ?></p>
            <p class="text-85"><?php echo get_field('apartment_6_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-86"><?php echo get_field('apartment_6_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-3"><?php echo get_field('apartment_6_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-3"><?php echo get_field('apartment_6_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    <div class="grupa-5-4">
        <img class="warstwa-42-3" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia-3" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3-3 group">
            <p class="text-87"><?php echo get_field('apartment_7_number') ?: 'A 1.1'; ?></p>
            <p class="text-88"><?php echo get_field('apartment_7_rooms') ?: '4'; ?></p>
            <p class="text-89"><?php echo get_field('apartment_7_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-90"><?php echo get_field('apartment_7_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-91" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-92"><?php echo get_field('apartment_7_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-15">
                <p class="text-93"><?php echo get_field('apartment_7_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-94"><?php echo get_field('apartment_7_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia-4 group">
            <p class="text-95"><?php echo get_field('apartment_8_number') ?: 'A 1.1'; ?></p>
            <p class="text-96"><?php echo get_field('apartment_8_rooms') ?: '4'; ?></p>
            <p class="text-97"><?php echo get_field('apartment_8_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-98"><?php echo get_field('apartment_8_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-4"><?php echo get_field('apartment_8_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-4"><?php echo get_field('apartment_8_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    <div class="grupa-5-5">
        <img class="warstwa-42-4" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia-4" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3-4 group">
            <p class="text-99"><?php echo get_field('apartment_9_number') ?: 'A 1.1'; ?></p>
            <p class="text-100"><?php echo get_field('apartment_9_rooms') ?: '4'; ?></p>
            <p class="text-101"><?php echo get_field('apartment_9_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-102"><?php echo get_field('apartment_9_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-103" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-104"><?php echo get_field('apartment_9_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-16">
                <p class="text-105"><?php echo get_field('apartment_9_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-106"><?php echo get_field('apartment_9_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia-5 group">
            <p class="text-107"><?php echo get_field('apartment_10_number') ?: 'A 1.1'; ?></p>
            <p class="text-108"><?php echo get_field('apartment_10_rooms') ?: '4'; ?></p>
            <p class="text-109"><?php echo get_field('apartment_10_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-110"><?php echo get_field('apartment_10_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-5"><?php echo get_field('apartment_10_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-5"><?php echo get_field('apartment_10_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    <div class="grupa-5-6">
        <img class="warstwa-42-5" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia-5" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3-5 group">
            <p class="text-111"><?php echo get_field('apartment_11_number') ?: 'A 1.1'; ?></p>
            <p class="text-112"><?php echo get_field('apartment_11_rooms') ?: '4'; ?></p>
            <p class="text-113"><?php echo get_field('apartment_11_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-114"><?php echo get_field('apartment_11_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-115" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-116"><?php echo get_field('apartment_11_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-17">
                <p class="text-117"><?php echo get_field('apartment_11_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-118"><?php echo get_field('apartment_11_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia-6 group">
            <p class="text-119"><?php echo get_field('apartment_12_number') ?: 'A 1.1'; ?></p>
            <p class="text-120"><?php echo get_field('apartment_12_rooms') ?: '4'; ?></p>
            <p class="text-121"><?php echo get_field('apartment_12_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-122"><?php echo get_field('apartment_12_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-6"><?php echo get_field('apartment_12_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-6"><?php echo get_field('apartment_12_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    <div class="grupa-5-7">
        <img class="warstwa-42-6" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42.png" alt="" width="1421" height="80">
        <img class="warstwa-42-kopia-6" src="<?php echo get_template_directory_uri(); ?>/html/images/warstwa_42_kopia.png" alt="" width="1423" height="80">
        <div class="grupa-3-6 group">
            <p class="text-123"><?php echo get_field('apartment_13_number') ?: 'A 1.1'; ?></p>
            <p class="text-124"><?php echo get_field('apartment_13_rooms') ?: '4'; ?></p>
            <p class="text-125"><?php echo get_field('apartment_13_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-126"><?php echo get_field('apartment_13_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <img class="text-127" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne_2.png" alt="Dostępne" width="80" height="16" title="Dostępne">
            <p class="text-128"><?php echo get_field('apartment_13_price') ?: 'Zapytaj o cenę'; ?></p>
            <div class="col-18">
                <p class="text-129"><?php echo get_field('apartment_13_plan') ?: 'Zobacz plan'; ?></p>
                <p class="text-130"><?php echo get_field('apartment_13_plan_2') ?: 'Zobacz plan'; ?></p>
            </div>
        </div>
        <div class="grupa-3-kopia-7 group">
            <p class="text-131"><?php echo get_field('apartment_14_number') ?: 'A 1.1'; ?></p>
            <p class="text-132"><?php echo get_field('apartment_14_rooms') ?: '4'; ?></p>
            <p class="text-133"><?php echo get_field('apartment_14_area') ?: '55'; ?><span class="text-style-11">m²</span></p>
            <p class="text-134"><?php echo get_field('apartment_14_garden') ?: '245'; ?><span class="text-style-11">m²</span></p>
            <p class="zarezerwowane-7"><?php echo get_field('apartment_14_status') ?: 'Zarezerwowane'; ?></p>
            <p class="rezerwacja-7"><?php echo get_field('apartment_14_price') ?: 'Rezerwacja'; ?></p>
        </div>
    </div>
    </div>
</div>

