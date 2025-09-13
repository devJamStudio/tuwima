// Main JavaScript entry point for Future Theme
import './style.css'
import '../css/style.css'

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

      // Lazy loading for images
      this.initLazyLoading()
    })
  }

  initMobileMenu() {
    const mobileMenuToggle = document.querySelector('[data-mobile-menu-toggle]')
    const mobileMenu = document.querySelector('[data-mobile-menu]')

    if (mobileMenuToggle && mobileMenu) {
      mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden')
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
