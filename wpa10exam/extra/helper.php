<?php 

function Currency_Converter($val) {
	return $val * 980;
}

function dump($var, $die = false) {
	var_dump($var);
	if($die == true) {
		die();
	}
}

/*
arrayResolver returns the matched value
by Min Thet Naing
refined by Sitt Min Maw and Satt Kyar
*/
function arrayResolver($request_array, $default_array) {
	$key = explode('.', $request_array[0]);

	foreach ($key as $k => $value) {
		if(array_key_exists($value, $default_array)) {
			$default_array = $default_array[$value];
		} else {
			trigger_error('Array key doesn\'s exist.', E_USER_ERROR);
		}	
	}
	return $default_array;    
}

 ?>