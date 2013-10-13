<?php 

require __DIR__ . "/vendor/autoload.php";

define('RD', __DIR__);
define('COND', __DIR__ . '/config/');

use Core\Application;
use Core\ConfigLoader;

// $app = new Application;
// $config = new ConfigLoader;

// $test = Config::app('site_title');
// $config = new Config;
// $app = $config->app('site_title');
// echo $test;
// echo $app;
$db = Config::database('db.hostname');
echo $db;
// $currency = Currency_Converter(4000);
// echo $currency;
 ?>