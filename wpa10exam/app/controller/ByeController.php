<?php 

class ByeController {
	public function indexAction() {
		$db = ezcDbFactory::create('mysql://root:mmlinks@localhost/wpa10exam' );
		ezcDbInstance::set( $db );

		$db = ezcDbInstance::get();
		$stmt = $db->prepare( 'SELECT * FROM teachers where name = :name' );
		$stmt->bindValue( ':name', 'Poe Kaung' );

		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $row) {
			print_r($row);
		}

	}
}

?>