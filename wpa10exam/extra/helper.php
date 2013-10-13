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

 ?>