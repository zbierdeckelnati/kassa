<html>
<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
<?php
	session_start();
	include("connection.php");
	
	$error = "";
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			
			$username=$_POST['username'];
			$password=$_POST['password'];

			
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			
			$sql="SELECT uid FROM usersadmin WHERE username='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username;
				?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "Anmeldung als Admin erfolgreich!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "admin.php";
				  }
				}); }, 0);
				</script>
				<?php
			}else
			{
								?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "Login gescheitert",
				  text: "Kontrollieren Sie Ihren Username und das Passwort!",
				  type: "warning",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "kassa.php";
				  }
				}); }, 0);
				</script>
				<?php
			}

		}
	}

?>
</body>
</html>