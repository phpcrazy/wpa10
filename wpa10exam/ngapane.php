<?php 

$app = require __DIR__ . "/config/app.php";
$database = require __DIR__ . "/config/database.php";
var_dump($app['site_title']);
var_dump($database['db']['hostname']);


 ?>