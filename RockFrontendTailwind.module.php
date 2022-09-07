<?php

namespace ProcessWire;

/**
 * ProcessWire RockFrontendTailwind module
 *
 * Extends module RockFrontend (https://processwire.com/modules/rock-frontend/)
 * to provide a Tailwind CSS profile for a quick start with Tailwind
 * 
 * Copyright 2022 by gebeer
 * This module licensed under [MIT]
 */

class RockFrontendTailwind extends WireData implements Module, ConfigurableModule
{

	public function ready()
	{
		$this->addHookAfter('RockFrontend::profiles', $this, 'addProfilesToRockFrontend');
	}


	/**
	 * adds profiles from this module to RockFrontend profiles array
	 * needed for RockFrontend to be aware of this modules profiles 
	 */
	public function addProfilesToRockFrontend(HookEvent $event)
	{
		/** @var array $rfProfiles */
		$rfProfiles = $event->return;
		$ownProfiles = $this->profiles();
		$merged = array_merge($rfProfiles, $ownProfiles);
		$event->return = $merged;
	}

	/**
	 * Get array of available profiles
	 * @return array
	 */
	private function profiles()
	{
		$profiles = [];
		$path = Paths::normalizeSeparators(__DIR__ . "/profiles");
		foreach (array_diff(scandir($path), ['.', '..']) as $label) {
			$profiles["$path/$label"] = $label;
		}
		return $profiles;
	}



	/**
	 * Build module configuration inputs
	 * 
	 * If you prefer configuration can also be specified more declaratively with a PHP 
	 * array in an external configuration file. See the /extras/RockFrontendTailwind.config.php 
	 * file included in this module’s files for an example. 
	 * 
	 * @param InputfieldWrapper $inputfields
	 * 
	 */
	public function getModuleConfigInputfields(InputfieldWrapper $inputfields) {
		$modules = $this->wire()->modules;
		/** @var InputfieldMarkup $info */
		$info = $modules->get('InputfieldMarkup');
		$info->name = 'info';
		$info->label = 'About this module';
		$info->value = $this->wire->sanitizer->entitiesMarkdown(
			file_get_contents($this->config->path($this->className) . "README.md"),
			true
		  );
		$info->collapsed(Inputfield::collapsedNo);
		$inputfields->add($info);
	}

	/**
	 * Optional method that is called when the module version is upgraded
	 * 
	 * @param string $fromVersion From version string i.e. '1.2.3'
	 * @param string $toVersion To version string i.e. '1.2.4'
	 * 
	 */
	// public function ___upgrade($fromVersion, $toVersion) {
	// 	// you may remove this method if you do not need it
	// 	if(version_compare($fromVersion, '0.0.3', '<=')) {
	// 		// user upgraded from version 3 or prior
	// 		$this->message("Congratulations on upgrading to version $toVersion"); 
	// 	}
	// }

	/**
	 * Optional method called when the module is installed
	 * 
	 * This method is typically used to create DB tables or install files
	 * in the correct location, etc. Should the installation need to fail
	 * for some reason, it should `throw new WireException('error description');`
	 * 
	 */
	// public function ___install() {
	// 	// Example of creating a DB table (example only, we don’t use it for anything)
	// 	// you may remove this method if you do not need it
	// 	$sql = "
	// 		CREATE TABLE hello_world (
	// 			id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	// 			name VARCHAR(128)
	// 		) ENGINE={$this->config->dbEngine} DEFAULT CHARSET={$this->config->dbCharset}
	// 	";
	// 	try {
	// 		$this->wire()->database->exec($sql);
	// 	} catch(\Exception $e) {
	// 		$this->error($e->getMessage());
	// 	}
	// }

	/**
	 * Optional method called when the module is uninstalled
	 *
	 * This method undoes anything that the install() method did.
	 * For instance, remove installed DB tables, files, etc.
	 *
	 */
	// public function ___uninstall() {
	// 	// Example of dropping a DB table:  
	// 	// you may remove this method if you do not need it
	// 	try {
	// 		$this->wire()->database->exec("DROP TABLE hello_world");
	// 	} catch(\Exception $e) {
	// 		$this->error($e->getMessage());
	// 	}
	// }


}
