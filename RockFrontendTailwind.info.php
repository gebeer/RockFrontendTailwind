<?php

namespace ProcessWire;

/**
 * Module info file that tells ProcessWire about this module. 
 * 
 * If you prefer to keep everything in the main module file, you can move this 
 * to a static getModuleInfo() method in the RockFrontendTailwind.module.php file, which 
 * would return the same array as below. However, an external file like this 
 * is often preferable because it enables ProcessWire to determine the module
 * requirements before attempting to load the .module.php file.
 * 
 * Note: When updating this info for an already-installed module, you’ll need
 * to do a Modules > Refresh before you see your updated info. 
 * 
 * Required properties: title, version, summary. All others are optional.
 * 
 */

$info = array(
	'title' => 'RockFrontendTailwind',
	'version' => '1.0.0',
	'summary' => 'Extends module RockFrontend to provide a Tailwind CSS profile',
	'author' => 'gebeer',
	'href' => 'https://github.com/gebeer/RockFrontendTailwind/',
	'singular' => true,
	'autoload' => true,
	'icon' => 'code',
	'requires' => [
		// 'ProcessWire>=3.0.165', 
		// 'PHP>=7.4.0',
		'RockFrontend>=1.17.21',
	],
);
