<?php 

class Config {
	/*
	public static function app($key) {
		$app = require COND . 'app.php';
		return $app[$key];
	} 
	*/
	public function __call($name, $arguments) {
		return $this->configCheck($name, $argument);
	}

	public static function __callStatic($name, $arguments) {
		return static::configCheck($name, $arguments);	
	}

	protected static function configCheck($name, $argument) {
		$file = COND . $name . '.php';
		$config_values = require $file;

		if(file_exists($file)) {
			return $key = arrayResolver($argument, $config_values);				
		} else {
			trigger_error("Config file doesn't exist!", E_USER_ERROR);
		}
	}
}
?>