<?php 

class HelloController {

	public function actionIndex() {
		$students = array(
			array(
				'id' => 1,
				'name' => 'maung maung',
				'address' => 'latha'
				),
			array(
				'id' => 2,
				'name' => 'aung aung',
				'address' => 'latha lan'
				),
			array(
				'id' => 3,
				'name' => 'ma ma',
				'address' => 'lamadaw'
				)
			);
		View::make('index', array('students'=> $students));
	}
}

 ?>