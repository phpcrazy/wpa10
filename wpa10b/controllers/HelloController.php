<?php 

class HelloController {
	public function __construct() {
		echo "Hello Constructor!";
	}
	public function actionIndex() {
		return "Hello from HelloController";
	}
}

 ?>