<html>

<?php

	//error_reporting(0);
	
	//include("check.php");
	include("connection.php");	

	$idadmin = $_POST['idadmin'];
	$updateusername = $_POST['updateusername'];
	$updatepassword = $_POST['updatepassword'];
	$updatebsl = $_POST['updatebsl'];
	$updatevirtua = $_POST['updatevirtua'];
	$updateselecta = $_POST['updateselecta'];
?>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
	<?php
		// Check connection
		if (!$db_users) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "UPDATE users SET username='$updateusername', password = MD5('$updatepassword'), bslmitarbeiter='$updatebsl', virtua='$updatevirtua', selecta='$updateselecta' WHERE uid='$idadmin'";

		if (mysqli_query($db_users, $sql)) {
			?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "User Erfolgreich bearbeitet!",
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
				  title: "User bearbeitung gescheitert!",
				  text: "Der User konnte nicht bearbeitet werden",
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

		mysqli_close($db_users);
	?>
</body>

</html>