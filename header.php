<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CertExpert
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/html/images/favicon.ico">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/html/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/html/images/favicon-16x16.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/html/images/apple-touch-icon.png">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
	/>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page">
	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'future' ); ?></a>

	<!-- Navigation Header - Separate from hero -->
	<?php get_template_part( 'template-parts/green-house/navbar' ); ?>

	<!-- Hero Section -->
	<header class="heder">
		<div class="baner">
			<div class="warstwa-47-holder">
				<div class="heder-2">
					<?php get_template_part( 'template-parts/green-house/hero' ); ?>
				</div>
			</div>
		</div>
	</header>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Smooth scrolling for anchor links
		const anchorLinks = document.querySelectorAll('a[href^="#"]');
		anchorLinks.forEach(function(link) {
			link.addEventListener('click', function(e) {
				const href = this.getAttribute('href');
				if (href === '#') return;

				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();
					// Calculate offset for sticky header
					const header = document.querySelector('.row-5');
					const headerHeight = header ? header.offsetHeight : 0;
					const targetPosition = target.offsetTop - headerHeight - 20;

					window.scrollTo({
						top: targetPosition,
						behavior: 'smooth'
					});
				}
			});
		});

		// Active navigation highlighting
		const navLinks = document.querySelectorAll('.nav-list-2 a[href^="#"]');

		// Define the sections we want to track (both section tags and divs with IDs)
		const sectionSelectors = [
			'#o-inwestycji',
			'#lokalizacja',
			'#mieszkania',
			'#galeria',
			'#finansowanie',
			'#kontakt'
		];

		function highlightNavigation() {
			let current = '';
			const scrollPosition = window.scrollY + 200; // Offset for better UX

			// Find the current section based on scroll position
			sectionSelectors.forEach(function(selector) {
				const element = document.querySelector(selector);
				if (element) {
					const elementTop = element.offsetTop;
					const elementHeight = element.offsetHeight;

					// Check if this section is currently in view
					if (scrollPosition >= elementTop && scrollPosition < (elementTop + elementHeight)) {
						current = element.getAttribute('id');
					}
					// Also check if we're past the top of this section but haven't reached the next one
					else if (scrollPosition >= elementTop) {
						current = element.getAttribute('id');
					}
				}
			});

			// Update navigation highlighting
			navLinks.forEach(function(link) {
				const textItem = link.parentElement;
				textItem.classList.remove('selected');
				if (link.getAttribute('href') === '#' + current) {
					textItem.classList.add('selected');
				}
			});
		}

		window.addEventListener('scroll', highlightNavigation);

		// Initialize navigation highlighting on page load
		highlightNavigation();

		// Also initialize after a short delay to ensure all elements are loaded
		setTimeout(highlightNavigation, 100);
	});

	// Aggressive loader removal - force hide loader if it's still visible
	(function() {
		function forceHideLoader() {
			const loader = document.getElementById('loader');
			if (loader && !loader.classList.contains('hidden')) {
				loader.style.display = 'none';
				loader.classList.add('hidden');
				console.log('Loader force-hidden after timeout');
			}
		}

		// Try multiple times to hide loader (extended timing)
		setTimeout(forceHideLoader, 2000);
		setTimeout(forceHideLoader, 3500);
		setTimeout(forceHideLoader, 6000);

		// Also hide on window load (extended timing)
		window.addEventListener('load', function() {
			setTimeout(forceHideLoader, 1500);
		});
	})();

	// Ensure Fancybox works for all images
	document.addEventListener('DOMContentLoaded', function() {
		// Wait for Fancybox to load
		function initFancyboxForAllImages() {
			if (typeof Fancybox !== 'undefined') {
				// Simple Fancybox initialization
				Fancybox.bind("[data-fancybox]", {
					Toolbar: {
						display: {
							left: ["infobar"],
							middle: ["zoomIn", "zoomOut"],
							right: ["slideshow", "close"]
						}
					},
					Images: {
						zoom: true
					}
				});

				// Make ALL images clickable if they don't have data-fancybox
				document.querySelectorAll('img').forEach(function(img) {
					if (!img.hasAttribute('data-fancybox') &&
						!img.closest('nav') &&
						!img.closest('.navbar') &&
						!img.closest('.logo') &&
						!img.closest('.contact-button') &&
						img.src &&
						!img.src.includes('data:image') &&
						img.offsetWidth > 50 &&
						img.offsetHeight > 50) {

						img.setAttribute('data-fancybox', 'all-images');
						img.setAttribute('data-src', img.src);
						img.style.cursor = 'pointer';
					}
				});

				console.log('Fancybox initialized for all images');
			} else {
				console.log('Fancybox not loaded yet, retrying...');
				setTimeout(initFancyboxForAllImages, 500);
			}
		}

		// Initialize immediately and with delays
		initFancyboxForAllImages();
		setTimeout(initFancyboxForAllImages, 1000);
		setTimeout(initFancyboxForAllImages, 3000);
	});

	// Fallback lightbox if Fancybox fails
	document.addEventListener('click', function(e) {
		if (e.target.tagName === 'IMG' &&
			!e.target.closest('nav') &&
			!e.target.closest('.navbar') &&
			!e.target.closest('.logo') &&
			!e.target.closest('.contact-button') &&
			e.target.src &&
			!e.target.src.includes('data:image') &&
			e.target.offsetWidth > 50 &&
			e.target.offsetHeight > 50) {

			// Check if Fancybox is working
			if (typeof Fancybox === 'undefined' || !e.target.hasAttribute('data-fancybox')) {
				e.preventDefault();
				e.stopPropagation();

				// Create simple lightbox
				var lightbox = document.createElement('div');
				lightbox.style.cssText = `
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background: rgba(0,0,0,0.9);
					z-index: 9999;
					display: flex;
					align-items: center;
					justify-content: center;
					cursor: pointer;
				`;

				var img = document.createElement('img');
				img.src = e.target.src;
				img.style.cssText = `
					max-width: 90%;
					max-height: 90%;
					object-fit: contain;
				`;

				lightbox.appendChild(img);
				document.body.appendChild(lightbox);

				// Close on click
				lightbox.addEventListener('click', function() {
					document.body.removeChild(lightbox);
				});

				// Close on ESC
				document.addEventListener('keydown', function escHandler(event) {
					if (event.key === 'Escape') {
						document.body.removeChild(lightbox);
						document.removeEventListener('keydown', escHandler);
					}
				});
			}
		}
	});
	</script>

	<style>
	.loader {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		background: #fff;
		z-index: 9999;
		display: flex;
		align-items: center;
		justify-content: center;
		transition: opacity 0.5s ease-out;
	}

	.loader.hidden {
		opacity: 0;
		pointer-events: none;
		display: none !important;
	}

	.loader .logo {
		width: 200px;
		height: 200px;
		position: relative;
		padding: 8px;
	}

	.loader .logo:before {
		content: "";
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border-radius: 50%;
		background-image: conic-gradient(#00a906, transparent 240deg);
		animation: rotate 1s linear infinite;
	}

	.loader .logo:after {
		content: "";
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 94%;
		height: 94%;
		background: #fff;
		border-radius: 50%;
		z-index: 1;
	}

	.loader .logo img {
		width: 100%;
		height: 100%;
		padding: 20%;
		object-fit: contain;
		object-position: center;
		position: relative;
		z-index: 2;
	}

	@keyframes rotate {
		from {
			transform: rotate(360deg);
		}
		to {
			transform: rotate(0);
		}
	}
	</style>

	<div id="content">
		<div id="loader" class="loader">
			<div class="logo">
				<?php
				$custom_logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
				$fallback_logo = get_template_directory_uri() . '/images/logo.png';
				$logo_url = $custom_logo ? $custom_logo : $fallback_logo;
				?>
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo get_bloginfo('name'); ?>" width="48" height="52" onerror="console.log('Loader image failed to load: <?php echo esc_js($logo_url); ?>')"/>
			</div>
		</div>
