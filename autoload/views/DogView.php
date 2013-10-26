<?php 

class DogView {

	public function view() {
		$html = <<<EOD
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dog View</title>
</head>
<body>
	<h1>Hello from DogView</h1>
</body>
</html>
EOD;
	return $html;		
	}
}

 ?>

