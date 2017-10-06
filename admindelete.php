<html>

<?php

	//error_reporting(0);
	
	//include("check.php");
	include("connection.php");	

	$idadmin = $_POST['idadmin'];
?>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
	<?php
		// Check connection
		if (!$db) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "DELETE FROM users WHERE uid='$idadmin'";

		if (mysqli_query($db, $sql)) {
			?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "User Erfolgreich gelöscht!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "admin.php";
				  }
				}); }, 0);
				</script>
			<?php
		} else {
			?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "User löschen gescheitert!",
				  text: "Der User konnte nicht gelöscht werden",
				  type: "warning",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "admin.php";
				  }
				}); }, 0);
			</script>
			<?php
		}

		mysqli_close($db);
	?>
</body>

</html>