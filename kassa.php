<?php

	//error_reporting(0);
	
	include("check.php");
	include("connection.php");
?>





<!DOCTYPE html>
<html lang="de">
<head>
  <title>Kassa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
	div.input-group {
		margin-bottom: 30px;
	}
	
	h3 {
		margin-bottom: 30px;
		margin-top: 60px;
	}
	
	nav.navbar {
		border-radius: 0px;
	}
  </style>
    <div style="display: none;">
  <?php
	$sql="SELECT bslmitarbeiter, virtua, selecta FROM users WHERE username = '$login_user'";
	$result_set=mysqli_query($db_users, $sql);
	while ($row = mysqli_fetch_assoc($result_set))
	{?>
	<?php $bsl = $row['bslmitarbeiter']; ?> <br>
	<?php $virtua = $row['virtua']; ?> <br>
	<?php $selecta = $row['selecta']; ?> <br>
	<?php 
	}

?>
</div>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="kassa.php">Kassa</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kassa auswählen <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  
	         <?php
			if ($bsl == "ja") {
				echo "<li><a href='bslmitarbeiter.php'>BSL Mitarbeiter</a></li>";
			} if ($virtua == "ja") {
				echo "<li><a href='virtua.php'>Virtua</a></li>";
			} if ($selecta == "ja") {
				echo "<li><a href='#'>Selecta</a></li>";
			}
			?> 
          </ul>
        </li>
        <li><a href="#">Profil</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  		<h1>Hallo, <em><?php echo $login_user;?>!</em></h1>
		<hr>
		<h3> Neue Zahlung aufnehmen </h3>
		
				<form action="insert.php" method="post" enctype="multipart/form-data">
					<label>Kasse auswählen</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
						<!--<input id="input-lg" type="text" class="form-control input-lg" name="datum" placeholder="Datum">-->
						<select class="form-control" id="sel1" name="datenbank">
							<option value="bslmitarbeiter">BSL-Mitarbeiter</option>
							<option value="virtua">Virtua</option>
							<option value="selecta">Selecta</option>
						</select>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input id="datum" type="text" class="form-control" name="datum" placeholder="Datum">
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input id="beschreibung" type="text" class="form-control" name="beschreibung" placeholder="Beschreibung" required>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
						<input id="soll" type="text" class="form-control" name="soll" placeholder="Soll" required>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-minus-sign"></i></span>
						<input id="haben" type="text" class="form-control" name="haben" placeholder="Haben" required>
					</div>
					
					<label>Beleg auswählen</label>					
					<input type="file" name="file" class="btn btn-default"/> </br></br></br>
									
					<button type="submit" name="btn-upload" class="btn btn-default">Zahlung aufnehmen</button>
				</form>
				
				<br /><br />
				
				<?php
				if(isset($_GET['success']))
				{
					?>
					<label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
					<?php
				}
				else
				{
					?>
					
					<?php
				}
				?>
				</form>
</div>

</body>
</html>