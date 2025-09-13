import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [tailwindcss()],

  // Build configuration
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: './src/main.js'
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'css/[name].[ext]'
          }
          return 'assets/[name].[ext]'
        }
      }
    }
  },

  // Development server with WordPress proxy
  server: {
    host: 'localhost',
    port: 3000,
    open: true,
    cors: true,
    hmr: {
      host: 'localhost'
    },
    proxy: {
      // Proxy all requests except assets to your WordPress site
      '^(?!/src).*': {
        target: 'http://localhost:8888/tuwima', // Your WordPress URL
        changeOrigin: true,
        secure: false,
        configure: (proxy, options) => {
          proxy.on('proxyReq', (proxyReq, req, res) => {
            // Log proxied requests for debugging
            console.log('Proxying:', req.method, req.url);
          });
        }
      }
    }
  },

  // CSS configuration
  css: {
    devSourcemap: true,
    preprocessorOptions: {
      scss: {
        additionalData: `@import "./scss/abstracts/_variables.scss";`
      }
    }
  }
})
