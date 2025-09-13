# 🚀 Future Theme - Vite + Tailwind CSS 4 Setup

## ⚡ What's New

- **Vite** - Lightning fast build tool (replaces Gulp)
- **Tailwind CSS 4** - Latest version with improved performance
- **Modern JavaScript** - ES6+ modules with Hot Module Replacement
- **Better Developer Experience** - Faster builds and instant updates

## 📦 Installation

1. **Install dependencies:**
   ```bash
   npm install
   ```

2. **Development mode:**
   ```bash
   npm run dev
   ```
   This starts Vite dev server at `http://localhost:3000`

3. **Build for production:**
   ```bash
   npm run build
   ```
   This creates optimized files in the `dist/` folder

## 🔧 Available Scripts

- `npm run dev` - Start development server with hot reload
- `npm run build` - Build for production
- `npm run preview` - Preview production build
- `npm run sass:watch` - Watch SCSS files (if needed)
- `npm run sass:build` - Build SCSS files

## 📁 Project Structure

```
src/
├── main.js          # Main JavaScript entry point
├── style.css        # Main CSS entry point (imports Tailwind)
dist/                # Built files (auto-generated)
├── css/
│   └── style.css    # Compiled CSS
└── js/
    └── main.js      # Compiled JavaScript
```

## 🎨 Tailwind CSS 4 Features

### New Syntax
```css
/* Tailwind CSS 4 uses @import instead of @tailwind */
@import "tailwindcss";

/* Layer syntax remains the same */
@layer components {
  .btn {
    @apply px-4 py-2 rounded;
  }
}
```

### Performance Improvements
- **Faster compilation** - Up to 10x faster than v3
- **Smaller bundle size** - Only includes used styles
- **Better tree-shaking** - More efficient dead code elimination

## 🔥 Vite Benefits

### Development
- **Instant server start** - No bundling in dev mode
- **Lightning fast HMR** - Updates in milliseconds
- **Source maps** - Better debugging experience

### Production
- **Optimized bundles** - Tree-shaking and code splitting
- **Asset optimization** - Automatic image optimization
- **Modern output** - ES modules for modern browsers

## 🛠️ WordPress Integration

### Enqueuing Assets
Update your `functions.php` to enqueue the built assets:

```php
function future_theme_assets() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        // Development - load from Vite dev server
        wp_enqueue_script(
            'future-theme-dev',
            'http://localhost:3000/src/main.js',
            [],
            null,
            true
        );
    } else {
        // Production - load built files
        wp_enqueue_style(
            'future-theme-style',
            get_template_directory_uri() . '/dist/css/style.css',
            [],
            filemtime(get_template_directory() . '/dist/css/style.css')
        );
        
        wp_enqueue_script(
            'future-theme-script',
            get_template_directory_uri() . '/dist/js/main.js',
            [],
            filemtime(get_template_directory() . '/dist/js/main.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'future_theme_assets');
```

## 🎯 Development Workflow

1. **Start development:**
   ```bash
   npm run dev
   ```

2. **Edit files:**
   - CSS: `src/style.css`
   - JavaScript: `src/main.js`
   - PHP: Any `.php` file (auto-reloads)

3. **Build for production:**
   ```bash
   npm run build
   ```

4. **Deploy:**
   - Upload the `dist/` folder
   - Ensure production assets are enqueued

## 🚨 Migration Notes

### From Gulp to Vite
- **Old:** `gulp watch` → **New:** `npm run dev`
- **Old:** `gulp sass` → **New:** `npm run build`
- **Old:** BrowserSync → **New:** Vite HMR

### Tailwind CSS 3 → 4
- Configuration syntax updated to ES modules
- `@tailwind` directives replaced with `@import "tailwindcss"`
- Improved performance and smaller bundles

## 🐛 Troubleshooting

### Port conflicts
If port 3000 is busy, Vite will automatically use the next available port.

### Hot reload not working
Make sure you're accessing your site through the Vite dev server URL.

### Build errors
Check that all imports in `src/main.js` and `src/style.css` are correct.

## 📚 Resources

- [Vite Documentation](https://vitejs.dev/)
- [Tailwind CSS 4 Documentation](https://tailwindcss.com/docs)
- [WordPress + Vite Integration](https://vitejs.dev/guide/backend-integration.html)

---

**Happy coding with the modern Future Theme! 🎉**

