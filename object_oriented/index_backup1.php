<?php 
class Dog {
	private $leg;
	public $name;
	public $sound;
	private $data = array();
	public static $foo = 'bar';

	public function __set($name, $value) {
		$this->data[$name] = $value;
	}

	public function __get($name) {
		return $this->data[$name];
	}

	public function __construct( $name, $leg = 4, $sound = 'Bark') {
		echo "Constructor Started!";
		$this->leg = $leg;
		$this->name = $name;
		$this->sound = $sound;
	}

	public static function test() {
		echo "Hello from Static!";
	}

	public function __call($name, $arguments) {
		echo "Dog is " . $name;
		var_dump($arguments);
	}

	public static function __callStatic($name, $arguments) {
		echo "Dog is " . $name;
		var_dump($arguments);	
	}

	public function legcount() {
		return $this->leg;
	}

	public function __destruct() {
		echo "Destroy!";
	}
}

Dog::test();
echo Dog::$foo;

Dog::database('test');

$dog1 = new Dog('Aung Aung',0,'Woof!');
$dog1->test();

/*
$dog1 = new Dog(3, 'Gotegyar', "Bark!");
$dog2 = new Dog(4, 'TetPu', 'Whoof!');
$dog3 = new Dog(2, 'Bo Bo', 'Woung!');
$dog1->dance();
$dog2->mad('Bad');

$dog1->eye = 2;
echo $dog1->eye . "<br />";

$dog1->dob = '12-12-2012';
echo $dog1->dob;

echo $dog1->test;
*/
/*
dogdo($dog1->legcount(), $dog1->name, $dog1->sound);
dogdo($dog2->legcount(), $dog2->name, $dog2->sound);
dogdo($dog3->legcount(), $dog3->name, $dog3->sound);

function dogdo($leg, $name, $sound) {
	echo "My name is " . $name . ". I have " 
		. $leg . " legs! " . $sound . "<br />";
}
*/
?>