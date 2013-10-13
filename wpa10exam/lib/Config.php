<?php 

class Config {
	/*
	public static function app($key) {
		$app = require COND . 'app.php';
		return $app[$key];
	} 
	*/
	public function __call($name, $arguments) {
		return static::getConfig($name, $arguments);
	}

	public static function __callStatic($name, $arguments) {
		return static::getConfig($name, $arguments);	
	}

	private static function getConfig($name, $arguments) {
		$filename = COND . $name . ".php";
		if(file_exists($filename)) {
			$var = require $filename;
			$arg = explode('.', $arguments[0]);	
			if(array_key_exists($arg[0], $var)) {
				return $arg[0][1];
			} else {
				trigger_error('Your config data does not found in config', E_USER_ERROR);
			}
		} else {
			trigger_error("File do not found in config folder", E_USER_ERROR);
		}
		return $var[$arguments[0]];
	}
}

 ?>