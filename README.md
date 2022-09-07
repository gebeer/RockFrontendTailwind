# Tailwind Profile for RockFrontend
This module extends [RockFrontend](https://github.com/baumrock/RockFrontend) with an installable profile for developing ProcessWire projects with Tailwind CSS

## Build Pipeline
A folder "src" will be installed in `site/templates`. That folder contains all the configuration files for a build pipeline for JS and CSS with
- webpack
- tailwindcss
- postcss with postcss-preset-env (for autoprefixing)
- babel (for transpiling)

By default compiled files (main.css and main.js) will be saved to `site/templates/assets`. This can be adjusted (see chapter Configuration files below)


## Installation
**manual**

Copy the folder "RockFrontendTailwind" to `site/modules`

**with git**

`cd site/modules && git clone https://github.com/gebeer/RockFrontendTailwind.git` 

Install the module from ProcessWIre Backend

## Initial setup
1. Open a terminal inside `site/templates/src`
2. install dependencies: `npm install`

## Usage 
- watch files during development: `npm run watch`
- build for production: `npm run build` 


## Configuration files
**.env**

You can configure the entry file path and output path for webpack inside the .env file to suit your setup.

**.browserslist**

configure browsers that you need to support. CSS will be autoprefixed and JS will be transpiled based on this file

**.babelrc**

only needs to be adjusted if you update core-js version

**.nvmrc**

defines the node version to use. This module relies on the current stable version of node js.

**postcss.config.js**

configures plugins for postcss

**tailwind.config.js**

configure tailwind here


## Acknoledgements
Big thanks to https://github.com/baumrock/ for the awesome RockFrontend module

Without https://github.com/processwire this would not have been possible