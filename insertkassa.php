<html>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>


<body>
<?php
	include_once 'connection.php';

	$kassa = $_POST['kassa'];
	
	// Check connection
	if (!$db_kassa) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// sql to create table
	$sql = "CREATE TABLE $kassa (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	datum date NOT NULL,
	beschreibung VARCHAR(255) NOT NULL,
	soll INT(11) NOT NULL,
	haben INT(11) NOT NULL,
	file VARCHAR(100) NOT NULL,
	type VARCHAR(30) NOT NULL,
	size INT(11) NOT NULL
	)";

	if (mysqli_query($db_kassa, $sql)) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($db_kassa);
	}

	mysqli_close($db_kassa);
	
	
	// Check connection
	if (!$db_users) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// sql to create table
	$sql = "ALTER TABLE `users` ADD `$kassa` VARCHAR(255) NOT NULL AFTER `selecta`;";

	if (mysqli_query($db_users, $sql)) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($db_kassa);
	}

	mysqli_close($db_users);
	
	$myfile = fopen("$kassa.php", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	$txt = "Jane Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	?> 
	
</body>

</html>