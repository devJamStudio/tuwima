<?php
/**
 * Gallery Section Template Part
 *
 * @package Future
 */

// Get gallery data from ACF or set defaults
$gallery_title = get_field('gallery_title') ?: 'Zobacz galerie';
$gallery_button_text = get_field('gallery_button_text') ?: 'Zobacz wszystkie';
$gallery_button_url = get_field('gallery_button_url') ?: '#gallery';

// Get ACF Gallery field
$gallery_images = get_field('gallery_images');

// Fallback images if ACF gallery field is empty (max 5 images)
if (empty($gallery_images)) {
    $gallery_images = [
        [
            'url' => get_template_directory_uri() . '/html/images/4_2.jpg',
            'alt' => 'Gallery image 1'
        ],
        [
            'url' => get_template_directory_uri() . '/html/images/2.png',
            'alt' => 'Gallery image 2'
        ],
        [
            'url' => get_template_directory_uri() . '/html/images/5_2.png',
            'alt' => 'Gallery image 3'
        ],
        [
            'url' => get_template_directory_uri() . '/html/images/3_2.png',
            'alt' => 'Gallery image 4'
        ],
        [
            'url' => get_template_directory_uri() . '/html/images/6_2.jpg',
            'alt' => 'Gallery image 5'
        ]
    ];
}

// Limit to maximum 5 images
$gallery_images = array_slice($gallery_images, 0, 5);
?>

<!-- Gallery Lightbox Styles -->
<style>
.gallery-lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    cursor: pointer;
}

.gallery-lightbox-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 90%;
    max-height: 90%;
}

.gallery-lightbox img {
    width: 100%;
    height: auto;
    max-height: 90vh;
    object-fit: contain;
}

.gallery-lightbox-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}

.gallery-lightbox-close:hover {
    color: #00a906;
}

.gallery-item {
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: scale(1.02);
}

.gallery-item:hover .warstwa-51-holder {
    opacity: 1;
    visibility: visible;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 169, 6, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.gallery-overlay-text {
    color: #ffffff;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    font-family: Montserrat, sans-serif;
}
</style>

<section class="galeria group">
    <div class="col-28">
        <img class="text-135" src="<?php echo get_template_directory_uri(); ?>/html/images/zobacz_galerie.png" alt="<?php echo esc_attr($gallery_title); ?>" width="256" height="38" title="<?php echo esc_attr($gallery_title); ?>">

        <div class="row-21 group">
            <?php if (!empty($gallery_images[0])): ?>
                <?php
                $image_0 = $gallery_images[0];
                $image_0_url = is_array($image_0) ? $image_0['url'] : $image_0;
                $image_0_alt = is_array($image_0) ? $image_0['alt'] : 'Gallery image 1';
                ?>
                <div class="gallery-item">
                    <img class="layer-17" src="<?php echo esc_url($image_0_url); ?>" alt="<?php echo esc_attr($image_0_alt); ?>" width="821" height="478" data-lightbox="gallery" data-src="<?php echo esc_url($image_0_url); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz zdjęcie</div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-37">
                <?php if (!empty($gallery_images[1])): ?>
                    <?php
                    $image_1 = $gallery_images[1];
                    $image_1_url = is_array($image_1) ? $image_1['url'] : $image_1;
                    $image_1_alt = is_array($image_1) ? $image_1['alt'] : 'Gallery image 2';
                    ?>
                    <div class="gallery-item">
                        <img class="layer-18" src="<?php echo esc_url($image_1_url); ?>" alt="<?php echo esc_attr($image_1_alt); ?>" width="290" height="210" data-lightbox="gallery" data-src="<?php echo esc_url($image_1_url); ?>">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-text">Zobacz zdjęcie</div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($gallery_images[2])): ?>
                    <?php
                    $image_2 = $gallery_images[2];
                    $image_2_url = is_array($image_2) ? $image_2['url'] : $image_2;
                    $image_2_alt = is_array($image_2) ? $image_2['alt'] : 'Gallery image 3';
                    ?>
                    <div class="gallery-item">
                        <img class="layer-19" src="<?php echo esc_url($image_2_url); ?>" alt="<?php echo esc_attr($image_2_alt); ?>" width="290" height="210" data-lightbox="gallery" data-src="<?php echo esc_url($image_2_url); ?>">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-text">Zobacz zdjęcie</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-32 group">
        <?php if (!empty($gallery_images[3])): ?>
            <?php
            $image_3 = $gallery_images[3];
            $image_3_url = is_array($image_3) ? $image_3['url'] : $image_3;
            $image_3_alt = is_array($image_3) ? $image_3['alt'] : 'Gallery image 4';
            ?>
            <div class="gallery-item">
                <img class="layer-20" src="<?php echo esc_url($image_3_url); ?>" alt="<?php echo esc_attr($image_3_alt); ?>" width="290" height="210" data-lightbox="gallery" data-src="<?php echo esc_url($image_3_url); ?>">
                <div class="gallery-overlay">
                    <div class="gallery-overlay-text">Zobacz zdjęcie</div>
                </div>
            </div>
        <?php endif; ?>

        <div class="wrapper-17">
            <div class="warstwa-51-holder">
                <a href="<?php echo esc_url($gallery_button_url); ?>" style="color: inherit; text-decoration: none;">
                    <?php echo esc_html($gallery_button_text); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox HTML -->
<div id="gallery-lightbox" class="gallery-lightbox">
    <span class="gallery-lightbox-close">&times;</span>
    <div class="gallery-lightbox-content">
        <img id="lightbox-image" src="" alt="">
    </div>
</div>

<!-- Lightbox JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.gallery-lightbox-close');
    const galleryItems = document.querySelectorAll('[data-lightbox="gallery"]');

    // Open lightbox
    galleryItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const imageSrc = this.getAttribute('data-src');
            const imageAlt = this.getAttribute('alt');

            lightboxImage.src = imageSrc;
            lightboxImage.alt = imageAlt;
            lightbox.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    });

    // Close lightbox
    function closeLightbox() {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    closeBtn.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.style.display === 'block') {
            closeLightbox();
        }
    });
});
</script>
