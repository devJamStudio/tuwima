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
					const targetPosition = target.offsetTop - 20;

					window.scrollTo({
						top: targetPosition,
						behavior: 'smooth'
					});
				}
			});
		});

		// Active navigation highlighting
		const sections = document.querySelectorAll('section[id]');
		const navLinks = document.querySelectorAll('.nav-list-2 a[href^="#"]');

		function highlightNavigation() {
			let current = '';
			sections.forEach(function(section) {
				const sectionTop = section.offsetTop;
				const sectionHeight = section.clientHeight;
				if (window.scrollY >= (sectionTop - 200)) {
					current = section.getAttribute('id');
				}
			});

			navLinks.forEach(function(link) {
				link.parentElement.parentElement.classList.remove('selected');
				if (link.getAttribute('href') === '#' + current) {
					link.parentElement.parentElement.classList.add('selected');
				}
			});
		}

		window.addEventListener('scroll', highlightNavigation);
		highlightNavigation(); // Call once on load
	});
	</script>

	<div id="content">
		<div id="loader" class="loader">
			<div class="logo">
				<img src="<?php echo  esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) );;?>"/>
			</div>
		</div>
