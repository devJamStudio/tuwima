/**
 * RESPONSIVE JAVASCRIPT FOR GREEN HOUSE TUWIMA
 * Handles mobile interactions, touch events, and responsive behaviors
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        initResponsive();
    });

    // Initialize responsive features
    function initResponsive() {
        handleMobileNavigation();
        handleTouchInteractions();
        handleImageOptimization();
        handleFormEnhancements();
        handleScrollAnimations();
        handleApartmentTableScroll();
        handleResponsiveGallery();
    }

    // Mobile Navigation Handler
    function handleMobileNavigation() {
        // Create mobile menu toggle if screen is small
        if (window.innerWidth <= 767) {
            const nav = $('.nav-2');
            const navList = $('.nav-list-2');

            // Create mobile toggle button
            if (!$('.mobile-nav-toggle').length) {
                nav.prepend('<button class="mobile-nav-toggle" aria-label="Toggle Navigation">☰</button>');
            }

            // Handle mobile menu toggle
            $('.mobile-nav-toggle').on('click', function() {
                navList.toggleClass('mobile-nav-open');
                $(this).toggleClass('active');
            });

            // Close mobile menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.nav-2').length) {
                    navList.removeClass('mobile-nav-open');
                    $('.mobile-nav-toggle').removeClass('active');
                }
            });
        }
    }

    // Touch Interactions
    function handleTouchInteractions() {
        // Add touch-friendly hover states
        $('.btn, .btn-kopia, .btn-2, .btn-kopia-2, .btn-kopia-3, .btn-kopia-4, .btn-kopia-5, .btn-kopia-6, .btn-kopia-2-2, .grupa-8, .layer-holder-5').on('touchstart', function() {
            $(this).addClass('touch-active');
        }).on('touchend touchcancel', function() {
            const $this = $(this);
            setTimeout(function() {
                $this.removeClass('touch-active');
            }, 150);
        });

        // Handle apartment selection on touch devices
        $('.kulki .elipsa-2, .kulki .elipsa-2-kopia').on('touchstart click', function(e) {
            e.preventDefault();
            $('.kulki .elipsa-2, .kulki .elipsa-2-kopia').removeClass('selected');
            $(this).addClass('selected');

            // Update apartment info (placeholder functionality)
            updateApartmentInfo($(this).data('apartment-id'));
        });
    }

    // Image Optimization
    function handleImageOptimization() {
        // Lazy loading for images (simple implementation)
        const images = $('img');

        images.each(function() {
            const $img = $(this);
            const src = $img.attr('src');

            // Add loading class
            $img.addClass('loading');

            // Handle image load
            $img.on('load', function() {
                $(this).removeClass('loading').addClass('loaded');
            }).on('error', function() {
                $(this).removeClass('loading').addClass('error');
                console.warn('Failed to load image:', src);
            });
        });

        // Responsive image sizing
        $(window).on('resize', function() {
            adjustImageSizes();
        });

        adjustImageSizes();
    }

    // Form Enhancements
    function handleFormEnhancements() {
        // Add focus states to form elements
        $('.warstwa-61-holder input, .warstwa-61-kopia-holder input, .warstwa-61-kopia-2-holder input, .warstwa-61-kopia-3-holder textarea').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
            if ($(this).val().trim() !== '') {
                $(this).parent().addClass('has-content');
            } else {
                $(this).parent().removeClass('has-content');
            }
        });

        // Form validation
        $('.layer-holder-5').on('click', function(e) {
            e.preventDefault();

            let isValid = true;
            const requiredFields = $('.warstwa-61-holder input, .warstwa-61-kopia-holder input, .warstwa-61-kopia-2-holder input, .warstwa-61-kopia-3-holder textarea');

            requiredFields.each(function() {
                const $field = $(this);
                const value = $field.val().trim();

                if (value === '') {
                    $field.parent().addClass('error');
                    isValid = false;
                } else {
                    $field.parent().removeClass('error');
                }

                // Email validation
                if ($field.attr('type') === 'email' && value !== '') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        $field.parent().addClass('error');
                        isValid = false;
                    }
                }
            });

            if (isValid) {
                // Form submission logic would go here
                console.log('Form is valid, ready to submit');
                $(this).text('Wysyłanie...').addClass('submitting');

                // Simulate form submission
                setTimeout(function() {
                    $('.layer-holder-5').text('Wysłano!').addClass('success');
                }, 2000);
            } else {
                // Show error message
                if (!$('.form-error').length) {
                    $('.row-35').after('<div class="form-error">Proszę wypełnić wszystkie wymagane pola.</div>');
                }
            }
        });
    }

    // Scroll Animations
    function handleScrollAnimations() {
        // Simple scroll-based animations
        $(window).on('scroll', function() {
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            $('.o-inwestycji, .row-36, .row-17, .row-34, .lokalizacja, .mieszkania, .galeria, .finansowanie, .o-developerze, .kontakt').each(function() {
                const $element = $(this);
                const elementTop = $element.offset().top;

                if (scrollTop + windowHeight > elementTop + 100) {
                    $element.addClass('animate-in');
                }
            });
        });

        // Trigger initial check
        $(window).trigger('scroll');
    }

    // Apartment Table Scroll
    function handleApartmentTableScroll() {
        const $table = $('.tabela');

        if ($table.length) {
            // Add scroll indicators
            $table.wrap('<div class="table-wrapper"></div>');
            $('.table-wrapper').append('<div class="scroll-indicator left">‹</div><div class="scroll-indicator right">›</div>');

            // Handle scroll indicators
            const $wrapper = $('.table-wrapper');
            const $scrollLeft = $('.scroll-indicator.left');
            const $scrollRight = $('.scroll-indicator.right');

            $table.on('scroll', function() {
                const scrollLeft = this.scrollLeft;
                const maxScroll = this.scrollWidth - this.clientWidth;

                $scrollLeft.toggleClass('visible', scrollLeft > 0);
                $scrollRight.toggleClass('visible', scrollLeft < maxScroll - 10);
            });

            // Click handlers for scroll indicators
            $scrollLeft.on('click', function() {
                $table.animate({ scrollLeft: '-=200' }, 300);
            });

            $scrollRight.on('click', function() {
                $table.animate({ scrollLeft: '+=200' }, 300);
            });

            // Initial check
            $table.trigger('scroll');
        }
    }

    // Responsive Gallery
    function handleResponsiveGallery() {
        const $galleryImages = $('.galeria img');

        $galleryImages.on('click', function() {
            const $this = $(this);
            const src = $this.attr('src');

            // Simple lightbox functionality
            if (!$('.lightbox').length) {
                $('body').append('<div class="lightbox"><div class="lightbox-content"><img src="" alt=""><button class="lightbox-close">×</button></div></div>');
            }

            $('.lightbox img').attr('src', src);
            $('.lightbox').fadeIn(300);
        });

        // Close lightbox
        $(document).on('click', '.lightbox-close, .lightbox', function(e) {
            if (e.target === this) {
                $('.lightbox').fadeOut(300);
            }
        });

        // ESC key to close lightbox
        $(document).on('keyup', function(e) {
            if (e.keyCode === 27) {
                $('.lightbox').fadeOut(300);
            }
        });
    }

    // Helper Functions
    function adjustImageSizes() {
        // Adjust image sizes based on screen size
        const screenWidth = $(window).width();

        if (screenWidth <= 767) {
            // Mobile adjustments
            $('.layer-3, .layer-4, .warstwa-63, .layer-9, .warstwa-64, .layer-22').each(function() {
                const $img = $(this);
                $img.css({
                    'width': '100%',
                    'height': 'auto',
                    'max-width': '100%'
                });
            });
        }
    }

    function updateApartmentInfo(apartmentId) {
        // Placeholder function for apartment selection
        console.log('Selected apartment:', apartmentId);

        // Update apartment details in the dymek
        // This would connect to your apartment data
    }

    // Window resize handler
    $(window).on('resize', function() {
        // Debounce resize events
        clearTimeout(window.resizeTimer);
        window.resizeTimer = setTimeout(function() {
            handleMobileNavigation();
            adjustImageSizes();
        }, 250);
    });

})(jQuery);

// Additional CSS for JavaScript enhancements
const additionalCSS = `
<style>
/* Mobile Navigation Enhancements */
.mobile-nav-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: white;
    padding: 10px;
    cursor: pointer;
}

@media (max-width: 767px) {
    .mobile-nav-toggle {
        display: block;
    }

    .nav-list-2 {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.9);
        padding: 20px;
        border-radius: 8px;
        z-index: 1000;
    }

    .nav-list-2.mobile-nav-open {
        display: flex;
    }
}

/* Touch States */
.touch-active {
    background: #008a05 !important;
    transform: scale(0.98);
}

/* Form States */
.focused {
    box-shadow: 0 0 0 2px #00a906;
}

.error {
    box-shadow: 0 0 0 2px #e74c3c;
}

.has-content {
    background: #f8f9fa;
}

.form-error {
    color: #e74c3c;
    background: #ffeaea;
    padding: 15px;
    border-radius: 5px;
    margin: 20px 0;
    text-align: center;
}

.submitting {
    opacity: 0.7;
    pointer-events: none;
}

.success {
    background: #27ae60 !important;
}

/* Animation Classes */
.animate-in {
    animation: slideInUp 0.6s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Table Scroll Indicators */
.table-wrapper {
    position: relative;
}

.scroll-indicator {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,169,6,0.8);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.5rem;
    z-index: 10;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.scroll-indicator.visible {
    opacity: 1;
}

.scroll-indicator.left {
    left: 10px;
}

.scroll-indicator.right {
    right: 10px;
}

/* Lightbox */
.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.lightbox-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
}

.lightbox img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.lightbox-close {
    position: absolute;
    top: -40px;
    right: 0;
    background: none;
    border: none;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    padding: 5px 10px;
}

/* Image Loading States */
img.loading {
    opacity: 0.5;
    background: #f0f0f0;
}

img.loaded {
    opacity: 1;
    transition: opacity 0.3s ease;
}

img.error {
    opacity: 0.3;
    background: #ffebee;
}

/* Apartment Selection */
.kulki .elipsa-2.selected,
.kulki .elipsa-2-kopia.selected {
    background: #00a906 !important;
    transform: scale(1.1);
}
</style>
`;

// Inject additional CSS
document.head.insertAdjacentHTML('beforeend', additionalCSS);
