<?php 

function __autoload($class_name) {
    require_once __DIR__ . '/src/Model/' . $class_name . '.php';
} 

/*
require_once __DIR__ . '/src/Model/Blog.php';
require_once __DIR__ . '/src/Model/Page.php';
*/
$title = "Test Blog";
$body = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, aut, est harum rerum iure atque eligendi laboriosam ut ad a velit dolor consequatur veniam architecto non tempore eius quia debitis?";
$date = '12-12-2012';

$blog = new Blog($title, $body, $date);
var_dump($blog);
$page = new Page($title, $body, $date);
var_dump($page);
$category = new Category($title, $body, $date);
var_dump($category);

 ?>
