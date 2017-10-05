<?php

	error_reporting(0);
	
	include("check.php");
	include("connection.php");		
	
	$idedit = $_POST['idedit'];
	echo $idedit;
?>

<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Kassa</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

	<body>
	
	<?phpecho $idedit;?>
				<?php
				$sql="SELECT * FROM zahlungen WHERE id = '$idedit'";
				$result_set=mysqli_query($db, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
					<form action="editinsert.php" method="post">
						<input type="text" name="editbeschreibung" value="<?php echo $row['beschreibung'] ?>"></input>
						<input type="text" name="editsoll" value="<?php echo $row['soll'] ?>"></input>
						<input type="text" name="edithaben" value="<?php echo $row['haben'] ?>"></input>
						<input type="radio" value="<?php echo $idedit; ?>" name="idinsert" checked="checked"></input>
						
						<button type="submit">Edit</button>
					</form>
					<?php
				}
				?>
				
				
	</body>

</html>