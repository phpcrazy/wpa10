<?php 
namespace Thiha\Students\Facades;

use Illuminate\Support\Facades\Facade;

class Student extends Facade {
	protected static function getFacadeAccessor() { 
		return 'student'; 
	}

	public static function greeting(){
    	return "What up dawg";
  	}
  }
 ?>