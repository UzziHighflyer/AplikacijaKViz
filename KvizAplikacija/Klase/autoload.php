<?php 
	
	function autoload($klasa){
		// Solution for autoloading from different directories
		$directories  = array("Klase/","../Klase/");
		foreach ($directories as $directory) {
			// Check if file exists, if it does, require class
			if(file_exists($directory.$klasa.'.php')){
				require_once($directory.$klasa.'.php');
			}
		}

	   
	}
	spl_autoload_register("autoload");