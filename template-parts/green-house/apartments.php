<?php
/**
 * Template part for Green House apartments section
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="mieszkania group" id="mieszkania" data-aos="fade-up">
    <div class="container">
        <div class="apartments-header" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-45"><?php echo get_field('apartments_title') ?: 'Wybierz swoje mieszkanie'; ?></h2>
            <p class="text-46"><?php echo get_field('apartments_description') ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a Lorem Ipsum is simply dummy text of the printing and <br><span class="text-style-7">&nbsp;</span><br>typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley printer took a galley ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a'; ?></p>
        </div>

        <div class="wrapper-6" data-aos="fade-up" data-aos-delay="400">
            <div class="kulki">
                <div class="row-2 no-space-between-inline-blocks">
                    <div class="elipsa-2"></div>
                    <div class="elipsa-2-kopia"></div>
                    <div class="elipsa-2-kopia-2"></div>
                    <div class="elipsa-2-kopia-3"></div>
                    <div class="elipsa-2-kopia-4"></div>
                    <div class="elipsa-2-kopia-5"></div>
                    <div class="elipsa-2-kopia-6"></div>
                    <div class="elipsa-2-kopia-7"></div>
                    <div class="elipsa-2-kopia-8"></div>
                    <div class="elipsa-2-kopia-9"></div>
                    <div class="elipsa-2-kopia-10"></div>
                    <div class="elipsa-2-kopia-11"></div>
                    <div class="elipsa-2-kopia-12"></div>
                    <div class="elipsa-2-kopia-13"></div>
                    <div class="elipsa-2-kopia-14"></div>
                    <div class="elipsa-2-kopia-15"></div>
                    <div class="elipsa-2-kopia-22"></div>
                    <div class="elipsa-2-kopia-23"></div>
                    <div class="elipsa-2-kopia-24"></div>
                    <div class="elipsa-2-kopia-40"></div>
                </div>
                <div class="row-3 group">
                    <div class="elipsa-2-kopia-38"></div>
                    <div class="elipsa-2-kopia-37"></div>
                    <div class="elipsa-2-kopia-36"></div>
                    <div class="elipsa-2-kopia-35"></div>
                    <div class="elipsa-2-kopia-34"></div>
                    <div class="elipsa-2-kopia-41"></div>
                    <div class="elipsa-2-kopia-33"></div>
                    <div class="elipsa-2-kopia-32"></div>
                    <div class="elipsa-2-kopia-31"></div>
                    <div class="elipsa-2-kopia-30"></div>
                    <div class="elipsa-2-kopia-29"></div>
                    <div class="elipsa-2-kopia-28"></div>
                    <div class="elipsa-2-kopia-20"></div>
                    <div class="elipsa-2-kopia-19"></div>
                    <div class="elipsa-2-kopia-18"></div>
                    <div class="elipsa-2-kopia-42"></div>
                    <div class="elipsa-2-kopia-17"></div>
                    <div class="elipsa-2-kopia-25"></div>
                    <div class="elipsa-2-kopia-16"></div>
                    <div class="elipsa-2-kopia-26"></div>
                    <div class="elipsa-2-kopia-27"></div>
                </div>
            </div>
            <div class="dymek group" data-aos="fade-left" data-aos-delay="600">
                <div class="row-4 group">
                    <img class="text-48" src="<?php echo get_template_directory_uri(); ?>/html/images/dost_pne.png" alt="Dostępne" width="65" height="12" title="Dostępne">
                    <p class="text-47"><?php echo get_field('selected_apartment_number') ?: 'A 1.1'; ?></p>
                </div>
                <div class="wrapper-14">
                    <nav class="nav">
                        <ul class="nav-list group">
                            <li><p class="nav-item-1"><a href="#"><?php echo get_field('selected_apartment_rooms') ?: '4'; ?></a></p></li>
                            <li><p class="nav-item-4"><a href="#"><?php echo get_field('selected_apartment_area') ?: '55'; ?><span class="text-style-11">m²</span></a></p></li>
                            <li><p class="nav-item-8"><a href="#"><?php echo get_field('selected_apartment_garden') ?: '245'; ?><span class="text-style-11">m²</span></a></p></li>
                        </ul>
                    </nav>
                    <img class="layer-14" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
                    <img class="layer-15" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
                    <img class="layer-16" src="<?php echo get_template_directory_uri(); ?>/html/images/prostok_t_zaokr_glony_11.png" alt="" width="52" height="53">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.mieszkania {
    padding: 80px 0;
    background: #ffffff;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.apartments-header {
    text-align: center;
    margin-bottom: 4rem;
}

.text-45 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.text-46 {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #666;
    max-width: 800px;
    margin: 0 auto;
}

.wrapper-6 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4rem;
    flex-wrap: wrap;
}

.kulki {
    flex: 1;
    min-width: 400px;
    position: relative;
}

.row-2, .row-3 {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.no-space-between-inline-blocks {
    justify-content: space-between;
}

.elipsa-2,
.elipsa-2-kopia,
.elipsa-2-kopia-2,
.elipsa-2-kopia-3,
.elipsa-2-kopia-4,
.elipsa-2-kopia-5,
.elipsa-2-kopia-6,
.elipsa-2-kopia-7,
.elipsa-2-kopia-8,
.elipsa-2-kopia-9,
.elipsa-2-kopia-10,
.elipsa-2-kopia-11,
.elipsa-2-kopia-12,
.elipsa-2-kopia-13,
.elipsa-2-kopia-14,
.elipsa-2-kopia-15,
.elipsa-2-kopia-16,
.elipsa-2-kopia-17,
.elipsa-2-kopia-18,
.elipsa-2-kopia-19,
.elipsa-2-kopia-20,
.elipsa-2-kopia-22,
.elipsa-2-kopia-23,
.elipsa-2-kopia-24,
.elipsa-2-kopia-25,
.elipsa-2-kopia-26,
.elipsa-2-kopia-27,
.elipsa-2-kopia-28,
.elipsa-2-kopia-29,
.elipsa-2-kopia-30,
.elipsa-2-kopia-31,
.elipsa-2-kopia-32,
.elipsa-2-kopia-33,
.elipsa-2-kopia-34,
.elipsa-2-kopia-35,
.elipsa-2-kopia-36,
.elipsa-2-kopia-37,
.elipsa-2-kopia-38,
.elipsa-2-kopia-40,
.elipsa-2-kopia-41,
.elipsa-2-kopia-42 {
    width: 20px;
    height: 20px;
    background: #00a906;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.elipsa-2:hover,
.elipsa-2-kopia:hover,
.elipsa-2-kopia-2:hover,
.elipsa-2-kopia-3:hover,
.elipsa-2-kopia-4:hover,
.elipsa-2-kopia-5:hover,
.elipsa-2-kopia-6:hover,
.elipsa-2-kopia-7:hover,
.elipsa-2-kopia-8:hover,
.elipsa-2-kopia-9:hover,
.elipsa-2-kopia-10:hover,
.elipsa-2-kopia-11:hover,
.elipsa-2-kopia-12:hover,
.elipsa-2-kopia-13:hover,
.elipsa-2-kopia-14:hover,
.elipsa-2-kopia-15:hover,
.elipsa-2-kopia-16:hover,
.elipsa-2-kopia-17:hover,
.elipsa-2-kopia-18:hover,
.elipsa-2-kopia-19:hover,
.elipsa-2-kopia-20:hover,
.elipsa-2-kopia-22:hover,
.elipsa-2-kopia-23:hover,
.elipsa-2-kopia-24:hover,
.elipsa-2-kopia-25:hover,
.elipsa-2-kopia-26:hover,
.elipsa-2-kopia-27:hover,
.elipsa-2-kopia-28:hover,
.elipsa-2-kopia-29:hover,
.elipsa-2-kopia-30:hover,
.elipsa-2-kopia-31:hover,
.elipsa-2-kopia-32:hover,
.elipsa-2-kopia-33:hover,
.elipsa-2-kopia-34:hover,
.elipsa-2-kopia-35:hover,
.elipsa-2-kopia-36:hover,
.elipsa-2-kopia-37:hover,
.elipsa-2-kopia-38:hover,
.elipsa-2-kopia-40:hover,
.elipsa-2-kopia-41:hover,
.elipsa-2-kopia-42:hover {
    transform: scale(1.2);
    background: #008a05;
    box-shadow: 0 0 10px rgba(0, 169, 6, 0.5);
}

.dymek {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    min-width: 300px;
    border-left: 4px solid #00a906;
}

.row-4 {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.text-48 {
    width: 65px;
    height: 12px;
}

.text-47 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.wrapper-14 {
    position: relative;
}

.nav-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item-1, .nav-item-4, .nav-item-8 {
    margin: 0;
}

.nav-item-1 a, .nav-item-4 a, .nav-item-8 a {
    color: #333;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}

.nav-item-1 a:hover, .nav-item-4 a:hover, .nav-item-8 a:hover {
    color: #00a906;
}

.text-style-11 {
    font-size: 0.9rem;
    color: #666;
}

.layer-14, .layer-15, .layer-16 {
    position: absolute;
    width: 52px;
    height: 53px;
    opacity: 0.1;
}

.layer-14 {
    top: 0;
    right: 0;
}

.layer-15 {
    top: 50%;
    right: 0;
    transform: translateY(-50%);
}

.layer-16 {
    bottom: 0;
    right: 0;
}

@media (max-width: 768px) {
    .wrapper-6 {
        flex-direction: column;
        gap: 2rem;
    }

    .kulki {
        min-width: auto;
        width: 100%;
    }

    .text-45 {
        font-size: 2rem;
    }

    .text-46 {
        font-size: 1rem;
    }

    .dymek {
        min-width: auto;
        width: 100%;
    }
}
</style>

