<?php 

class Blog extends Eloquent {
	protected $guarded = array();
	// protected $table = 'blog';
	public static $rules = array(
		'title'	=> 'required|min:4|unique:blogs',
		'body'	=> 'required'
		);
}

 ?>