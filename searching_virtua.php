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
	
	li#quartal a {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: 400;
		line-height: 1.42857143;
		color: #333;
		white-space: nowrap;
		text-decoration: none;
	}
	
	li#quartal:hover {
		color: #262626;
		text-decoration: none;
		background-color: #f5f5f5;		
	}
	
	input#searching.form-control {
		width: 35%;
	}
	
	input#searching.form-control {
		display: inline;
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

			

<?php
	$datenbankname = basename(__FILE__, '.php');
?>
  
<div class="container">
  		<h2> Kassa: <?php echo $datenbankname; ?> </h2>
            
		<hr>
		
		<?php 
		
		$searching = $_GET['searching'];
			
		?>
		
			
		<form action="searching_virtua.php" method="get">
			<input id="searching" type="text" class="form-control" name="searching" placeholder="Nach Datum suchen">
			<button type="submit" class="btn btn-default">Suche</button>
			
		</form>
		
		<br>
		
		<br>
		
				<table class="table table-bordered">
				<thead>
				<tr>
					<th>Datum</th>
					<th id="thbeschreibung">Beschreibung</th>
					<th>Soll</th>
					<th>Haben</th>
					<th>Beleg</th>
					<th>Bearbeitung</th>
					<th>test</th>
				</tr>
				</thead>
				
				<?php
				$datenbankname = basename(__FILE__, '.php');
				?>
				
				<?php
				$sql="SELECT * FROM virtua WHERE datum = '$searching' ORDER BY id DESC";
				$result_set=mysqli_query($db_kassa, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
						<tbody>
						<tr style="height: 65px">
							<td style="vertical-align: middle;"><?php echo $row['datum'] ?></td>
							<td id="tdbeschreibung" style="vertical-align: middle;"><?php echo $row['beschreibung'] ?></td>
							<td style="vertical-align: middle;"><?php echo $row['soll'] ?></td>
							<td style="vertical-align: middle;"><?php echo $row['haben'] ?></td>
							<td style="vertical-align: middle;"><a href="uploads/<?php echo $row['file'] ?>">Beleg anzeigen</a></td>
							<td style="vertical-align: middle;"><form action="todelete.php" method="post"><input type="radio" value="<?php echo $row['id'] ?>" name="iddelete" checked="checked"></input><input type="radio" value="<?php echo $datenbankname ?>" name="datenbankname" checked="checked"></input><button type="submit" class="btn btn-default">Delete</button></form><form action="toedit.php" method="post"><button type="submit" class="btn btn-default">Edit</button></td>
							<td style="vertical-align: middle;"><input type="radio" value="<?php echo $row['id'] ?>" name="idedit" checked="checked"></input>
							<input type="radio" value="<?php echo $datenbankname ?>" name="datenbankname" checked="checked"></input></form></td>
						</tr>
						</tbody>
					<?php
				}
				?>
				
				<?php

				$sql="SELECT sum(soll) as totalsoll FROM virtua WHERE datum = '$searching'";
				$result_set=mysqli_query($db_kassa, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
				<tfoot>
				<tr id="summe">
				<th></th>
				<th>Summe</th>
					<th><?php echo $row['totalsoll']; ?> CHF</th>
				  <?php 
				}
				
				$sql="SELECT sum(haben) as totalhaben FROM virtua";
				$result_set=mysqli_query($db_kassa, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
					<th><?php echo $row['totalhaben']; ?> CHF</th>
				  <?php 
				}?>
				
				<th></th>
				<th>Gesamtsumme</th>
				
				<?php

				$sql="SELECT sum(soll)-sum(haben) as totalsollhaben FROM virtua WHERE datum = '$searching'";
				$result_set=mysqli_query($db_kassa, $sql);
				while ($row = mysqli_fetch_assoc($result_set))
				{?>
					<th><?php echo $row['totalsollhaben']; ?> CHF</th>
				  <?php 
				}
				
				
				mysqli_close($db_kassa);
				mysqli_close($db_users);
				?>

				</tr>
				</tfoot>
			</table>
</div>

</body>
</html>