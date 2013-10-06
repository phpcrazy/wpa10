<?php 

class Cat 
{
	private $data = array();

	public function __set($name, $value) 
	{
		$this->data[$name] = $value;
	}

	public function __get($name) 
	{
		return $this->data[$name];
	}

	public function __isset($name) 
	{
		return isset($this->data[$name]);
	}

	public function __unset($name) 
	{
		unset($this->data[$name]);
	}

	public function __sleep() 
	{
		return array('data');
	}

	public function __wakeup()
	{
		echo "Wakeup!";
	} 

	public function __call($name, $arguments)
	{
		var_dump($name);
		var_dump($arguments);
	}

	public static function __callStatic($name, $arguments)
	{
		var_dump($name);
		var_dump($arguments);
	}
}

Cat::run('Insein');
$cat = new Cat;
$cat->name = 'Bo Bo';
$cat->leg = 4;
echo $cat->name . "<br />";
echo $cat->leg;
var_dump(isset($cat->leg));
unset($cat->leg);
var_dump(isset($cat->leg));
$data = serialize($cat);
unserialize($data);
 ?>