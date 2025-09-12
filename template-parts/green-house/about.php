<?php
/**
 * Template part for Green House about section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="o-inwestycji group">
    <div class="col-5">
        <p class="text-16"><?php echo get_field('about_title') ?: 'O inwestycji'; ?></p>
        <p class="text-17"><?php echo get_field('about_subtitle') ?: 'Inwestycja w przyszłość<br>Twojej rodziny.'; ?></p>
        <p class="text-18"><?php echo get_field('about_description') ?: 'Zapraszamy do nowoczesnej inwestycji mieszkaniowej w spokojnej części Sosnowca, zaledwie kilka minut od centrum. Osiedle składa się z 14 domów w zabudowie bliźniaczej – łącznie 28 mieszkań. To idealna propozycja dla osób ceniących komfort, prywatność i dogodną lokalizację.<br><span class="text-style-7">&nbsp;</span><br>W ofercie znajdują się mieszkania na parterze z prywatnymi ogródkami oraz lokale na piętrze z przestronnymi balkonami. Każde z mieszkań zostało zaprojektowane z myślą o wygodzie mieszkańców – nowoczesny układ, funkcjonalne rozwiązania i wysoki standard wykończenia gwarantują komfort codziennego życia.<br><span class="text-style-7">&nbsp;</span><br>Osiedle znajduje się w cichej, zielonej okolicy, a jednocześnie blisko szkół, sklepów, parku i innych udogodnień. Doskonała komunikacja zapewnia szybki dojazd do centrum oraz innych dzielnic miasta. To alternatywa dla zatłoczonych blokowisk – mniejsza liczba mieszkańców, brak wysokiej zabudowy i spokojna atmosfera sprzyjają relaksowi i budowaniu dobrych relacji sąsiedzkich.'; ?></p>
        <div class="btn">
            <?php echo get_field('about_button_text') ?: 'Zobacz mieszkania'; ?>
        </div>
    </div>
    <img class="layer-3" src="<?php echo get_field('about_image')['url'] ?? get_template_directory_uri() . '/html/images/5.jpg'; ?>" alt="" width="747" height="686">
</div>

