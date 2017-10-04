<?php

	error_reporting(0);
	
	include("check.php");
	include("connection.php");		
?>

<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Kassa</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		
		<style>
			table {
				width:100%;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			th, td {
				padding: 5px;
				text-align: left;
			}
			tr:nth-child(even) {
				background-color: #eee;
			}
			tr:nth-child(odd) {
			   background-color:#fff;
			}
			th {
				background-color: black;
				color: white;
			}
		</style>
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
				
			<table width="80%" border="1">
				<tr>
					<th>Beschreibung</th>
					<th>Soll</th>
					<th>Haben</th>
					<th>Beleg</th>
				</tr>
				
				<?php
				$sql="SELECT * FROM zahlungen";
				$result_set=mysqli_query($db, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
						<tr>
							<td><?php echo $row['beschreibung'] ?></td>
							<td><?php echo $row['soll'] ?></td>
							<td><?php echo $row['haben'] ?></td>
							<td><a href="uploads/<?php echo $row['file'] ?>">Beleg anzeigen</a></td>
						</tr>
					<?php
				}
				?>
			</table>

		
	</body>

</html>