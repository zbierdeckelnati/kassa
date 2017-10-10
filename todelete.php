<html>

<?php

	//error_reporting(0);
	
	//include("check.php");
	include("connection.php");	

	$iddelete = $_POST['iddelete'];
	
	$datenbankname = $_POST['datenbankname'];
	//echo $datenbankname;	
?>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
	<?php
		// Check connection
		if (!$db_kassa) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "DELETE FROM $datenbankname WHERE id='$iddelete'";

		if (mysqli_query($db_kassa, $sql)) {
			?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "Eintrag Erfolgreich gelöscht!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "<?php echo $datenbankname ?>.php";
				  }
				}); }, 0);
				</script>
			<?php
		} else {
			?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "Eintrag löschen gescheitert!",
				  text: "Der Eintrag konnte nicht gelöscht werden",
				  type: "warning",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "$datenbankname.php";
				  }
				}); }, 0);
			</script>
			<?php
		}

		mysqli_close($db_kassa);
	?>
</body>

</html>