<?php 

require __DIR__ . "/vendor/autoload.php";

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
// $db = Config::database('db.hostname');
// $username = Config::database('db.username');
//echo $db . "<br />";
// echo $username . "<br />";
// $currency = Currency_Converter(4000);
// echo $currency;
 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Question</title>
 </head>
 <body>
 	<?php 
 		$app = new Application(new Question);
 	 ?>
 	<?php echo $app->getQuestionView('m', 0); ?>

 </body>
 </html>