<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
</head>
<body>
	{{ Form::open(array('route' => 'userlogin')) }}
		<p>
			<label for="email">Email : </label>
			<input type="text" name="email" />
		</p>
		<p>
			<label for="password">Password : </label>
			<input type="password" name="password" />
		</p>
		<p>
			<input type="submit" name="submit" value="Submit">
		</p>
	</form>
</body>
</html>