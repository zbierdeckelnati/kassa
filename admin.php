<?php

	//error_reporting(0);
	
	include("checkadmin.php");
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
      <a class="navbar-brand" href="admin.php">Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">User <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="adduser.php">User hinzufügen</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kassa <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addkassa.php">Kassa hinzufügen</a></li>
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
		<h3> Benutzer bearbeiten </h3>
		
		<table class="table table-bordered">
				<thead>
				<tr>
					<th>Username</th>
					<th>Passwort</th>
					<th>Zugriff Kassa</th>
					<th>Einstellungen</th>
				</tr>
				</thead>
		
		<?php
				$sql="SELECT * FROM users";
				$result_set=mysqli_query($db_users, $sql);
				while($row=mysqli_fetch_array($result_set))
				{
					?>
					<tbody>
						<tr style="height: 65px">
						<td style="vertical-align: middle;"><form action="adminedit.php" method="post"><input id="username" type="text" class="form-control" name="updateusername" value="<?php echo $row['username'] ?>"></td>
						<td style="vertical-align: middle;"><input id="password" type="text" class="form-control" name="updatepassword" value="<?php echo $row['password'] ?>"></td>
						<td style="vertical-align: middle;"><div class="checkbox"><label><input type="checkbox" value="ja" name="updatebsl" <?php echo ($row['bsl']=='ja' ? 'checked' : '');?>>BSL Mitarbeiter</label></div>
															<div class="checkbox"><label><input type="checkbox" value="ja" name="updatevirtua" <?php echo ($row['virtua']=='ja' ? 'checked' : '');?>>Virtua</label></div>
															<div class="checkbox"><label><input type="checkbox" value="ja" name="updateselecta" <?php echo ($row['selecta']=='ja' ? 'checked' : '');?>>Selecta</label></div>
						</td>
						<td style="vertical-align: middle;"><input type="radio" value="<?php echo $row['uid'] ?>" name="idadmin" checked="checked"><button type="submit" class="btn btn-default">Edit</button></form><br><form action="admindelete.php" method="post"><input type="radio" value="<?php echo $row['uid'] ?>" name="idadmin" checked="checked"><button type="submit" class="btn btn-default">Delete</button></form></td>
					</tr>
					</tbody>
					<?php
				}

				mysqli_close($db_users);
				?>
</table>

				</div>

</body>
</html>


