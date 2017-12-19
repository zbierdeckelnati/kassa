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
	
	div.checkbox {
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
			<li><a href="email.php">Email versenden</a></li>
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
  		<h2> Email versenden </h2>
		<hr>
		<h3> </h3>
		
		<form action="emailversenden.php" method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="name" type="text" class="form-control" name="name" placeholder="Name" required>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
						<input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
						<input id="betreff" type="text" class="form-control" name="betreff" placeholder="Betreff" required>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
						<input id="nachricht" type="text" class="form-control" name="nachricht" placeholder="Nachricht" required>
					</div>
					

					
		
					
									
					<button type="submit" name="btn-upload" class="btn btn-default">User aufnehmen</button>
		</form>

				</div>

</body>
</html>


