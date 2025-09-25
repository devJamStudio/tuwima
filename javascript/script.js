/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

document.addEventListener("DOMContentLoaded", function() {
	AOS.init({
		once: true, // Animations only happen once
		duration: 1000, // Default animation duration
	});

	setTimeout(() => {
		document.getElementById('loader').classList.add('hidden')

	}, 500);
	const scrollIcon = document.querySelector('header .scroll-icon');
	Fancybox.bind('[data-fancybox="gallery"]', {
		// Your custom options for a specific gallery
	});

	const mobileMenuToggle = document.getElementById('mobile-menu__toggle');
	const mobileNavigation = document.getElementById('mobile-navigation');
	const mobileMenuToggleClose = document.getElementById('mobile-menu__toggle-close');

	const bgOverlay = document.getElementById('nav__bg--overlay');
	if (scrollIcon) {
		scrollIcon.addEventListener('click', function () {
			const position = window.innerHeight - 116
			window.scrollTo({top: position, behavior: 'smooth'});
		});
	}
	mobileMenuToggle.addEventListener('click', function () {
		// Toggle the 'active' class on the mobile navigation
		mobileNavigation.classList.toggle('active');
		const hamburger = document.querySelector('.hamburger-lines');
		hamburger.classList.toggle('active')
		bgOverlay.classList.toggle('hidden')
		bgOverlay.classList.toggle('active')

		const navbarContainer = document.querySelector('.navbar__container');
		navbarContainer.classList.toggle('mobile__nav--open')
		// Optionally, you can also toggle a class on the button for styling
		this.classList.toggle('is-active');
	});
	mobileMenuToggleClose.addEventListener('click', function () {
		// Toggle the 'active' class on the mobile navigation
		mobileNavigation.classList.toggle('active');
		const hamburger = document.querySelector('.hamburger-lines');
		hamburger.classList.toggle('active')
		bgOverlay.classList.toggle('hidden')
		bgOverlay.classList.toggle('active')

		const navbarContainer = document.querySelector('.navbar__container');
		navbarContainer.classList.toggle('mobile__nav--open')
		// Optionally, you can also toggle a class on the button for styling
		this.classList.toggle('is-active');
	});
	bgOverlay.addEventListener('click', function () {
		// Toggle the 'active' class on the mobile navigation
		mobileNavigation.classList.toggle('active');
		const hamburger = document.querySelector('.hamburger-lines');
		hamburger.classList.toggle('active')
		bgOverlay.classList.toggle('hidden')
		bgOverlay.classList.toggle('active')

		const navbarContainer = document.querySelector('.navbar__container');
		navbarContainer.classList.toggle('mobile__nav--open')
		// Optionally, you can also toggle a class on the button for styling
		this.classList.toggle('is-active');
	});
	//lightbox.init()
	new Swiper(".hero-swiper", {
		loop: true,
		direction: "horizontal",

		autoplay: {
			delay: 5e3,
			disableOnInteraction: false
		},
		pagination: {
			el: ".hero-swiper-pagination",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + "</span>";
			}
		},
		effect: "fade",

	});
	new Swiper(".card-carousel-swiper", {
		loop: true,
		navigation: {
			nextEl: '.card-carousel-swiper-button-next', // Custom next button
			prevEl: '.card-carousel-swiper-button-prev', // Custom prev button
		},
		pagination: {
			el: '.card-carousel-pagination',
			clickable: true,
		},
		slidesPerView: 1,
		spaceBetween: 20,
		breakpoints: {
			768: {
				slidesPerView: 2,
				spaceBetween: 30,
			},

			1440: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			1920: {
				slidesPerView: 4,
				spaceBetween: 60,
			},
		},
		on: {
			afterInit: function (swiper) {
				updateButtonState(swiper);
			},
			slideChange: function (swiper) {
				updateButtonState(swiper);
			},
		},
	});
	new Swiper(".recommendations-swiper", {
		loop: true,
		slidesPerView: 1,
		spaceBetween: 8,
		autoplay: {
			delay: 2500,
			stopOnLastSlide: true,
		},
		pagination: {
			el: '.recommendations-pagination',
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 3,
				spaceBetween: 16,

			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 32,
				effect: 'fade',

			},
			1920: {
				slidesPerView: 4,
				spaceBetween: 64,
				effect: 'fade',

			},
		},

	});
	function updateButtonState(swiper) {
		const prevButton = document.querySelector('.card-carousel-swiper-button-prev');
		const nextButton = document.querySelector('.card-carousel-swiper-button-next');

		if (swiper.isBeginning) {
			prevButton.classList.add('swiper-button-disabled');
		} else {
			prevButton.classList.remove('swiper-button-disabled');
		}

		if (swiper.isEnd) {
			nextButton.classList.add('swiper-button-disabled');
		} else {
			nextButton.classList.remove('swiper-button-disabled');
		}
	}



// Run the function on load
	//window.addEventListener('load', adjustAnimatedLinesWidth);

// Run the function on resize
	//window.addEventListener('resize', adjustAnimatedLinesWidth);

	function handleScroll() {
		const navbarContainer = document.querySelector('.navbar__container');
		const siteLogoWrapper = document.querySelector('.logo__wrapper');
		const navWrapper = document.querySelector('.nav__wrapper');

		const customLogo = document.querySelector('.custom-logo-link');
		const scrollLogo = document.querySelector('.scroll-logo-link');

		const mobileNav = document.querySelector('#mobile-navigation')
		if (navbarContainer ) {
			if (window.scrollY > 0) {
				navbarContainer.classList.add('nav--scroll');
				siteLogoWrapper.classList.add('nav--scroll');
				mobileNav.classList.add('nav--scroll');
				customLogo.classList.add('nav--scroll');
				scrollLogo.classList.add('nav--scroll');
				navWrapper.classList.add('nav--scroll');


			} else {
				navbarContainer.classList.remove('nav--scroll');
				siteLogoWrapper.classList.remove('nav--scroll');
				mobileNav.classList.remove('nav--scroll');
				customLogo.classList.remove('nav--scroll');
				scrollLogo.classList.remove('nav--scroll');
				navWrapper.classList.remove('nav--scroll');

			}
		}
	}





	function handleProjectHover() {
		const projectLinks = document.querySelectorAll('.project-link')
		projectLinks.forEach((link) => {
			link.addEventListener('mouseover', () => {
				link.classList.add('project__link--hover')
				Array.from(link.children).forEach((child) => {
					child.classList.add('project__link--hover')
				})

			})
			link.addEventListener('mouseout', () => {
				link.classList.remove('project__link--hover')
				Array.from(link.children).forEach((child) => {
					child.classList.remove('project__link--hover')
				})
			})

		})
	}

	handleProjectHover();
	window.addEventListener('load', handleProjectHover);
	window.addEventListener('scroll', handleScroll);

	// Smooth scrolling for anchor links
	function handleSmoothScrolling() {
		const links = document.querySelectorAll('a[href^="#"]');

		links.forEach(link => {
			link.addEventListener('click', function(e) {
				const href = this.getAttribute('href');

				// Skip if it's just "#" or empty
				if (href === '#' || href === '') return;

				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();

					// Calculate offset for fixed header
					const headerHeight = document.querySelector('.navbar__container')?.offsetHeight || 0;
					const targetPosition = target.offsetTop - headerHeight - 20;

					window.scrollTo({
						top: targetPosition,
						behavior: 'smooth'
					});
				}
			});
		});
	}

	// Initialize smooth scrolling
	handleSmoothScrolling();
	const inViewport = (elem) => {
		let allElements = document.getElementsByClassName(elem);
		let windowHeight = window.innerHeight * 0.95  ;
		const elems = () => {
			for (let i = 0; i < allElements.length; i++) {  //  loop through the sections
				let viewportOffset = allElements[i].getBoundingClientRect();  //  returns the size of an element and its position relative to the viewport
				let top = viewportOffset.top;  //  get the offset top
				if(top < windowHeight){  //  if the top offset is less than the window height
					allElements[i].classList.add('animate');
					setTimeout(() => {
						allElements[i].classList.add('clear')
					}, 1000);
				}
			}
		}
		elems();
		window.addEventListener('scroll', elems);
	}

	if (document.body.classList.contains('single')) {
		// Get the menu item with the specific ID
		var menuItem = document.querySelector('.news-item');
		// If the menu item exists, add the 'active' and 'current-menu-item' classes
		if (menuItem) {
			menuItem.classList.add('active', 'current-menu-item');
		}
	}
	function isIPhone() {
		return /iPhone/i.test(navigator.userAgent);
	}

	if (isIPhone()) {
		const videoContainer = document.getElementById("video-container");
		const videoElement = videoContainer.querySelector("video");
		const sourceElement = videoElement.querySelector("source");

		if (sourceElement) {
			const videoUrl = sourceElement.getAttribute("src");

			// Replace <video> with a <div> having a background video
			const divElement = document.createElement("div");
			divElement.className = "slide-bg";
			divElement.style.background = `url('${videoUrl}') no-repeat center center / cover`;
			divElement.style.width = "100%";
			divElement.style.height = "100%";

			// Remove the <video> element
			videoContainer.innerHTML = "";
			videoContainer.appendChild(divElement);
		}
	}
	const showMoreContent = document.querySelector(".show-more-content");
	const showMoreButton = document.getElementById("show_more");
	const showLessButton = document.getElementById("show_less");

	if (showMoreContent && showMoreButton && showLessButton) {
		// Initially hide the show-more-content section
		showMoreContent.style.display = "none";

		// Add event listener to show more button
		showMoreButton.addEventListener("click", function () {
			showMoreContent.style.display = "block"; // Show the content
			showMoreButton.style.display = "none";  // Hide the "show more" button
		});

		// Add event listener to show less button
		showLessButton.addEventListener("click", function () {
			showMoreContent.style.display = "none"; // Hide the content
			showMoreButton.style.display = "inline-block"; // Show the "show more" button
		});
	}
});
