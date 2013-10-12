<?php 

function autoloadController($classname) {
	$filename = __DIR__ . "/controllers/" . $classname . ".php";
	if(is_readable($filename)) {
		require $filename;
	}
}

function autoloadModel($classname) {
	$filename = __DIR__ . "/models/" . $classname . ".php";
	if(is_readable($filename)) {
		require $filename;
	}
}

function autoloadView($classname) {
	$filename = __DIR__ . "/views/" . $classname . ".php";
	if(is_readable($filename)) {
		require $filename;
	}
}

spl_autoload_register("autoloadController");
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadView");

$cat = new CatController;
$dog = new DogController;
$duck = new DuckController;
$duck->say();
$cat_model = new CatModel;
echo $cat->say();
echo $dog->say();
echo $cat_model->count();
$view = new DogView;
echo $view->view();



 ?>