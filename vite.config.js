import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import { writeFileSync, unlinkSync, copyFileSync, mkdirSync, readdirSync, statSync } from 'fs'
import { join, dirname } from 'path'

export default defineConfig({
  plugins: [
    tailwindcss(),
    {
      name: 'php-watcher',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          console.log(`🔄 PHP file changed: ${file}`)
          // For green-house template parts, do a full reload
          if (file.includes('green-house') || file.includes('template-parts')) {
            console.log(`🏠 Green House template part changed: ${file}`)
          }
          server.ws.send({ type: 'full-reload' })
          return []
        }
      }
    },
    {
      name: 'hot-file-manager',
      configureServer(server) {
        // Create hot file when dev server starts
        const hotFile = './hot'
        const port = server.config.server?.port || 5174
        const devServerUrl = `http://localhost:${port}`

        try {
          writeFileSync(hotFile, devServerUrl)
          console.log(`🔥 Hot file created: ${devServerUrl}`)
        } catch (e) {
          console.warn('Could not create hot file:', e.message)
        }

        // Also create on server ready
        server.ws.on('connection', () => {
          try {
            writeFileSync(hotFile, devServerUrl)
          } catch (e) {
            // Ignore
          }
        })
      },
      buildStart() {
        // Create hot file when build starts (for dev mode)
        const hotFile = './hot'
        const devServerUrl = 'http://localhost:5174'
        try {
          writeFileSync(hotFile, devServerUrl)
          console.log(`🔥 Hot file created on build start: ${devServerUrl}`)
        } catch (e) {
          console.warn('Could not create hot file:', e.message)
        }
      },
      buildEnd() {
        // Remove hot file when build ends
        try {
          unlinkSync('./hot')
          console.log('🔥 Hot file removed')
        } catch (e) {
          // File might not exist, ignore
        }
      }
    },
    {
      name: 'copy-images',
      buildStart() {
        // Copy images from html/images to both theme root /images/ and dist/images/ during build
        const htmlImagesDir = './html/images'
        const themeImagesDir = './images'
        const distImagesDir = './dist/images'

        try {
          // Create directories if they don't exist
          mkdirSync(themeImagesDir, { recursive: true })
          mkdirSync(distImagesDir, { recursive: true })

          // Copy all image files
          const copyImages = (srcDir, destDir) => {
            const files = readdirSync(srcDir)
            for (const file of files) {
              const srcPath = join(srcDir, file)
              const destPath = join(destDir, file)
              const stat = statSync(srcPath)

              if (stat.isDirectory()) {
                mkdirSync(destPath, { recursive: true })
                copyImages(srcPath, destPath)
              } else if (/\.(png|jpg|jpeg|gif|svg|webp)$/i.test(file)) {
                copyFileSync(srcPath, destPath)
                console.log(`📁 Copied image: ${file}`)
              }
            }
          }

          // Copy to theme root
          copyImages(htmlImagesDir, themeImagesDir)
          console.log('✅ Images copied to /images/')

          // Copy to dist folder
          copyImages(htmlImagesDir, distImagesDir)
          console.log('✅ Images copied to /dist/images/')
        } catch (e) {
          console.warn('Could not copy images:', e.message)
        }
      }
    }
  ],

  server: {
    host: '0.0.0.0', // Bind to all interfaces
    port: 5174,
    cors: {
      origin: [
        'http://localhost:8888',
        'http://127.0.0.1:8888',
        'http://localhost:8888/tuwima',
        'http://127.0.0.1:8888/tuwima'
      ],
      credentials: true
    },
    hmr: {
      port: 24678,
      host: 'localhost',
      overlay: true
    }
  },

  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: './src/main.js'
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name]].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name && assetInfo.name.endsWith('.css')) {
            return 'css/[name].[ext]'
          }
          // Don't put images in dist - they're copied to theme root /images/
          if (assetInfo.name && /\.(png|jpg|jpeg|gif|svg|webp)$/i.test(assetInfo.name)) {
            return 'assets/[name].[ext]'
          }
          return 'assets/[name].[ext]'
        }
      }
    },
    manifest: true, // Generate manifest.json for production
    copyPublicDir: false // We'll handle image copying manually
  },

          css: {
            devSourcemap: true
          }
})
