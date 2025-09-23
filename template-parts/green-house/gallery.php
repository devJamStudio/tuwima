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
    background-color: rgba(0, 0, 0, 0.95);
    overflow-y: auto;
    padding: 20px;
    box-sizing: border-box;
}

.gallery-lightbox-content {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
}

.gallery-lightbox-main {
    text-align: center;
    margin-bottom: 30px;
}

.gallery-lightbox img {
    max-width: 100%;
    max-height: 70vh;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.gallery-lightbox-close {
    position: fixed;
    top: 20px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
    background: rgba(0, 0, 0, 0.5);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.gallery-lightbox-close:hover {
    color: #00a906;
    background: rgba(0, 169, 6, 0.8);
}

.gallery-lightbox-thumbnails {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    max-width: 1000px;
    margin: 0 auto;
}

.gallery-lightbox-thumbnail {
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.gallery-lightbox-thumbnail:hover {
    opacity: 1;
    transform: scale(1.05);
}

.gallery-lightbox-thumbnail.active {
    opacity: 1;
    border: 3px solid #00a906;
}

.gallery-lightbox-thumbnail img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 5px;
}

.gallery-item {
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
    overflow: hidden;
}

.gallery-item:hover {
    transform: scale(1.02);
}

.gallery-item:hover .gallery-overlay {
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

/* Responsive lightbox */
@media (max-width: 768px) {
    .gallery-lightbox {
        padding: 10px;
    }

    .gallery-lightbox-close {
        top: 10px;
        right: 15px;
        width: 40px;
        height: 40px;
        font-size: 30px;
    }

    .gallery-lightbox-thumbnails {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 10px;
    }

    .gallery-lightbox-thumbnail img {
        height: 80px;
    }
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
        <div class="gallery-lightbox-main">
            <img id="lightbox-image" src="" alt="">
        </div>
        <div class="gallery-lightbox-thumbnails" id="gallery-thumbnails">
            <!-- Thumbnails will be populated by JavaScript -->
        </div>
    </div>
</div>

<!-- Lightbox JavaScript -->
<script>
(function() {
    'use strict';

    let lightbox, lightboxImage, closeBtn, thumbnailsContainer;
    let currentImageIndex = 0;
    let allImages = [];

    function initLightbox() {
        lightbox = document.getElementById('gallery-lightbox');
        lightboxImage = document.getElementById('lightbox-image');
        closeBtn = document.querySelector('.gallery-lightbox-close');
        thumbnailsContainer = document.getElementById('gallery-thumbnails');

        if (!lightbox || !lightboxImage || !thumbnailsContainer) {
            console.error('Lightbox elements not found');
            return;
        }

        setupGalleryItems();
        setupEventListeners();
    }

    function setupGalleryItems() {
        const galleryItems = document.querySelectorAll('[data-lightbox="gallery"]');
        console.log('Found gallery items:', galleryItems.length);

        allImages = [];
        galleryItems.forEach(function(item) {
            const imageSrc = item.getAttribute('data-src') || item.src;
            const imageAlt = item.getAttribute('alt') || 'Gallery image';
            allImages.push({ src: imageSrc, alt: imageAlt });
        });
    }

    function createThumbnails() {
        if (!thumbnailsContainer) return;

        thumbnailsContainer.innerHTML = '';
        allImages.forEach(function(image, index) {
            const thumbnail = document.createElement('div');
            thumbnail.className = 'gallery-lightbox-thumbnail';
            thumbnail.innerHTML = `<img src="${image.src}" alt="${image.alt}">`;

            thumbnail.addEventListener('click', function() {
                showImage(index);
            });

            thumbnailsContainer.appendChild(thumbnail);
        });
    }

    function showImage(index) {
        if (!lightboxImage || !allImages[index]) return;

        currentImageIndex = index;
        const image = allImages[index];

        lightboxImage.src = image.src;
        lightboxImage.alt = image.alt;

        // Update active thumbnail
        const thumbnails = document.querySelectorAll('.gallery-lightbox-thumbnail');
        thumbnails.forEach(function(thumb, i) {
            thumb.classList.toggle('active', i === index);
        });
    }

    function openLightbox(index) {
        if (!lightbox) return;

        createThumbnails();
        showImage(index);
        lightbox.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        if (!lightbox) return;

        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function setupEventListeners() {
        // Gallery item clicks
        const galleryItems = document.querySelectorAll('[data-lightbox="gallery"]');
        galleryItems.forEach(function(item, index) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Gallery item clicked:', index);
                openLightbox(index);
            });
        });

        // Close button
        if (closeBtn) {
            closeBtn.addEventListener('click', closeLightbox);
        }

        // Click outside to close
        if (lightbox) {
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!lightbox || lightbox.style.display !== 'block') return;

            switch(e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    const prevIndex = currentImageIndex > 0 ? currentImageIndex - 1 : allImages.length - 1;
                    showImage(prevIndex);
                    break;
                case 'ArrowRight':
                    const nextIndex = currentImageIndex < allImages.length - 1 ? currentImageIndex + 1 : 0;
                    showImage(nextIndex);
                    break;
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLightbox);
    } else {
        initLightbox();
    }
})();
</script>
