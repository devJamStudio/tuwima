/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './src/**/*.{html,js,php}',
    './template-parts/**/*.php',
    './*.php',
    './html/**/*.html'
  ],
  theme: {
    extend: {
      // Custom breakpoints for IntelliSense support
      screens: {
        'sm': '420px',
        'md': '797px',
        'lg': '1000px',
        'xl': '1440px',
        '2xl': '1920px',
      },
      // Keep your existing customizations
      fontFamily: {
        'sans': ['Montserrat', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'serif': ['Lato', 'ui-serif', 'Georgia', 'serif'],
      },
    },
  },
  plugins: [],
}
