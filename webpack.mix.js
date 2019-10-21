const mix = require('laravel-mix').setPublicPath('dist').setResourceRoot('/wp-content/themes/boostcreators/dist');

mix.copy('resources/assets/fonts/*', 'dist/fonts')
  .sass('resources/assets/styles/main.scss', 'dist/styles')
  .sass('resources/assets/styles/admin.scss', 'dist/styles')
  .js('resources/assets/scripts/main.js', 'dist/scripts')
  .copy('resources/assets/scripts/jquery.sticky.js', 'dist/scripts')
  .copy('resources/assets/scripts/jquery.matchheight.js', 'dist/scripts')
  .copyDirectory('resources/assets/images', 'dist/images')
  .version()
  .disableNotifications();
