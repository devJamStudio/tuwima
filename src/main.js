// Main JavaScript entry point for Future Theme
import './style.css'

// HMR Test for Green House Template
import './hmr-test.js'

// Import all modular CSS files for HMR
import './css/base/_variables.css'
import './css/base/_reset.css'
import './css/base/_typography.css'
import './css/base/_utilities.css'

// Import component CSS files
import './css/components/header.css'
import './css/components/responsive-nav.css'
import './css/components/hero-responsive.css'
import './css/components/about.css'
import './css/components/benefits.css'
import './css/components/layout.css'
import './css/components/location.css'
import './css/components/apartments.css'
import './css/components/apartments-table.css'
import './css/components/gallery.css'
import './css/components/financing.css'
import './css/components/developer.css'
import './css/components/contact.css'
import './css/components/footer.css'

// Import existing JavaScript functionality
import '../js/script.min.js'

// Modern ES6+ JavaScript for theme functionality
class FutureTheme {
  constructor() {
    this.init()
  }

  init() {
    this.setupEventListeners()
    this.initComponents()
  }

  setupEventListeners() {
    document.addEventListener('DOMContentLoaded', () => {
      console.log('Future Theme loaded with Vite + Tailwind CSS 4!')

      // Mobile menu toggle
      this.initMobileMenu()

      // Smooth scrolling for anchor links
      this.initSmoothScrolling()

      // Navbar scroll effect
      this.initNavbarScroll()

      // Lazy loading for images
      this.initLazyLoading()
    })
  }

  initMobileMenu() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle')
    const navList = document.querySelector('.nav-list-2')
    const navOverlay = document.querySelector('.nav-overlay')

    console.log('Mobile menu elements:', {
      mobileMenuToggle: !!mobileMenuToggle,
      navList: !!navList,
      navOverlay: !!navOverlay,
      mobileMenuToggleElement: mobileMenuToggle,
      navListElement: navList
    })

    if (mobileMenuToggle && navList && navOverlay) {
      const openMenu = () => {
        mobileMenuToggle.classList.add('active')
        navList.classList.add('active')
        navOverlay.classList.add('active')
        document.body.style.overflow = 'hidden' // Prevent background scrolling
      }

      const closeMenu = () => {
        mobileMenuToggle.classList.remove('active')
        navList.classList.remove('active')
        navOverlay.classList.remove('active')
        document.body.style.overflow = '' // Restore scrolling
      }

      // Toggle menu on button click
      mobileMenuToggle.addEventListener('click', (e) => {
        console.log('Hamburger clicked!', e)
        if (navList.classList.contains('active')) {
          console.log('Closing menu')
          closeMenu()
        } else {
          console.log('Opening menu')
          openMenu()
        }
      })

      // Close menu when clicking on a link
      navList.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMenu)
      })

      // Close menu when clicking overlay
      navOverlay.addEventListener('click', closeMenu)

      // Close menu on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navList.classList.contains('active')) {
          closeMenu()
        }
      })
    }
  }

  initNavbarScroll() {
    const navbar = document.querySelector('.row-5')

    if (navbar) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
          navbar.classList.add('scrolled')
        } else {
          navbar.classList.remove('scrolled')
        }
      })
    }
  }

  initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault()
        const target = document.querySelector(this.getAttribute('href'))
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          })
        }
      })
    })
  }

  initLazyLoading() {
    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target
            img.src = img.dataset.src
            img.classList.remove('lazy')
            imageObserver.unobserve(img)
          }
        })
      })

      document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img)
      })
    }
  }

  initComponents() {
    // Initialize any custom components here
    this.initContactForm()
    this.initImageGallery()
  }

  initContactForm() {
    const contactForms = document.querySelectorAll('.contact-form')
    contactForms.forEach(form => {
      form.addEventListener('submit', this.handleFormSubmit.bind(this))
    })
  }

  handleFormSubmit(e) {
    e.preventDefault()
    // Add form validation and submission logic
    console.log('Form submitted')
  }

  initImageGallery() {
    // Initialize image gallery if needed
    const galleries = document.querySelectorAll('.image-gallery')
    galleries.forEach(gallery => {
      // Gallery initialization code
    })
  }
}

// Initialize the theme
new FutureTheme()

// Hot Module Replacement for development
if (import.meta.hot) {
  import.meta.hot.accept()
}
