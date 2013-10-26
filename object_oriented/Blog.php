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
?>