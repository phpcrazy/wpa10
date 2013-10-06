<?php 

class Blog {
	public $title;
	public $body;
	public $date; 

	public function __construct($title, $body, $date) {
		$this->title = $title;
		$this->body = $body;
		$this->date = $date;
	}
}

$title = 'Test Blog';
$body = 'wer werw rwerw erwer werw erwer wer werwe';
$date = '12-12-2013';

$blog = new Blog($title, $body, $date);

 ?>