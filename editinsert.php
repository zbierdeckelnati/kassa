<?php
	include_once 'connection.php';

	$editdatum = $_POST['editdatum'];
	$editbeschreibung = $_POST['editbeschreibung'];
	$editsoll = $_POST['editsoll'];
	$edithaben = $_POST['edithaben'];
	$idinsert = $_POST['idinsert'];
	$datenbanknameinsert = $_POST['datenbanknameinsert'];
	
	if (!$db_kassa) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE $datenbanknameinsert SET datum='$editdatum', beschreibung='$editbeschreibung', soll='$editsoll', haben='$edithaben' WHERE id='$idinsert'";

	if (mysqli_query($db_kassa, $sql)) {
		 header ("Location: $datenbanknameinsert.php");
	} else {
		echo "Error updating record: " . mysqli_error($db_kassa);
	}

	mysqli_close($db_kassa);
?>