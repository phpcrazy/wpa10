<?php 

/* controller autoload */
function autoloadController($classname) {
	$filename = DD . "/controllers/" . $classname . ".php";
	if(is_readable($filename)){
		require $filename;
	} 
}
function autoloadModels($classname){
	$filename = DD . "/models/" . $classname . ".php";
	if(is_readable($filename)){
		require $filename;
	} 
}

spl_autoload_register('autoloadController');
spl_autoload_register('autoloadModels');


 ?>