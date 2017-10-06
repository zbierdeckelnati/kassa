<?php
	include_once 'connection.php';

	$editbeschreibung = $_POST['editbeschreibung'];
	$editsoll = $_POST['editsoll'];
	$edithaben = $_POST['edithaben'];
	$idinsert = $_POST['idinsert'];
	$datenbanknameinsert = $_POST['datenbanknameinsert'];
	
	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE $datenbanknameinsert SET beschreibung='$editbeschreibung', soll='$editsoll', haben='$edithaben' WHERE id='$idinsert'";

	if (mysqli_query($db, $sql)) {
		 header ("Location: $datenbanknameinsert.php");
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}

	mysqli_close($db);
?>