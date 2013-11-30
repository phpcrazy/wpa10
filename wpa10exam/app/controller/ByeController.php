<?php 

class ByeController {
	public function indexAction($name) {
	/*	$db = ezcDbFactory::create('mysql://root:mmlinks@localhost/wpa10exam' );
		ezcDbInstance::set( $db );

		$db = ezcDbInstance::get();
		$stmt = $db->prepare( 'SELECT * FROM teachers where name = :name' );
		$stmt->bindValue( ':name', 'Poe Kaung' );

		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $row) {
			print_r($row);
		} */
		$host = 'localhost';
		$dbname = 'wpa10exam';
		$user = 'root';
		$password = 'mmlinks';
		try {
			$conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);	
			$sql = 'SELECT * FROM teachers WHERE name = :name';
			$prep = $conn->prepare($sql);
			$prep->execute(array('name' => $name[0]));
			$result = $prep->fetchAll(PDO::FETCH_CLASS);
			foreach($result as $row) {
				echo $row->name;
			}
			
		} catch (PDOException $e) {
			echo "Something wrong! Database connection failed!";
		}
	}
}

?>