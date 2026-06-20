import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/css/print.css', 'resources/js/app.js'],
      refresh: true,
      fonts: [
        bunny('Onest', {
          weights: [400, 500, 600],
        }),
        bunny('Instrument Serif'),
      ],
    }),
    tailwindcss(),
  ],
  server: {
    watch: {
      ignored: ['**/storage/framework/views/**'],
    },
  },
});
