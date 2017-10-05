<?php
	include_once 'connection.php';

	$editbeschreibung = $_POST['editbeschreibung'];
	$editsoll = $_POST['editsoll'];
	$edithaben = $_POST['edithaben'];
	$idinsert = $_POST['idinsert'];
	
	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE zahlungen SET beschreibung='$editbeschreibung', soll='$editsoll', haben='$edithaben' WHERE id='$idinsert'";

	if (mysqli_query($db, $sql)) {
		header ('Location: kassa.php');
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}

	mysqli_close($db);
?>