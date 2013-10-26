<?php 

class Question {
	private $question_multi = [
		array(
			'id' 		=> 1,
			'question' 	=> 'How old are you?',
			'answer'	=> array( '5-10', '11-20', '21-30')
			),
		array(
			'id'		=> 2,
			'question'	=> 'Where are you from?', 
			'answer'	=> array('Myanmar', 'Singapore', 'Thai')
			)
	];

	private $question_sh = array(
		array(
			array(
				'id'	=> 1,
				'question'	=> 'How are you?',
				'answer'	=> ''
				),
			array(
				'id'		=> 2,
				'question'	=> 'How old are you?',
				'answer'	=> ''
				),
			array(
				'id'		=> 3,
				'question'	=> 'Where are you from?',
				'answer'	=> ''
				)
			),
		array(
			array(
				'id'	=> 1,
				'question'	=> 'How?',
				'answer'	=> ''
				),
			array(
				'id'		=> 2,
				'question'	=> 'Why?',
				'answer'	=> ''
				),
			array(
				'id'		=> 3,
				'question'	=> 'Where?',
				'answer'	=> ''
				)
			),
		);

	public function getsh() {
		return $this->question_sh;
	}
	public function getmulti(){
		return $this->question_multi;
	}
}

 ?>