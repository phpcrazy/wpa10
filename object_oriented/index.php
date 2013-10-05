<?php 
class Dog {
	private $leg = 4;
	public $name;
	public $sound = "Bark!";
	public function __construct($leg, $name, $sound) {
		$this->leg = $leg;
		$this->name = $name;
		$this->sound = $sound;
	}
	public function __call($name, $arguments) {
		echo "Dog is " . $name;
		var_dump($arguments);
	}
	
	public function legcount() {
		return $this->leg;
	}
}
$dog1 = new Dog(3, 'Gotegyar', "Bark!");
$dog2 = new Dog(4, 'TetPu', 'Whoof!');
$dog3 = new Dog(2, 'Bo Bo', 'Woung!');
$dog1->dance();
$dog2->mad('Bad');
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