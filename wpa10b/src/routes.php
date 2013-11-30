<?php 

/* Route Rules */
$app->addRoute('hello', '/hello/{name}', array(
	'name'	=> 'World',
	'_controller' => 'HelloController::actionIndex'
	));

$app->addRoute('bye', '/bye/{name}/{another}', array(
	'name'			=> 'World',
	'another'		=> 'Another',
	'_controller'	=> 'ByeController::actionIndex'
	));

$app->addRoute('goto', '/goto/{name}', array(
	'name'			=> 'Jail',
	'_controller'	=> 'JailController::actionIndex'
	));

 ?>