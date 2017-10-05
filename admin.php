<?php

	//error_reporting(0);
	
	include("checkadmin.php");
	include("connection.php");		
?>

<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Kassa</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

	<body>
		<h1 class="hello">Hallo, <em><?php echo $login_user;?>!</em></h1>
		<h2><a href="logout.php" style="font-size:18px">Logout?</a></h2>
		
				<form action="insert.php" method="post" enctype="multipart/form-data">
					<input type="text" name="beschreibung"></input> </br></br>
					<input type="text" name="soll"></input> </br></br>
					<input type="text" name="haben"></input> </br></br>
					<input type="file" name="file" /> </br></br></br>
					
					<button type="submit" name="btn-upload">upload</button>
				</form>
				
				<br /><br />
				
				<?php
				if(isset($_GET['success']))
				{
					?>
					<label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
					<?php
				}
				else if(isset($_GET['fail']))
				{
					?>
					<label>Problem While File Uploading !</label>
					<?php
				}
				else
				{
					?>
					
					<?php
				}
				?>
				</form>
				
			<table width="60%" border="1">
				<tr>
					<th id="thbeschreibung">Beschreibung</th>
					<th>Soll</th>
					<th>Haben</th>
					<th>Beleg</th>
					<th>Bearbeitung</th>
					<th>test</th>
				</tr>
				
				<?php
				$sql="SELECT * FROM zahlungen ORDER BY id DESC";
				$result_set=mysqli_query($db, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
						<tr>
							<td id="tdbeschreibung"><?php echo $row['beschreibung'] ?></td>
							<td><?php echo $row['soll'] ?></td>
							<td><?php echo $row['haben'] ?></td>
							<td><a href="uploads/<?php echo $row['file'] ?>">Beleg anzeigen</a></td>
							<td><form action="toedit.php" method="post"><button type="submit">Edit</button></td>
							<td><input type="radio" value="<?php echo $row['id'] ?>" name="idedit" checked="checked"></input></form></td>
						</tr>
					<?php
				}
				?>
				
				<?php

				$sql="SELECT sum(soll) as totalsoll FROM zahlungen";
				$result_set=mysqli_query($db, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
				<tr id="summe">
				<th>Summe</th>
					<th><?php echo $row['totalsoll']; ?> CHF</th>
				  <?php 
				}
				
				$sql="SELECT sum(haben) as totalhaben FROM zahlungen";
				$result_set=mysqli_query($db, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
					<th><?php echo $row['totalhaben']; ?> CHF</th>
				  <?php 
				}?>
				
				<th></th>
				<th>Gesamtsumme</th>
				
				<?php

				$sql="SELECT sum(soll)-sum(haben) as totalsollhaben FROM zahlungen";
				$result_set=mysqli_query($db, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
					<th><?php echo $row['totalsollhaben']; ?> CHF</th>
				  <?php 
				}
				
				
				mysqli_close($db);
				?>

				</tr>
			</table>
	</body>

</html>