<?php
/**
 * Gallery Section Template Part
 *
 * @package Future
 */

// Get gallery data from ACF or set defaults
$gallery_title = get_field('gallery_title') ?: 'Zobacz galerie';
$gallery_button_text = get_field('gallery_button_text') ?: '';
$gallery_button_url = get_field('gallery_button_url') ?: '#gallery';

// Get ACF Gallery field
$acf_gallery = get_field('gallery_images');

// Process ACF gallery images
$gallery_images = [];
if (!empty($acf_gallery) && is_array($acf_gallery)) {
    foreach ($acf_gallery as $image) {
        if (is_array($image) && isset($image['url'])) {
            $gallery_images[] = [
                'url' => $image['url'],
                'alt' => $image['alt'] ?: $image['title'] ?: 'Gallery image'
            ];
        } elseif (is_object($image) && isset($image->url)) {
            $gallery_images[] = [
                'url' => $image->url,
                'alt' => $image->alt ?: $image->title ?: 'Gallery image'
            ];
        }
    }
}

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
    display: flex;
    justify-content: center;
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
    overflow: hidden;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.gallery-item:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1 !important;
    visibility: visible !important;
}

.gallery-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: rgba(0, 169, 6, 0.8) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    opacity: 0 !important;
    visibility: hidden !important;
    transition: all 0.3s ease !important;
    z-index: 10 !important;
    border-radius: 12px !important;
}

.gallery-overlay-text {
    color: #ffffff;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    font-family: Montserrat, sans-serif;
}

/* Ensure gallery images are properly contained */
.gallery-item img {
    display: block;
    width: 100%;
    height: auto;
    max-width: 100%;
    border-radius: 12px;
}

/* Specific sizing for different gallery images */
.gallery-item .layer-17 {
    width: 821px;
    height: 478px;
    object-fit: cover;
}

.gallery-item .layer-18,
.gallery-item .layer-19,
.gallery-item .layer-20,
.gallery-item .layer-20-see-all {
    width: 290px;
    height: 210px;
    object-fit: cover;
}

/* Responsive styles for gallery */
@media (max-width: 1000px) {
    .gallery-item {
        width: 100% !important;
        margin: 10px 0 !important;
    }

    .gallery-item .layer-17,
    .gallery-item .layer-18,
    .gallery-item .layer-19,
    .gallery-item .layer-20,
    .gallery-item .layer-20-see-all {
        width: 100% !important;
        height: auto !important;
        max-width: 100% !important;
    }

    .gallery-overlay-text {
        font-size: 16px;
    }
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

    .gallery-overlay-text {
        font-size: 14px;
    }
}
</style>

<section class="galeria-new" id="galeria">
    <div class="gallery-title">
        <img class="text-135" src="<?php echo get_template_directory_uri(); ?>/html/images/zobacz_galerie.png" alt="<?php echo esc_attr($gallery_title); ?>" width="256" height="38" title="<?php echo esc_attr($gallery_title); ?>">
    </div>

    <div class="gallery-container">
        <!-- Left side - Main large image -->
        <div class="gallery-main">
            <?php if (!empty($gallery_images[0])): ?>
                <?php
                $image_0 = $gallery_images[0];
                $image_0_url = is_array($image_0) ? $image_0['url'] : $image_0;
                $image_0_alt = is_array($image_0) ? $image_0['alt'] : 'Gallery image 1';
                ?>
                <div class="gallery-item" data-lightbox="gallery" data-src="<?php echo esc_url($image_0_url); ?>">
                    <img src="<?php echo esc_url($image_0_url); ?>" alt="<?php echo esc_attr($image_0_alt); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz wszystkie</div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right side - 2x2 grid -->
        <div class="gallery-grid">
            <?php if (!empty($gallery_images[1])): ?>
                <?php
                $image_1 = $gallery_images[1];
                $image_1_url = is_array($image_1) ? $image_1['url'] : $image_1;
                $image_1_alt = is_array($image_1) ? $image_1['alt'] : 'Gallery image 2';
                ?>
                <div class="gallery-item" data-lightbox="gallery" data-src="<?php echo esc_url($image_1_url); ?>">
                    <img src="<?php echo esc_url($image_1_url); ?>" alt="<?php echo esc_attr($image_1_alt); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz wszystkie</div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($gallery_images[2])): ?>
                <?php
                $image_2 = $gallery_images[2];
                $image_2_url = is_array($image_2) ? $image_2['url'] : $image_2;
                $image_2_alt = is_array($image_2) ? $image_2['alt'] : 'Gallery image 3';
                ?>
                <div class="gallery-item" data-lightbox="gallery" data-src="<?php echo esc_url($image_2_url); ?>">
                    <img src="<?php echo esc_url($image_2_url); ?>" alt="<?php echo esc_attr($image_2_alt); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz wszystkie</div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($gallery_images[3])): ?>
                <?php
                $image_3 = $gallery_images[3];
                $image_3_url = is_array($image_3) ? $image_3['url'] : $image_3;
                $image_3_alt = is_array($image_3) ? $image_3['alt'] : 'Gallery image 4';
                ?>
                <div class="gallery-item" data-lightbox="gallery" data-src="<?php echo esc_url($image_3_url); ?>">
                    <img src="<?php echo esc_url($image_3_url); ?>" alt="<?php echo esc_attr($image_3_alt); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz wszystkie</div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($gallery_images[4])): ?>
                <?php
                $image_4 = $gallery_images[4];
                $image_4_url = is_array($image_4) ? $image_4['url'] : $image_4;
                $image_4_alt = is_array($image_4) ? $image_4['alt'] : 'Gallery image 5';
                ?>
                <div class="gallery-item" data-lightbox="gallery" data-src="<?php echo esc_url($image_4_url); ?>">
                    <img src="<?php echo esc_url($image_4_url); ?>" alt="<?php echo esc_attr($image_4_alt); ?>">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-text">Zobacz wszystkie</div>
                    </div>
                </div>
            <?php endif; ?>
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
console.log('Gallery lightbox script starting...');

// Simple lightbox implementation
function initGalleryLightbox() {
    console.log('Initializing gallery lightbox...');

    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.gallery-lightbox-close');
    const thumbnailsContainer = document.getElementById('gallery-thumbnails');

    console.log('Lightbox elements:', {
        lightbox: !!lightbox,
        lightboxImage: !!lightboxImage,
        closeBtn: !!closeBtn,
        thumbnailsContainer: !!thumbnailsContainer
    });

    if (!lightbox || !lightboxImage) {
        console.error('Required lightbox elements not found!');
        return;
    }

    // Find all gallery items
    const galleryItems = document.querySelectorAll('.gallery-item[data-lightbox="gallery"]');
    console.log('Found gallery items:', galleryItems.length);

    if (galleryItems.length === 0) {
        console.error('No gallery items found with data-lightbox="gallery"');
        return;
    }

    let currentIndex = 0;
    let allImages = [];

    // Collect image data
    galleryItems.forEach(function(item, index) {
        const src = item.getAttribute('data-src');
        const img = item.querySelector('img');
        const alt = img ? img.getAttribute('alt') : 'Gallery image ' + (index + 1);
        allImages.push({ src: src, alt: alt });
        console.log('Image ' + index + ':', src);
    });

    // Create thumbnails
    function createThumbnails() {
        if (!thumbnailsContainer) return;

        thumbnailsContainer.innerHTML = '';
        allImages.forEach(function(image, index) {
            const thumbnail = document.createElement('div');
            thumbnail.className = 'gallery-lightbox-thumbnail';
            thumbnail.innerHTML = '<img src="' + image.src + '" alt="' + image.alt + '">';

            thumbnail.onclick = function() {
                showImage(index);
            };

            thumbnailsContainer.appendChild(thumbnail);
        });
    }

    // Show specific image
    function showImage(index) {
        if (!allImages[index]) return;

        currentIndex = index;
        const image = allImages[index];

        lightboxImage.src = image.src;
        lightboxImage.alt = image.alt;

        // Update active thumbnail
        const thumbnails = document.querySelectorAll('.gallery-lightbox-thumbnail');
        thumbnails.forEach(function(thumb, i) {
            thumb.classList.toggle('active', i === index);
        });
    }

    // Open lightbox
    function openLightbox(index) {
        console.log('Opening lightbox for image:', index);
        createThumbnails();
        showImage(index);
        lightbox.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Close lightbox
    function closeLightbox() {
        console.log('Closing lightbox');
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Add click events to gallery items
    galleryItems.forEach(function(item, index) {
        console.log('Adding click event to gallery item:', index);

        // Remove any existing event listeners
        item.onclick = null;

        // Add new click event
        item.onclick = function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Gallery item clicked:', index);
            openLightbox(index);
        };
    });

    // Close button
    if (closeBtn) {
        closeBtn.onclick = closeLightbox;
    }

    // Click outside to close
    lightbox.onclick = function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    };

    // Keyboard navigation
    document.onkeydown = function(e) {
        if (lightbox.style.display !== 'block') return;

        switch(e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                const prevIndex = currentIndex > 0 ? currentIndex - 1 : allImages.length - 1;
                showImage(prevIndex);
                break;
            case 'ArrowRight':
                const nextIndex = currentIndex < allImages.length - 1 ? currentIndex + 1 : 0;
                showImage(nextIndex);
                break;
        }
    };

    console.log('Gallery lightbox initialized successfully!');
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGalleryLightbox);
} else {
    initGalleryLightbox();
}
</script>
