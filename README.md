# Boost Creators WordPress Starter Theme

This theme is a copy from the [Sage](https://github.com/roots/sage) theme and used for sites build by Boost Creators.

## Features

* Sass for stylesheets
* Modern JavaScript
* Laravel Mix 
* [Blade](https://laravel.com/docs/5.6/blade) as a templating engine
* [Controller](https://github.com/soberwp/controller) for passing data to Blade templates
* CSS framework (optional): [Bootstrap 4](https://getbootstrap.com/)

## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 8.0.0
* [Yarn](https://yarnpkg.com/en/docs/install)

## Theme installation
* Run `composer install` to install the composer packages
* Run `yarn install` to install all the Yarn packages for development
* Run `yarn build` or `yarn watch` to build 

## Theme development

* Run `yarn` from the theme directory to install dependencies
* Update `resources/assets/config.json` settings:
  * `devUrl` should reflect your local development hostname
  * `publicPath` should reflect your WordPress folder structure (`/wp-content/themes/sage` for non-[Bedrock](https://roots.io/bedrock/) installs)

### Build commands

* `yarn watch` — Compile assets when file changes are made, start Browsersync session
* `yarn build` — Compile and optimize the files in your assets directory
* `yarn build:production` — Compile assets for production

## Documentation

* [Sage documentation](https://roots.io/sage/docs/)
* [Controller documentation](https://github.com/soberwp/controller#usage)