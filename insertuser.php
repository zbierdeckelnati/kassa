<html>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>


<body>
<?php
	include_once 'connection.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$bsl = $_POST['bsl'];
	$virtua = $_POST['virtua'];
	$selecta = $_POST['selecta'];
	
	// Check connection
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO users (username, password, bsl, virtua, selecta)
	VALUES ('$username', MD5('$password'), '$bsl', '$virtua', '$selecta')";

	if (mysqli_query($db, $sql)) {
					?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "User hinzugefügt!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "adduser.php";
				  }
				}); }, 250);
			</script>
			<?php
	} else {
					?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "User hinzufügen gescheitert!",
				  text: "Der User konnte nicht hinzugefügt werden",
				  type: "warning",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "adduser.php";
				  }
				}); }, 0);
			</script>
			<?php
	}

	mysqli_close($db);
?>
</body>

</html>