import path from 'path'
import { defineConfig } from 'vite'

export default defineConfig({
  root: 'resources',
  plugins: [],
  resolve: {
    alias: {
      '@': path.join(__dirname, 'resources/js'),
      Component: path.join(__dirname, 'resources/js/components'),
    },
  },
  build: {
    manifest: true,
    emptyOutDir: true,
    outDir: '../../../public/vendor/{{ name }}',
    rollupOptions: {
      input: '/js/main.js',
    }
  }
})
