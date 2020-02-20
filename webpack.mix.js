const mix = require('laravel-mix').setPublicPath('dist').setResourceRoot('/wp-content/themes/boostcreators/dist');
const purgecssWordpress = require('purgecss-with-wordpress');
const glob = require('glob-all');
const PurgecssPlugin = require('purgecss-webpack-plugin');


mix.copy('resources/assets/fonts/*', 'dist/fonts')
  .sass('resources/assets/styles/main.scss', 'dist/styles')
  .sass('resources/assets/styles/admin.scss', 'dist/styles')
  .js('resources/assets/scripts/main.js', 'dist/scripts')
  .copy('resources/assets/scripts/jquery.sticky.js', 'dist/scripts')
  .copy('resources/assets/scripts/jquery.matchheight.js', 'dist/scripts')
  .copyDirectory('resources/assets/images', 'dist/images')
  .version()
  .disableNotifications();

// mix.webpackConfig({
//   plugins: [
//     // ...
//     new PurgecssPlugin({
//       only: ['main'],
//       paths: glob.sync([
//         'app/**/*.php',
//         'resources/blocks/**/*.php',
//         'resources/views/**/*.php',
//         'resources/assets/scripts/**/*.js',
//       ]),
//       whitelist: [ // Only if you need it!
//         ...purgecssWordpress.whitelist,
//         'pr3', 'pv2', 'ph3',
//         'mb1',
//         'input',
//         'tracked-mega'
//       ],
//       whitelistPatterns: [
//         ...purgecssWordpress.whitelistPatterns,
//       ]
//     }),
//   ],
// });