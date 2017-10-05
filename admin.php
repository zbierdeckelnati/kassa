<?php

	//error_reporting(0);
	
	include("checkadmin.php");
	include("connection.php");		
?>

<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Kassa</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

	<body>
		<h1 class="hello">Hallo, <em><?php echo $login_user;?>!</em></h1>
		<h2><a href="logout.php" style="font-size:18px">Logout?</a></h2>
				

				<?php
				$sql="SELECT * FROM users";
				$result_set=mysqli_query($db, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
						<input type="text" value="<?php echo $row['username'] ?>"></input> <br>
						<input type="text" value="<?php echo $row['password'] ?>"></input> <br><br>
					<?php
				}

				mysqli_close($db);
				?>
	</body>

</html>