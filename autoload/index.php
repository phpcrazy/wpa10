<?php 
function __autoload($classname) {
	$filename = $classname . ".php";
	require_once __DIR__ . '/class/' . $filename;
}

$cat = new Cat;
$dog = new Dog;
$duck = new Duck;
$cat->say();
$dog->say();
$duck->say(); 

 ?>