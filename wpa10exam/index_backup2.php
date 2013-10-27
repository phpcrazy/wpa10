<?php
	// var_dump($_SERVER); 
	// var_dump($_SERVER['REQUEST_URI']);
	// var_dump($_SERVER['SCRIPT_NAME']);
	$scriptName = $_SERVER['SCRIPT_NAME'];
	$scriptName = explode('/', $scriptName);
	$requestURI = $_SERVER['REQUEST_URI'];
	$requestURI = explode('/', $requestURI);
	var_dump($scriptName);
	var_dump($requestURI);
	for($i=0; $i < sizeof($scriptName); $i++){
	if($requestURI[$i]	==	$scriptName[$i])
		{
			unset($requestURI[$i]);//data purufication
		}
	}
	$command	=	array_values($requestURI);
	var_dump($command);
	$type = $command[0];
	$name = $command[1];
	$condition = $command[2];
	$condition2 = $command[3];
	echo "Your order is " . $type . ' ' . $name . ' ' . $condition . ' ' . $condition2;

 ?>