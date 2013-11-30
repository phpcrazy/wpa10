<?php 

class View {

	public static function make($view, $array) {
		$view_folder = DD . '/views';
		$view_file = $view . ".html";
		$loader = new \Twig_Loader_Filesystem($view_folder);
		$twig = new \Twig_Environment($loader);
		echo $twig->render($view_file , $array);
	}
}


 ?>