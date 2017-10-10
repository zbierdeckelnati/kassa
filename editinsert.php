<html>

<?php

	//error_reporting(0);
	
	//include("check.php");
	include("connection.php");	

	$editdatum = $_POST['editdatum'];
	$editbeschreibung = $_POST['editbeschreibung'];
	$editsoll = $_POST['editsoll'];
	$edithaben = $_POST['edithaben'];
	$idinsert = $_POST['idinsert'];
	$datenbanknameinsert = $_POST['datenbanknameinsert'];
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

		$sql = "UPDATE $datenbanknameinsert SET datum='$editdatum', beschreibung='$editbeschreibung', soll='$editsoll', haben='$edithaben' WHERE id='$idinsert'";

		if (mysqli_query($db_kassa, $sql)) {
			?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "Zahlung Erfolgreich bearbeitet!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "<?php echo $datenbanknameinsert?>.php";
				  }
				}); }, 0);
				</script>
			<?php
		} else {
			?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "Zahlung bearbeitung gescheitert!",
				  text: "Der User konnte nicht bearbeitet werden",
				  type: "warning",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "$datenbanknameinsert.php";
				  }
				}); }, 0);
			</script>
			<?php
		}

	mysqli_close($db_kassa);

	?>
</body>

</html>