<?php

	//error_reporting(0);
	
	include("check.php");
	include("connection.php");

	$idedit = $_POST['idedit'];
	//echo $idedit;
	
	$datenbankname = $_POST['datenbankname'];
	//echo $datenbankname;		
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
            <li><a href="bslmitarbeiter.php">BSL Mitarbeiter</a></li>
            <li><a href="v">Virtua</a></li>
            <li><a href="#">Selecta</a></li>
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
  		<h2> Bearbeitung Kassa: <?php echo $datenbankname; ?></h2>
		<h4> Datensatz: <?php echo $idedit; ?></h4>
		<hr>
		
		<?phpecho $idedit;?>
			<?php
			$sql="SELECT * FROM $datenbankname WHERE id = '$idedit'";
			$result_set=mysqli_query($db_kassa, $sql);
			while($row=mysqli_fetch_array($result_set))
			{
			?>
				<form action="editinsert.php" method="post">
				
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input id="datum" type="text" class="form-control" name="editdatum" value="<?php echo $row['datum'] ?>">
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input id="beschreibung" type="text" class="form-control" name="editbeschreibung" value="<?php echo $row['beschreibung'] ?>">
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
						<input id="soll" type="text" class="form-control" name="editsoll" value="<?php echo $row['soll'] ?>">
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-minus-sign"></i></span>
						<input id="haben" type="text" class="form-control" name="edithaben" value="<?php echo $row['haben'] ?>">
					</div>
					
					<input type="radio" value="<?php echo $idedit; ?>" name="idinsert" checked="checked"></input>
					<input type="radio" value="<?php echo $datenbankname; ?>" name="datenbanknameinsert" checked="checked"></input>
						
					<button type="submit" class="btn btn-default">Edit</button>
				
				</form>
			<?php
			}
			?>	
</div>

</body>
</html>