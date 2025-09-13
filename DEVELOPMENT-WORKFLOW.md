# 🚀 Development Workflow Guide

## How it Works

The Future theme now uses **Vite** for modern development with **hot module replacement**. Here's how to use it:

## 🛠️ Setup Steps

### 1. Enable WordPress Debug Mode
In your `wp-config.php`, make sure you have:
```php
define('WP_DEBUG', true);
```

### 2. Start the Vite Dev Server
```bash
cd wp-content/themes/future
npm run dev
```
This starts Vite at `http://localhost:3000` (assets only, not your site)

### 3. Access Your WordPress Site
Visit your WordPress site normally (e.g., `http://localhost/your-site`)

**The magic:** When `WP_DEBUG` is true and Vite dev server is running, WordPress will automatically load assets from Vite with hot reload!

## 🔥 Development Experience

### With Vite Dev Server Running:
- ✅ **Hot Module Replacement** - Changes appear instantly
- ✅ **Fast builds** - Vite compiles in milliseconds  
- ✅ **Modern CSS/JS** - Latest features supported
- ✅ **Source maps** - Easy debugging

### Without Vite Dev Server:
- ✅ **Production assets** - Uses built files from `dist/`
- ✅ **Fallback mode** - Uses original CSS/JS if no built files

## 📁 File Structure

```
wp-content/themes/future/
├── src/
│   ├── main.js          # JavaScript entry point
│   └── style-minimal.css # CSS entry point (Tailwind + custom)
├── dist/                # Built files (auto-generated)
│   ├── css/main.css     # Production CSS
│   └── js/main.js       # Production JS
├── vite.config.js       # Vite configuration
└── package.json         # Dependencies & scripts
```

## 🎯 Workflow

### Development:
1. **Start Vite:** `npm run dev`
2. **Edit files:** `src/main.js` or `src/style-minimal.css`
3. **See changes instantly** in your WordPress site
4. **No page refresh needed!**

### Production:
1. **Build assets:** `npm run build`
2. **Deploy:** Upload `dist/` folder with your theme
3. **WordPress automatically uses built files**

## 🎨 Adding Styles

### Tailwind Classes
Add Tailwind classes directly in your PHP templates:
```php
<div class="bg-green-500 text-white p-4 rounded-lg">
    Hello World!
</div>
```

### Custom CSS
Add to `src/style-minimal.css`:
```css
@layer components {
  .my-custom-button {
    @apply bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600;
  }
}
```

### Custom JavaScript
Add to `src/main.js`:
```javascript
// Your custom JavaScript here
console.log('Theme loaded!')
```

## 🐛 Troubleshooting

### Vite dev server shows 404
- ✅ **This is normal!** Vite only serves assets, not your WordPress site
- ✅ **Access your WordPress site** at its normal URL
- ✅ **Vite assets load automatically** when dev server is running

### Hot reload not working
- ✅ Check `WP_DEBUG` is `true` in `wp-config.php`
- ✅ Make sure Vite dev server is running (`npm run dev`)
- ✅ Check browser console for any errors

### Assets not loading
- ✅ Run `npm run build` to generate production assets
- ✅ Check `dist/` folder exists with CSS/JS files
- ✅ Clear any caching plugins

## 📊 Performance Benefits

### Development:
- **10x faster** than Gulp
- **Instant updates** with HMR
- **Better debugging** with source maps

### Production:
- **Smaller bundles** with tree-shaking
- **Modern output** for better performance
- **Optimized assets** automatically

---

**Happy coding! 🎉** Your WordPress theme now has a modern development workflow!

