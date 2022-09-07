# Tailwind Profile for RockFrontend
This module extends [RockFrontend](https://github.com/baumrock/RockFrontend) with an installable profile for developing ProcessWire projects with Tailwind CSS

## Build Pipeline
A folder "rockfrontendtailwind" will be installed in `site/templates`. That folder contains all the configuration files for a build pipeline for JS and CSS with
- webpack
- tailwindcss
- postcss with postcss-preset-env (for autoprefixing)
- babel (for transpiling)

By default compiled files (main.css and main.js) will be saved to `site/templates/assets`. This can be adjusted (see chapter Configuration files below)

Also a file "_main.php" will be installed to `site/templates`. It contains the minimal setup to load the compiled assets.

## Installation
**manual**

Copy the folder "RockFrontendTailwind" to `site/modules`

**with git**

`cd site/modules && git clone https://github.com/gebeer/RockFrontendTailwind.git` 

Install the module from ProcessWire Backend

## Initial setup
1. rename `site/templates/rockfrontendtailwind/.env-default` to `site/templates/rockfrontendtailwind/.env`
2. Open a terminal inside `site/templates/rockfrontendtailwind`
3. install dependencies: `npm install`

## Usage 
- watch files during development: `npm run watch`
- build for production: `npm run build` 


## Configuration files
**.env**

You can configure the entry file path and output path for webpack inside the .env file to suit your setup.

**.browserslist**

Configure browsers that you need to support. CSS will be autoprefixed and JS will be transpiled based on this file

**.babelrc**

Only needs to be adjusted if you update core-js version. This module uses @babel/preset-env and corejs to transpile modern JS and make older browsers understand it. Through core-js polyfills will be added automatically depending on which 'modern' JS APIs are being used in your project.

**.nvmrc**

Defines the node version to use. This module relies on the current stable version of node js.

**postcss.config.js**

Configure plugins for postcss. This module uses postcss-preset-env for autoprefixing CSS based on supported browsers in .browserslist

**tailwind.config.js**

Configure tailwind here


## Acknoledgements
Big thanks to https://github.com/baumrock/ for the awesome RockFrontend module

Without https://github.com/processwire this would not have been possible