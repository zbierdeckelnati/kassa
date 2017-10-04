<?php
	include('login.php'); // Include Login Script

	if ((isset($_SESSION['username']) != '')) 
	{
		header('Location: kassa.php');
	}	
	

?>

<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
	</head>

	<body>
		<form method="post" action="">
			<input name="username" type="text" class="input" size="25" required />
			<input name="password" type="password" class="input" size="25" required />
			<input type="submit" name="submit" value="Login!" />
		</form>
	</body>

</html>